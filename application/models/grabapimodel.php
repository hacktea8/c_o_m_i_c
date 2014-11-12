<?php
class grabapiModel extends CI_Model{
 public $db;
 public function __construct(){
  parent::__construct();
  $this->db  = $this->load->database('default', TRUE);
 }
 public function get_page_table($id){
  return sprintf('page%d',$id%10);
 }
 public function getNonePageList($cid,$vid){
  $table = $this->get_page_table($vid);
  $sql = sprintf("SELECT pid FROM %s WHERE isimg=0 AND vid=%d AND cid=%d LIMIT %d",$table,$vid,$cid, $limit);
  $list = $this->db->query($sql)->result_array();
  $list = $list? $list: array();
  return $list;
 }
 public function getNonePagePicList($index = 0, $limit = 30){
  $table = $this->get_page_table($index);
  $sql = sprintf("SELECT vid,cid FROM %s WHERE isimg=0 GROUP BY vid LIMIT %d",$table, $limit);
echo $sql;exit;
  $list = $this->db->query($sql)->result_array();
  $list = $list?$list:array();
  $r = array();
  foreach($list as $vf){
   $vl = $this->getNonePageList($vf['cid'], $vf['vid']);
   $r[] = array('vid'=>$vf['vid'],'cid'=>$vf['cid'],'list'=>$vl);
  }
  return $r;
 }
 public function addPagePic($data = array()){
  $update = array('isimg'=>$data['isimg']);
  if(1 == $data['isimg']){
   $update['host'] = $data['host'];
   $update['cover'] = $data['cover'];
  }
  $where = array('vid'=>$data['vid'],'cid'=>$data['cid'],'pid'=>$data['pid']);
  $table = $this->get_page_table($data['vid']);
  $this->db->update($table,$update,$where);
  return 1;
 }
}
