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

$list = $m->getNoneCoverList($flag = 4,$limit = 60);
foreach($list as $v){
 $updata = array('isimg'=>14);
 
 if($size < 1000){
  $updata['cover'] = '';
  $updata['isimg'] = 4;
 }
 $isimg = $updata['isimg'];
 echo "=== Cover url $img Is img $isimg ===\n";
 //var_dump($updata);exit;
 $m->updateComicInfo($updata,$v['id']);
sleep(16);
 
}
