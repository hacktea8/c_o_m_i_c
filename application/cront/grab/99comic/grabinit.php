<?php

define('ROOTPATH',dirname(dirname(__FILE__)));
include_once ROOTPATH.'/99comic/config.php';
include_once ROOTPATH.'/99comic/function.php';
include_once ROOTPATH.'/model.php';
include_once ROOTPATH.'/config.php';

/******* start cate*********/
//$catelist = getmhCate('http://99mh.com/comic/168/');
$catelist = getmhCate($_domain);

echo '<pre>';
var_dump($catelist);exit;
foreach($catelist as $cate){
  $ocid=intval(str_replace('/comiclist/','',$cate[1]));
  $cname=isset($cate[2])?trim($cate[2]):'';
  $cid=getCateByname($cname);
  echo 'cate id is ',$cid,"\r\n";
}
exit;
/****** end get cate*******/

$catelist=getAllcate();
foreach($catelist as $cate){
  $cid=$cate['id'];
  $oid=$cate['oid'];
  $curl=$_domain.'comiclist/'.$oid;
  getcatecomics($curl);
  sleep(10);
}

//var_dump($catelist);
?>
