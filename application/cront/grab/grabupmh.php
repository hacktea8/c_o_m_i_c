<?php

$APPPATH=dirname(__FILE__);
include_once($APPPATH.'/config.php');
include_once($APPPATH.'/function.php');

$_task=array(array('url'=>'upmh/','pattern'=>$upmhListPattern),array('url'=>'Newmh/','pattern'=>$NewmhListPattern));
foreach($_task as $task){
  $url=$_domain.$task['url'];
  $html=getHtml($url);
  preg_match_all($task['pattern'],$html,$match);
  unset($match[0]);
  //echo '<pre>';var_dump($match);exit;
  foreach($match[2] as $_url){
     $url=$_domain.$_url;
  //   getmhinfo($url);
$url='http://www.99comic.com/comics/44o118337/';
     getmhPageinfo($url);
  }
}


?>
