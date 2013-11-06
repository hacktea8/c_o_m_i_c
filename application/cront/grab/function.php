<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'../db.class.php');
$db=new DB_MYSQL();

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


function getHtml(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
}

