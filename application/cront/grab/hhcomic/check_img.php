<?php

define('ROOTPATH',dirname(dirname(__FILE__)));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';

$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookiehhcomic';

$m = new Model();

$list = $m->getCheckCoverList($flag = 0,$limit = 60);
foreach($list as $v){
 if($v['host']){
  echo "=== check cover is OK ====\n";break;
 }
 $img = sprintf('http://img.hacktea8.com/showpic.php?key=%s',$v['cover']);
 $finfo = get_headers($img,1);
print_r($finfo);
 $size = $finfo["Content-Length"];
 $updata = array('check_img'=>1);
 if($size < 1000){
  $updata['cover'] = '';
  $updata['isimg'] = 4;
 }
echo $size," $v[cover] \n";
 $isimg = isset($updata['isimg'])?4:1;
 echo "=== Cover url $img Is img $isimg ===\n";
 var_dump($updata);exit;
 $m->updateComicInfo($updata,$v['id']);
sleep(16);
 
}
