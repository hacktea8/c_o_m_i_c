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
$q = 0;
//0,4,8,12,16
$lists = $model->getPostErrorComicPagePic($q,$limit=30);
foreach($lists as &$pagedata){
 //转图
 for($cii=0;$cii<3;$cii++){
  $postimgdata['imgurl'] = $info['server'].$pval;
  $postimgdata['referer'] = $siteinfo['domain'];
  $imgcurl->config['url'] = $postimgdata['url'];
  $imgcurl->postval = $postimgdata;
  $cover = $imgcurl->getHtml();
  $img = substr($cover,3);
  $pagedata['img'] = $img;
  $status = preg_replace('#^\d#','',$img);
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
 $pagedata['isimg'] = $pagedata['img'] ? 1 : 4;
 $pagedata['rtime'] = time();
 $model->setPageImg($pagedata);
 echo "\n+++ cid:$comicid Vid:$vid Pid:$pid ImgUrl: $img ++++\n";
 sleep(5);
}//foreach lists end
echo "\nGrab Table: page$q Limit: $limit Is OK!\n";
