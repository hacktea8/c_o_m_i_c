<?php
require_once $root.'/../../grab/db.class.php';
class Model{
 protected $db = '';

 public function __construct(){
  $this->db = new DB_MYSQL(); 
 }
 function getCate(){
  $sql = sprintf('SELECT * FROM %s WHERE `flag`=1',$this->db->getTable('cate'));
  $list = $this->db->result_array($sql);
  $return = array();
  foreach($list as &$v){
   $return[$v['id']] = $v;
  }
  return $return;
 }
 function get_content_table($id){
  return sprintf('comic_content%d',$id%10);
 }
 public function getPicUrl($key,$host = 0){
  if($host){
   $url = sprintf('http://%s.tietuku.com/%s.jpg',$host,$key);
  }else{
   $url = 'http://img.hacktea8.com/showpic.php?key='.$key;
  }
  return $url;
 }
 public function getNoneSearchLimit($limit = 30){
  $sql = sprintf('SELECT * FROM %s WHERE nonesearch = 0 LIMIT %d',$this->db->getTable('comic'), $limit);
  $list = $this->db->result_array($sql);
  $list = empty($list)?array():$list;
  foreach($list as &$v){
   $v['pic'] = $this->getPicUrl($v['cover'],$v['host']);
  }
  return $list;
 }
 public function setIsSearch($ids = ''){
  if(!$ids){
   return false;
  }
  $limit = count($ids);
  $ids = implode(',',$ids);
  $sql = sprintf('UPDATE %s SET `nonesearch` = 1  WHERE `id` IN (%s) LIMIT %d',$this->db->getTable('comic'),$ids,$limit);
  $this->db->query($sql);
 }
}
