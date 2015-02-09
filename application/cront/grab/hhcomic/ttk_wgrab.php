<?php

define('ROOTPATH',dirname(dirname(__FILE__)).'/');

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/function.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';

$pattern = '/hhcomic/'.basename(__FILE__);
require_once ROOTPATH.'/hhcomic/singleProcess.php';

$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookieqhhcomicw';

$imgcurl = new CurlModel();
$imgcurl->config['cookie'] = 'cookieqimgw';

$model = new Model();
$postimgdata['url'] = 'http://img.hacktea8.com/mhqapi/uploadurl?seq=';
$uploadData = array('imgurl'=>'','referer'=>'');
$lastpage = ROOTPATH.'/hhcomic/config/lastpage_';

/*********** Start *****************/
$q = 3;
//3,7,11,15,19
$catelist = $model->getAllcate();
foreach($catelist as $k => $cate){
 if($k < $q){
  continue;
 }
 if($k > $q){
  break;
 }
 $comicdata['cid'] = $cate['id'];
 $lastp = 1;
 if(file_exists($lastpage.$cate['id'].'.php')){
  require_once $lastpage.$cate['id'].'.php';
 }
 for($page = $lastp;;$page++){
  file_put_contents($lastpage.$cate['id'].'.php',"<?php\r\n\$lastp = $page;");
  $cateurl = sprintf('%s'.$siteinfo['listurl'],$siteinfo['domain'],$comicdata['cid'],$page);
  echo "\$cateurl={$cateurl}\n";
  $mhlist = getmhlist($cateurl);
  if(!$mhlist){
   break;
  }
//var_dump($mhlist);exit;
  foreach($mhlist[2] as $k => $title){
   $comicdata['name'] = $title;
   $mhurl = $siteinfo['domain'].$mhlist[1][$k];
//echo $mhurl;exit;
   preg_match('#(\d+)#',$mhlist[1][$k],$match);
   $comicdata['ourl'] = $match[1];
   $ocomicid = $match[1];
   getmhdetail($mhurl);
   if(!$comicdata['detail']){
    var_dump($comicdata);//exit;
   }
   $comicid = $model->getComic($comicdata);
   if(!$comicid){
    $uploadData['imgurl'] = sprintf($siteinfo['cover'],$mhlist[0][$k]);
    $uploadData['referer'] = $siteinfo['domain'];
    $comicdata['isimg'] = 0;
//var_dump($postimgdata);exit;
    $r = upload2Ttk($uploadData);
    if(1 == $r['flag']){
     $comicdata['cover'] = $r['key'];
     $comicdata['host'] = $r['host'];
     $comicdata['isimg'] = 1;
    }else{
     echo("Cover: $comicdata[cover]  ourl: $uploadData[imgurl] 失效!\n");
    }
//var_dump($comicdata);exit;
    $comicid = $model->addComic($comicdata);
   }
   $volsinfo = getmhvols($mhurl);
   if(empty($volsinfo['vols'])){
    die("Url:$mhurl get volsinfo failed!\n");
   }
//var_dump($volsinfo);exit;
   foreach($volsinfo['vols'] as $kv => $vol){
    #$pageurl = sprintf('http://paga.hhcomic.net/%s',$vol);
    $pageurl = $vol;
//echo $pageurl,"\n"; 
    $info = getmhpageinfo($pageurl);
#var_dump($info);exit;
    $pages = explode('|',$info['page']);
    $voldata['vnum'] = $kv + 1;
    $voldata['cid'] = $comicid;
    $voldata['title'] = $volsinfo['title'][$kv];
    $voldata['rtime'] = time();
    $voldata['firstpid'] = 0;
//var_dump($voldata);
    $vinfo = $model->getVol($voldata);
    $vid = $vinfo['vid'];
    if($vinfo['done'] == 1){
     echo "comicid: $voldata[cid] Vid: $vid Vol: $voldata[vnum]\n";continue;
    }
    if(!$vid){
     $vid = $model->addVol($voldata);
     $model->setcomicvol($voldata);
    }
    echo "date: ".date('Y-m-d H:i:s')." comicid: $voldata[cid] Vid: $vid Vol: $voldata[vnum]\n";
    if(!$vid){
     die("Null Vid!\n");
    }
    foreach($pages as $kp => $pval){
     $pagedata['pid'] = $kp + 1;
     $pagedata['vid'] = $vid;
     $pagedata['cid'] = $comicid;
     if(1 == $pagedata['pid']){
      $voldata['firstpid'] = $pagedata['vid'].'_'.$pagedata['pid'];
     }
     $pinfo = $model->getPage($pagedata);
     $pid = $pinfo['pid'];
     if(!$pid || $pinfo['isimg']!= 1){
      $perror = '/ok-comic08/l/lsj/Vol_04/109.jp';
      if($pval == $perror){
       $pval .= 'g';
      }
      //转图
      for($cii=0;$cii<3;$cii++){
       $uploadData['imgurl'] = $info['server'].$pval;
       $uploadData['referer'] = $siteinfo['domain'];
       $r = upload2Ttk($uploadData);
       if(1 == $r['flag']){
        break;
       }
       sleep(5);
      }
      $pagedata['isimg'] = 0;
      if( 1 == $r['flag']){
       $pagedata['img'] = $r['key'];
       $pagedata['host'] = $r['host'];
       $pagedata['isimg'] = 1;
      }else{
       $pagedata['img'] = '';
       $pagedata['ourl'] = $postimgdata['imgurl'];
       echo ("\n+++ cid:$comicid Vid:$vid Pid:$pid ImgUrl: $pagedata[img] Ourl: $uploadData[imgurl] ++++\n");
      }
      $pagedata['rtime'] = time();
      if(!$pid){
       $pid = $model->addPage($pagedata);
      }else{
       $model->setPageImg($pagedata);
      }
      echo "\n+++ cid:$comicid Vid:$vid Pid:$pid ImgUrl: $pagedata[img] ++++\n";
      sleep(5);
     }// end add_set pagesdata
    }
    $model->setvoldone($vid);
    if($voldata['vnum'] > 1){
     $voldata['vid'] = $vid;
     $model->setPreAndNextVol($voldata);
     unset($voldata['vid']);
    }
   }
//exit;
   sleep(9);
  }
  echo "\nGrab Cid:$cate[id] Cname:$cate[name] Page:$page \n";
  sleep(10);
 }// foreach page end
}// foreach cate end
