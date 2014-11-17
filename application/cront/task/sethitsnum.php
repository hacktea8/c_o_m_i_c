<?php

$root = dirname(__FILE__).'/';
define('BASEPATH',$root.'../../../system/');
require_once($root.'../grab/db.class.php');
require_once($root.'../../../application/libraries/rediscache.php');


$model = new model();

$redis = new Rediscache();
$keys = $redis->keys('user_comic_hits:*');

//var_dump($keys);exit;

foreach($keys as $k){
  $kinfo = explode(':',$k);
  $comicid = $kinfo[1];
  $volid = $kinfo[2];
  $hit = $redis->get($k);
//var_dump($id);exit;
  $model->setTopicHitsLog($comicid,$volid,$hit);
  $redis->delete($k);
//  usleep(1000);
}

echo "\n===".count($keys)."=== Update Comic Hit Log OK! ========\n";

class model{
 protected $db;

 function __construct(){
  $this->db = new DB_MYSQL();
 }
 function setTopicHitsLog($comicid = 0, $volid = 0, $hit = 1){
  if( !$comicid){
   return false;
  }
  $table = $this->db->getTable('comic');
  $id = $comicid;
  if($volid){
   $table = $this->db->getTable('vols');
   $id = $volid;
  }
  $sql = sprintf('UPDATE %s SET `hits`=`hits`+%d WHERE `id`=%d LIMIT 1', $table, $hit, $id);
  $this->db->query($sql);
  return true;
 }
}
