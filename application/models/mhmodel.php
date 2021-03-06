<?php
require_once 'modelbase.php';

class Mhmodel extends Modelbase{
 public $_table = 'page';
 public $_pagecol = '`pid`, `vid`, `cid`, `img`,host, `isimg`, `isadult`, `hits`, `rtime`';
 public $_volcol = 'title,`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
 public $_pagesetcol = '`pid`, `img`,host, `isadult`, `hits`, `rtime`';
 public $_comiccol = ' `cid`,`name`,`cover`,host,`author`,`detail`,`letter`,`relatecomic`,`state`,`hits`,`volset`,`atime`,`rtime` ';
 public $_cacheType = array('hotcomic' =>1);
 public function __construct(){
  parent::__construct();
 }
 public function getTable($vid){
  return 'page'.($vid % 10);
 }
 public function getIndexColdBlock($navTotal, $block = 4, $limit = 8){
  $pSize = ceil($navTotal/$block);
  $return = array();
  $list = array();
  for($i = 0; $i< $pSize; $i++){
   $start = $i * $block;
   $navList = $nav = $this->getNavBlockList($flag = 1, $start, $block);
   if(empty($nav)){
    break;
   }
   $first = array_shift($nav);
   $last = array_pop($nav);
   $last['name'] = isset($last['name']) ? $last['name'] : '';
   $list = array('start' => $first['name'],'end' => $last['name']);
   $tmp = array();
   foreach($navList as $v){
    $tmp[] = $this->getColdComicBlockList($v['id'],$limit);
   }
   $list['list'] = $tmp;
   $return[] = $list;
  }
  return $return;
 }
 public function getColdComicBlockList($cid,$limit = 8){
  $sql = sprintf("SELECT `id`,`name` FROM `comic` WHERE `cid`=%d ORDER BY `hits` ASC LIMIT %d", $cid, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['url'] = $this->getUrl('comic', $v['id']);
  }
  return $list;
 }
 public function getNavBlockList($flag = 1, $start = 0, $count = 0){
  $where = $where ? sprintf(" WHERE `flag`=%d ", $flag) : '';
  $sql = sprintf("SELECT * FROM `cate` %s LIMIT %d,%d", $where, $start, $count);
  $list = $this->db->query($sql)->result_array();
  return $list;
 }
 public function getPagesetInfoByid($cid, $vid){
  if( !$cid || !$vid)
   return false;

  $table = $this->getTable($vid);
  $sql = sprintf('SELECT %s FROM %s WHERE `vid`=%d AND `cid`=%d LIMIT 200',$this->_pagesetcol, $table, $vid, $cid);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$val){
   $val['cover'] = $this->getPicUrl($val['img'],$val['host']);
  }
  return $list;
 }
 public function updateInfoByid($table, $data, $id){
  if( !$table || !$data || !$id)
   return false;

  $where = array();
  foreach($id as $key => $val){
   $where[] = sprintf(" `%s`='%s'",$key, mysql_real_escape_string($val));
  }
  $where = implode(' AND ', $where).' LIMIT 1';
  $sql =  $this->db->update_string($table, $data, $where);
  return $this->db->query($sql);
 }
 public function getVolinfoByid($cid, $vid){
  if( !$cid || !$vid){
   return false;
  }
  $sql = sprintf('SELECT %s FROM vols WHERE `vid`=%d AND `cid`=%d LIMIT 1',$this->_volcol, $vid, $cid);
  return $this->db->query($sql)->row_array();
 }
 public function getIndexData(){
  $return = array();
  $return['hotSerial'] = $this->getHotSerialComics(10);
  $return['classicEnd'] = $this->getClassicEndComics($limit = 10);
  $return['newGround'] = $this->getNewGroundComics($limit = 10);
  $return['fullcolorChoice'] = $this->getFullcolorChoiceComics($limit = 10);
  $return['hitsRank'] = $this->getComicsHitsRank($limit = 36);
  $return['newRenew'] = $this->getNewRenewComics($limit = 45);
  $return['newHitsRank'] = $this->getNewComicsHitsRank($limit = 24);
  return $return;
 }
 public function getCateTopData($cid){
  $return = array();
  $return['hitsRank'] = $this->getComicsHitsRank($limit = 15,$cid);
  $return['newRenew'] = $this->getNewRenewComics($limit = 13,$cid);
  $return['classicEnd'] = $this->getClassicEndComics($limit = 8,$cid);
  $return['hotSerial'] = $this->getHotSerialComics($limit = 8,$cid);
  return $return;
 }
 public function getComicRenewData($cid){
  $return = array();
  $return['newGround'] = $this->getNewGroundComics($limit = 10,$cid);
  $return['newRenew'] = $this->getNewRenewComics($limit = 13,$cid);
  return $return;
 }
 public function getComicUpdateRecentBlock(){
  $r = array();
  for($i = 0;$i<4;$i++){
   $r[$i] = $this->getComicListByCid($cid = 0, $order = 'rtime', $i+1, 50);
  }
  return $r;
 }
 public function getComicListByCid($cid = 0, $order = 'hits', $page = 1, $per = 12){
  $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
  $ordermap = array('hits'=>' `hits` DESC','atime'=>' `atime` DESC','rtime'=>' `rtime` DESC');
  $order = isset($ordermap[$order]) ? $ordermap[$order]: array_shift($ordermap);
  $p = $page - 1;
  $p = $p < 0 ? 0 : $p;
  $p = $p * $per;
  $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`,host,ext, `vol`,rtime,atime,author FROM `comic` %s ORDER BY %s LIMIT %d,%d",$where,$order,$p,$per);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['cover'] = $this->getPicUrl($v['cover'],$v['host']);
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list;
 }
//热门连载
 public function getHotSerialComics($limit = 10, $cid = 0){
  //$where = $cid ? sprintf('AND `cid`=%d ',$cid) : '';
  $where = $cid ? sprintf(' WHERE `cid`=%d ',$cid) : '';
  //$sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` WHERE `ishot` = 1 %s LIMIT %d", $where, $limit);
  $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`,host,ext, `vol` FROM `comic`  %s ORDER BY `hits` DESC LIMIT %d", $where, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['cover'] = $this->getPicUrl($v['cover'],$v['host']);
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list;
 } 
//经典完结
 public function getClassicEndComics($limit = 10, $cid = 0){
  $where = $cid ? sprintf('AND `cid`=%d ',$cid) : '';
  $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`,host,ext, `vol` FROM `comic` WHERE `state` = 1 %s ORDER BY `hits` DESC LIMIT %d", $where, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['cover'] = $this->getPicUrl($v['cover'],$v['host']);
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list;
 }
