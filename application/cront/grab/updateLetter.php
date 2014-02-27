<?php

require_once 'db.class.php';
require_once 'words2char.php';

$db = new DB_MYSQL(); 

$limit = 30;

for($i=1;;$i++){
  $list = getComics($i,$limit);
  if(count($list) < 1){
    break;
  }
  foreach($list as $val){
/*
    if(intval($val['letter'])){
       continue;
    }
    $id = getLetterId($val['letter']);
    updateTable($table='comic',$data=array('letter'=>$id),$where=array('id'=>$val['id'])); 
*/
    $letter = substr($val['name'], 0, 1);
    $letter = strtoupper($letter);
    if( !($letter >= 'A' && $letter <='Z')){
      $letter = substr(Pinyin($val['name'],2),0,1);
    }
    $letter = strtoupper($letter);
/**/
var_dump($val);
var_dump($letter);
exit;
/**/
    updateTable($table='comic',$data=array('letter'=>$letter),$where=array('id'=>$val['id']));
  }
}
echo "\n== 执行完毕! ==\n";

function getLetterId($letter){
  global $db;
  $letter = mysql_real_escape_string(trim($letter));
  $sql = sprintf("SELECT `id` FROM `letters` WHERE `letter`='%s' LIMIT 1",$letter);
  $row = $db->row_array($sql);
  if(isset($row['id'])){
    $id = $row['id'];
  }else{
    $sql = sprintf("INSERT INTO `letters`(`letter`, `count`) VALUES ('%s',0)",$letter);
    $db->query($sql);
    $id = $db->insert_id();
  }
  $sql = sprintf("UPDATE `letters` SET `count`=`count`+1 WHERE `id`=%d LIMIT 1",$id);
  $db->query($sql);
  return $id;
}

function getComics($i,$limit){
  global $db;
  $page = ($i - 1)*$limit;
  $sql = sprintf("SELECT `id`, `name`, `letter` FROM `comic` LIMIT %d,%d",$page,$limit);
  $list = $db->result_array($sql);
  return $list;
}

function updateTable($table,$data,$where){
  global $db;
  $sql = $db->update_string($table,$data,$where);
  return $db->query($sql);
}

