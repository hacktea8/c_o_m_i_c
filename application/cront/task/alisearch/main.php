<?php

$root = dirname(__FILE__);
define('BASEPATH',1);
require_once $root.'/model.php';
require_once $root.'/config.php';
require_once $root.'/../../../../application/libraries/Yunsearchapi.php';

$search = new Yunsearchapi();
$model = new Model();
$count = 100;
$cate = $model->getCate();

while($count){
 $lists = $model->getNoneSearchLimit(5);
 if(empty($lists)){
  echo "\n++++ 需要加入搜索索引的列表为Empty! ++++++\n";
  break;
 }
//var_dump($lists);exit;
 $_itemsArr = array();
 $idarr = array();
 foreach($lists as $val){
  $itemArr['id'] = 'icomic_'.$val['id'];
  $itemArr['cat'] = $cate[$val['cid']]['name'];
  $itemArr['title'] = $val['name'];
  $itemArr['group_id'] = intval($val['cid']);
  $itemArr['tag'] = $val['author'];
  $itemArr['author'] = $val['author'];
  $itemArr['focus_count'] = $val['focus_count'];
  $itemArr['create_timestamp'] = $val['atime'];
  $itemArr['update_timestamp'] = $val['rtime'];
  $itemArr['body'] = trim(preg_replace('#\s+#Uis',' ',strip_tags($val['detail'])));
  $itemArr['body'] = mb_substr($itemArr['body'], 0, 256, 'utf-8');
  $itemArr['thumbnail'] = $val['pic'];
  $itemArr['hit_num'] = intval($val['hits']);
  $itemArr['url'] = $val['id'];
  //$_itemsArr[] = $itemArr;
  $idarr[] = $val['id'];
  $post_data = array('fields'=>$itemArr,'cmd'=>'ADD');
//  var_dump($post_data);exit;
  $_itemsArr[] = $post_data;
 }
 $result = $search->addDoc($_itemsArr);
//print_r($result);echo "\n",exit;
 $model->setIsSearch($idarr);
 $count --;
}
echo "执行完毕!\n";exit; 

