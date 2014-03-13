<?php
require_once 'modelbase.php';

class Mhmodel extends Modelbase{
  public $_table = 'page';
  public $_pagecol = '`pid`, `vid`, `cid`, `img`, `isimg`, `isadult`, `hits`, `rtime`';
  public $_volcol = '`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
  public $_pagesetcol = '`pid`, `img`, `isadult`, `hits`, `rtime`';
  public $_comiccol = ' `cid`,`name`,`cover`,`author`,`detail`,`letter`,`relatecomic`,`state`,`hits`,`volset`,`atime`,`rtime` ';
  public $_cacheType = array('hotcomic' =>1);
  public function __construct(){
     parent::__construct();

  }
  public function getTable($vid){
     return 'page'.($vid % 10);
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
  public function getComicListByCid($cid, $order, $page, $per){
     $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
     $ordermap = array('hits'=>' `hits` DESC','atime'=>' `atime` DESC','rtime'=>' `rtime` DESC');
     $order = isset($ordermap[$order]) ? $ordermap[$order]: array_shift($ordermap);
     $p = $page - 1;
     $p = $p < 0 ? 0 : $p;
     $p = $p * $per;
     
     $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` %s ORDER BY %s LIMIT %d,%d",$where,$order,$p,$per);
     $list = $this->db->query($sql)->result_array();
     foreach($list as &$v){
       $v['cover'] = $this->getPicUrl($v['cover']);
       $v['url'] = $this->getUrl('comic', $v['id']);
       $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
       $v['volname'] = $v['vol'].'话';
     }
     return $list;
  }
  public function getHotComics(){
     $sql = sprintf("SELECT * FROM `cacheconfig` WHERE `type`=%d", $this->_cacheType['hotcomic']);
     return $this->db->query($sql)->result_array();
  }
//热门连载
  public function getHotSerialComics($limit = 10, $cid = 0){
     //$where = $cid ? sprintf('AND `cid`=%d ',$cid) : '';
     $where = $cid ? sprintf(' `cid`=%d ',$cid) : '';
     //$sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` WHERE `ishot` = 1 %s LIMIT %d", $where, $limit);
     $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` WHERE  %s ORDER BY `hits` DESC LIMIT %d", $where, $limit);
     $list = $this->db->query($sql)->result_array();
     foreach($list as &$v){
       $v['cover'] = $this->getPicUrl($v['cover']);
       $v['url'] = $this->getUrl('comic', $v['id']);
       $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
       $v['volname'] = $v['vol'].'话';
     }
     return $list;
  } 
//经典完结
  public function getClassicEndComics($limit = 10, $cid = 0){
     $where = $cid ? sprintf('AND `cid`=%d ',$cid) : '';
     $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` WHERE `state` = 1 %s ORDER BY `hits` DESC LIMIT %d", $where, $limit);
     $list = $this->db->query($sql)->result_array();
     foreach($list as &$v){
       $v['cover'] = $this->getPicUrl($v['cover']);
       $v['url'] = $this->getUrl('comic', $v['id']);
       $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
       $v['volname'] = $v['vol'].'话';
     }
     return $list;
  }
//最新上架
  public function getNewGroundComics($limit = 10, $cid = 0){
     $where = $cid ? sprintf('WHERE `cid`=%d ',$cid) : '';
     $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` %s ORDER BY `atime` DESC LIMIT %d", $where, $limit);
     $list = $this->db->query($sql)->result_array();
     foreach($list as &$v){
       $v['cover'] = $this->getPicUrl($v['cover']);
       $v['url'] = $this->getUrl('comic', $v['id']);
       $v['volurl'] = $this->getUrl('vol', $v['id'], $v['vol']);
       $v['volname'] = $v['vol'].'话';
     }
     return $list; 
  }
//全彩精选
  public function getFullcolorChoiceComics($limit = 10){
     $sql = sprintf("SELECT `id`, `cid`, `name`, `cover`, `vol` FROM `comic` WHERE `ishot`=2 LIMIT %d",$limit);
     $list = $this->db->query($sql)->result_array();
     foreach($list as &$v){
       $v['cover'] = $this->getPicUrl($v['cover']);
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
