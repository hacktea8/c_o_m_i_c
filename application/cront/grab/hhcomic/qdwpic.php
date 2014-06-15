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
$imgcurl->config['cookie'] = 'cookieqdwimg';

$model = new Model();
$postimgdata['url'] = 'http://img.hacktea8.com/mhqapi/uploadurl?seq=';


/*********** Start *****************/
$q = date('w');
$h = date('H');
$base = 0;
if($h>=0 && $h<=6){
  $base = 1;
}elseif($h>=7 && $h<=12){
  $base = 2;
}elseif($h>=13 && $h<=18){
  $base = 3;
}
$q = $q+$base;

//$q = 8;
//0,2,4,6,8
$lists = $model->getPostErrorComicPagePic($q,$limit=30);
if(empty($lists)){
 echo "\nGrab Table: page$q Limit: $limit Is Empty!\n";
 sleep(600);
 exit(0);
}
foreach($lists as &$pagedata){
//var_dump($pagedata);exit;
 //转图
 for($cii=0;$cii<3;$cii++){
  $postimgdata['imgurl'] = $pagedata['ourl'];
  $postimgdata['referer'] = $siteinfo['domain'];
  $imgcurl->config['url'] = $postimgdata['url'];
  $imgcurl->postval = $postimgdata;
  $cover = $imgcurl->getHtml();
  $img = substr($cover,3);
  $pagedata['img'] = $img;
  $status = preg_replace('#[^\d]+#','',$img);
  if(44 == $status){
    die('Token 失效!');
  }
  if(strpos($img,'.')!=false){
    break;
  }
  sleep(5);
 }
 if(strpos($img,'.')==false){
  $pagedata['img'] = '';
  $pagedata['ourl'] = $postimgdata['imgurl'];
  echo ("\n+++ cid:$comicid Vid:$vid Pid:$pid ImgUrl: $img Ourl: $postimgdata[imgurl] ++++\n");
 }
 $tmp = explode('_',$img);
 if(isset($tmp[1])){
   $tmp = intval($tmp[1]);
   if($tmp > 100){
     $pagedata['ourl'] = '';
   }
 }
 $pagedata['isimg'] = $pagedata['img'] ? 1 : 4;
 $pagedata['rtime'] = time();
//var_dump($pagedata);exit;
 $model->setPageImg($pagedata);
 echo "\n+++ cid:$pagedata[cid] Vid:$pagedata[vid] Pid:$pagedata[pid] ImgUrl: $img ++++\n";
 sleep(5);
}//foreach lists end
echo "\nGrab Table: page$q Limit: $limit Is OK!\n";
