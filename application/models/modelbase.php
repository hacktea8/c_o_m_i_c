<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelbase extends CI_Model{
 protected $db;
  
 public function __construct(){
  parent::__construct();
  $this->db = $this->load->database('default',true);
 }
 public function getPicUrl($key,$host = 0){              
  if($host){
   $url = sprintf('http://%s.tietuku.com/%s.jpg',$host,$key);
  }else{
   $url = 'http://img.hacktea8.com/showpic.php?key='.$key;
  }
  return $url;
 }
 public function getComicinfoByid($cid){
  if(!$cid){
   return false;
  }
  $sql = sprintf('SELECT %s FROM `comic` WHERE flag=1 AND id=%d LIMIT 1', $this->_comiccol,$cid);
  $info = $this->db->query($sql)->row_array(); 
  if($info){
   $info['id'] = $cid;
   $info['vols'] = $this->getComicVols($cid);
   $info['cover'] = $this->getPicUrl($info['cover'],$info['host']);
   $info['atime'] = date('Y-m-d', $info['atime']);
   $info['rtime'] = date('Y-m-d', $info['rtime']);
   $info['relate'] = $this->getComicRelateByCid($info['cid'],$limit = 16);
  }
  return $info;
 }
 public function getComicVols($cid){
  $sql = sprintf("SELECT `vid`,`vnum` FROM `vols` WHERE `cid`=%d ORDER BY `vnum` DESC ",$cid);
  $lists = $this->db->query($sql)->result_array();
  foreach($lists as &$v){
   $v['url'] = $this->getUrl('vol',$cid,$v['vid']);
   $v['name'] = "第$v[vnum]话";
  }
  return $lists;
 }
 public function getComicRelateByCid($cid,$limit){
  $sql = sprintf("SELECT `id`,`name` FROM `comic` WHERE `flag`=1 AND `cid`=%d LIMIT 0,%d",$cid,$limit*2);
  $list = $this->db->query($sql)->result_array();
  $return = $this->getRandList($list,$limit);
  return $return;
 }
 public function getRandList(&$list,$limit){
  $len = count($list);
  $len = $len - 1 - $limit;
  $pos = mt_rand(0,$len);
  return array_slice($list,$pos,$limit);
 }
 public function getFriendLinks($flag = 1){
  $where = $flag < 0 ? '' : sprintf("WHERE `flag`=%d", $flag);
  $sql = sprintf("SELECT * FROM `friendlinks` %s", $where);
  $list = $this->db->query($sql)->result_array();
  return $list;
 }
 public function getNavList($flag = 1){
  $where = $flag < 0 ? '' : sprintf("WHERE `flag`=%d", $flag);
  $sql = sprintf("SELECT * FROM `cate` %s", $where);
  $list = $this->db->query($sql)->result_array();
  $return = array();
  foreach($list as &$v){
   $v['url'] = $this->getUrl($key = 'cate',$v['id']);
   $return[$v['id']] = $v;
  }
  return $return;
 }
 public function getLetterList(){
  $sql = sprintf("SELECT * FROM  `letters` ORDER BY  `sort`");
  $return = $this->db->query($sql)->result_array($sql);
  foreach($return as &$v){
   $v['url'] = $this->getUrl($key = 'letter',$v['id']);
  }
  return $return;
 }
 public function getUrl($key = 'cate',$p1='',$p2='',$p3=''){
  $url = '';
  if('lists' == $key){
   $url = sprintf('/index/cate/%d/%s/%d.shtml',$p1,$p2,$p3);
  }elseif('cate' == $key){
   $url = sprintf('/index/cate/%d.shtml',$p1);
  }elseif('comic' == $key){
   $url = sprintf('/index/comic/%d.shtml',$p1);
  }elseif('vol' == $key){
   $url = sprintf('/index/vol/%d/%d.shtml',$p1,$p2);
  }elseif('letter' == $key){
   $url = sprintf('/index/comicletter/%d.shtml',$p1);
  }
  return $url;
 }
}
