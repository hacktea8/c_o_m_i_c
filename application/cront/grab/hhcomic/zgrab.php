<?php

define('ROOTPATH',dirname(dirname(__FILE__)));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';

$pattern = '/hhcomic/'.basename(__FILE__);
require_once ROOTPATH.'/hhcomic/singleProcess.php';

$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookiehhcomic';

$imgcurl = new CurlModel();
$imgcurl->config['cookie'] = 'cookieimg';

$model = new Model();

$lastpage = ROOTPATH.'/hhcomic/config/lastpage_';

/*********** Start *****************/
$q = 15;
//3,7,11,15
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
           var_dump($comicdata);exit;
        }
        $comicid = $model->getComic($comicdata);
        if(!$comicid){
        $postimgdata['imgurl'] = sprintf($siteinfo['cover'],$mhlist[0][$k]);
        $postimgdata['referer'] = $siteinfo['domain'];
//var_dump($postimgdata);exit;
        $imgcurl->config['url'] = $postimgdata['url'];
        $imgcurl->postval = $postimgdata;
        $cover = substr($imgcurl->getHtml(),3);
//$cover = 22;
        $comicdata['cover'] = $cover;
        if(44 == $cover){
           die('Token 失效!');
        }
        $comicdata['isimg'] = $comicdata['cover'] ? 1 : 0;
//var_dump($comicdata);exit;
        $comicid = $model->addComic($comicdata);
        }
        $volsinfo = getmhvols($mhurl);
//var_dump($volsinfo);exit;
        foreach($volsinfo as $kv => $vol){
           $pageurl = sprintf('%s'.$siteinfo['volurl'],$siteinfo['domain'],$ocomicid,$vol);
//echo $pageurl,"\n";           
           $info = getmhpageinfo($pageurl);
//var_dump($info);exit;
           $pages = explode('|',$info['page']);
           $voldata['vnum'] = $kv + 1;
           $voldata['cid'] = $comicid;
           $voldata['rtime'] = time();
           $voldata['firstpid'] = 0;
//var_dump($voldata);
           $vid = $model->getVol($voldata);
           if($vid){
              echo "comicid: $voldata[cid] Vid: $vid Vol: $voldata[vnum]\n";continue;
           }
           $vid = $model->addVol($voldata);
           $model->setcomicvol($voldata);
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
              $pid = $model->getPage($pagedata);
              if(!$pid){
              //转图
              $postimgdata['imgurl'] = $info['server'].$pval;
              $postimgdata['referer'] = $siteinfo['domain'];
              $imgcurl->config['url'] = $postimgdata['url'];
              $imgcurl->postval = $postimgdata;
              $img = substr($imgcurl->getHtml(),3);
              $pagedata['img'] = $img;
              if(strlen($img) > 30){
                 continue;
              }
              if(44 == $img){
                 die('Token 失效!');
              }
              $pagedata['isimg'] = $pagedata['img'] ? 1 : 0;
              $pagedata['rtime'] = time();
              $model->addPage($pagedata);
              sleep(1);
              }else{
                 sleep(1);
              }
           }
           if($voldata['vnum'] > 1){
              $voldata['vid'] = $vid;
              $model->setPreAndNextVol($voldata);
              unset($voldata['vid']);
           }
        }
//exit;
        sleep(1);
     }
sleep(1);
  }
}
//var_dump($catelist);exit;
