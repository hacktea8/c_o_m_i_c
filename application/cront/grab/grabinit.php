<?php

$APPPATH=dirname(__FILE__);
include_once($APPPATH.'/config.php');
include_once($APPPATH.'/function.php');

/******* start cate********
$catelist=getmhCate($_domain);

echo '<pre>';

foreach($catelist as $cate){
  $ocid=intval(str_replace('/comiclist/','',$cate[1]));
  $cname=isset($cate[2])?trim($cate[2]):'';
  $cid=getCateByname($cname,$ocid);
  echo 'cate id is ',$cid,"\r\n";
}
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
