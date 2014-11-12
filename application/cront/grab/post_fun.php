<?php

require_once ROOTPATH.'CurlLib.php';
$apicurl = new phpCurl();
$apicurl->config['cookie'] = 'cookie_api';
$POST_API = 'http://mh.emubt.com/grabapi/';

function getNonePagePicList($index = 0,$limit = 10){
  global $apicurl,$POST_API;
  $url = $POST_API.'getNonePagePicList';
  $apicurl->config['url'] = $url;
  $apicurl->postVal = array(
  'index' => $index
  ,'limit' => $limit
  );
  $html = $apicurl->getHtml();
//var_dump($html);exit;
  $return = json_decode($html,1);
//var_dump($return);exit;
  return $return;
}
function addPagePic($data){
  global $apicurl,$POST_API;
  $url = $POST_API.'addComicPageInfo';
  $apicurl->config['url'] = $url;
  $apicurl->postVal = array(
  'article_data' => json_encode($data)
  );
  $error = json_last_error();
  if($error){
    var_dump($data);exit;
  }
  $html = $apicurl->getHtml();
//var_dump($html);exit;
  return json_decode($html,1);
}

