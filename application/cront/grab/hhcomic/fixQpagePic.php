<?php

define('ROOTPATH',dirname(dirname(__FILE__)).'/');

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/function.php';
require_once ROOTPATH.'/post_fun.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';


$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookieqhhcomicq';

$imgcurl = new CurlModel();
$imgcurl->config['cookie'] = 'cookieqimgq';


$curSite = $sitetype[2];
define('S_CHARSET','GBK');

$volList = getNonePagePicList(0,10);
$volList = $volList?$volList:array();
//var_dump($volList);exit;
foreach($volList as $vinfo){
 //Vol Pages List
 $cid = &$vinfo['cid'];
 $vid = &$vinfo['vid'];
 $ocid = &$vinfo['ourl'];
 $vol = &$vinfo['vol'];
 $comicurl = sprintf($curSite['domain'].$curSite['comicurl'], $ocid);
echo $comicurl,"\n";
 $volsinfo = getmhvols($comicurl);
 if(empty($volsinfo['vols'])){
   die("Url:$comicurl get volsinfo failed!\n");
 }
 $purl = $volsinfo['vols'][$vol-1];
echo $purl," Vol: $vol \n";
//exit;
 $info = getmhpageinfo($purl);
 var_dump($info);exit;
 $pages = explode('|',$info['page']);
 foreach($vinfo['list'] as $pinfo){
  $vp = $pinfo['pid'];
  //转图
  for($cii=0; $cii<3; $cii++){
   $curPic = $info['server'].$pages[$vp-1];
   $updata = array('imgurl'=>$curPic
   ,'referer'=>$curSite['domain']
   );
   $r = upload2Ttk($updata);
   if(1 == $r['flag']){
    break;
   }
   sleep(6);
  }
  $setdata = array('isimg'=>14,'cid'=>$cid,'vid'=>$vid,'id'=>$vp);
  if(1 == $r['flag']){
   $setdata['isimg'] = 1;
   $setdata['host'] = $r['host'];
   $setdata['cover'] = $r['key'];
  }else{
   echo $imgurl,"\n";
   var_dump($r);exit;
  }
  $rh = addPagePic($setdata);
  if(1 == $rh['flag']){
   echo "++++ Fix ComicId: VolId: Pid: Is OK! +++++\n";
  }else{
   echo "++++ Fix ComicId: VolId: Pid: Is Failed! +++++\n";
  }
  //exit;
 }
 sleep(6);
}