//最新上架
 public function getNewGroundComics($limit = 10, $cid = 0){
  $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
  $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`,host,ext, `vol`,`atime` FROM `comic` %s ORDER BY `atime` DESC LIMIT %d", $where, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['atime'] = date('Y/m/d',$v['atime']);
   $v['cover'] = $this->getPicUrl($v['cover'],$v['host']);
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list; 
 }
//全彩精选
 public function getFullcolorChoiceComics($limit = 10){
  $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`,host,ext, `vol` FROM `comic` ORDER BY hits DESC LIMIT %d",$limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['cover'] = $this->getPicUrl($v['cover'],$v['host']);
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list;
 }
//漫画点击排行
 public function getComicsHitsRank($limit = 36, $cid = 0){
  $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
  $sql = sprintf("SELECT `id`, `name` FROM `comic` %s ORDER BY `hits` DESC LIMIT %d", $where, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['url'] = $this->getUrl('comic', $v['id']);
  }
  return $list;
 }
//漫画字母列表
 public function getComicsLetterList(){          
 }
//最新更新漫画
 public function getNewRenewComics($limit = 64, $cid = 0){
  $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
  $sql = sprintf("SELECT `id`, `name`,`vol`,`rtime` FROM `comic` %s ORDER BY `rtime` DESC LIMIT %d", $where, $limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['url'] = $this->getUrl('comic', $v['id']);
   $v['volurl'] = $this->getUrl('vol', $v['id'],$v['vol']);
   $v['rtime'] = date('Y-m-d',$v['rtime']);
   $v['volname'] = $v['vol'].'话';
  }
  return $list;
 } 
//新加漫画点击排行
 public function getNewComicsHitsRank($limit = 24){
  $sql = sprintf("SELECT `id`, `name` FROM `comic` ORDER BY `atime`,`hits` DESC LIMIT %d",$limit);
  $list = $this->db->query($sql)->result_array();
  foreach($list as &$v){
   $v['url'] = $this->getUrl('comic',$v['id']);
  }
  return $list;
 }
        
}
