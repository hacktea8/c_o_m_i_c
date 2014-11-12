<?php

$APPPATH = dirname(__FILE__).'/';
//include_once($APPPATH.'../db.class.php');
require_once $APPPATH.'../../libraries/Tietuku.php';
require_once $APPPATH.'../../libraries/gickimg.php';

$gickimg = new Gickimg();
$tietuku = new Tietuku();

//$db = new DB_MYSQL();

$data = array('url' => 'http://img.hacktea8.com/imgapi/uploadurl?seq=', 'imgurl'=>'');
$task = 600;
function getImageurl($thum = ''){
 $data['imgurl'] = $thum;
 $header = get_headers($thum,1);
 if('image/' != substr($header['Content-Type'],0,6) || $header['Content-Length'] < 1000){
  echo "$val[id] cover is down!\n";
  return 4;
 }
 $cover = getHtml($data);
 //去除字符串前3个字节
 $cover = substr($cover,3);
 if(44 == $cover){
  die('Token 失效!');
 }
 return $cover;
}

function upload2Ttk($data = array()){
 global $ttkAlbum,$allowext,$ttkKey,$gickimg,$tietuku;
 $err = array('flag'=>-1,'msg'=>'未知错误');
 $imgurl = &$data['imgurl'];
 $referer = &$data['referer'];
 $curMin = date('i');
 $mk = $curMin%count($ttkKey);
 $curKey = $ttkKey['m'.$mk];
 $curAlbum = $ttkAlbum['m'.$mk];
 $ak = 'w'.date('w');
 $albumid = $curAlbum[$ak];
 $filename = basename($imgurl);
 $imginfo = array('title'=>$filename);
 $imginfo['ext'] = getextname($filename);
/**/
 $dwdata = array('url'=>$imgurl,'referer'=>$referer);
 $html = getHtml($dwdata);
 $imgurl = ROOTPATH.'cache_images/ttk'.$imginfo['title'];
 @file_put_contents($imgurl, $html);
 @chmod($imgurl, 0777);
 if(!file_exists($imgurl)){
  @unlink($imgurl);
  $err['msg'] = 'file Down err '.$imgurl;
  return $err;
 }
 if( filesize($imgurl) <2000){
  @unlink($imgurl);
  $err['msg'] = 'file size too small';
  return $err;
 }
 if(in_array($imginfo['ext'], $allowext)){
  $dst_ext = '';
  if('.jpg' != $imginfo['ext']){
   $dst_ext = '.jpg';
  }
  $imgurl_w = ROOTPATH.'cache_images/ttkw'.$imginfo['title'].$dst_ext;
  $out_imgurl = $imgurl.$dst_ext;
  
  $cmd = "convert {$imgurl} {$out_imgurl}";
  //echo "$cmd\n";
  @exec($cmd);
  if( !file_exists($out_imgurl)){
   @unlink($imgurl);
   $err['msg'] = 'file Convert err '.$imgurl;
   return $err;
  }
  $water = ROOTPATH.'water/mhwater.png';
  $gickimg->waterMark($out_imgurl,$water,$imgurl_w);
  @chmod($imgurl_w, 0777);
  $upFile = &$imgurl_w;
  if( !file_exists($imgurl_w) || filesize($imgurl_w) <2000){
   $upFile = &$out_imgurl;
   @unlink($imgurl_w);
  }
 }else{
  $upFile = &$imgurl;
//exit;
 }
 $tietuku->init($curKey);
 $json = $tietuku->uploadFile($albumid,$upFile);
 @unlink($imgurl);
 @unlink($out_imgurl);
 @unlink($upFile);
 $iurl = @$json['linkurl'];
 if( !$iurl){
  $err['msg'] = 'save file failed';
  return $err;
 }
 $r = parse_info($iurl);
 if( !$r){
  $err['msg'] = 'parse url failed';
  return $err;
 }
 $r['flag'] = 1;
 return $r;
}
function parse_info($url){
  $uinfo = parse_url($url);
  $r = array();
  $host = @$uinfo['host'];
  $host = explode('.',$host);
  $r['host'] = @$host[0];
  $host = ltrim(@$uinfo['path'],'/');
  $host = explode('.',$host);
  $r['key'] = @$host[0];
  if( !$r['host'] || !$r['key']){
   return 0;
  }
  $r['url'] = $url;
  return $r;
 }
function getextname($fname=''){
 if(!$fname){
  return false;
 }
 $extend =explode("." , $fname);
 $ext = strtolower(end($extend));
 return '.'.$ext;
}

function getHtml(&$data){
  $curl = curl_init();
  $url = $data['url'];
  $referer = @$data['referer'];
  unset($data['url']);
  unset($data['referer']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
 if(count($data)){
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
 }
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
 if($referer){
  curl_setopt($curl, CURLOPT_REFERER, $referer);
 }else{
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
 }
  curl_setopt($curl, CURLOPT_HEADER, 0);
 curl_setopt($curl, CURLOPT_TIMEOUT, 35);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  if(defined('S_CHARSET') && S_CHARSET != DST_CHARSET && stripos($tmpInfo,'</head>')>0){
   $tmpInfo = mb_convert_encoding($tmpInfo, DST_CHARSET,S_CHARSET);
  }
  return $tmpInfo;
}

