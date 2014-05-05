<?php

require_once ROOTPATH.'/db.class.php';
class Model{
  public $db = '';
  
  public function __construct(){
    $this->db = new DB_MYSQL();
  }
  public function updateCatemhTotal($cid=0){
    if(!$cid)
      return false;

    $sql = sprintf('UPDATE `cate` SET `ctotal`=(SELECT count(*) FROM `comic` WHERE `cid`=%d) WHERE `id`=%d',$cid,$cid);
    $this->db->query($sql);

  }
  public function getpagestablename($vid=0){
    if(!$vid)
      return false;

    $ptid = $vid%10;
    return 'page'.$ptid;
  } 
  public function getAllcate(){
    $sql = 'SELECT * FROM `cate` WHERE `flag`=1';
    return $this->db->result_array($sql);
  }
  public function getCateByname($cname,$ourl = ''){
    if(!$cname){
       return null;
    }
    $sql = sprintf("SELECT `id` FROM `cate` WHERE `name`='%s' limit 1",mysql_real_escape_string($cname));
    $row = $this->db->row_array($sql);
    if(isset($row['id']))
      return $row['id'];

    $sql = sprintf("INSERT INTO `cate`( `name`,`hhourl`) VALUES ('%s','%s')",mysql_real_escape_string($cname),mysql_real_escape_string($ourl));
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  public function getComic($data = array()){
    if(!isset($data['name'])){
       return false;
    }
    $sql = sprintf('SELECT `id` FROM `comic` WHERE `name`=\'%s\' LIMIT 1',mysql_real_escape_string($data['name']));
    $row = $this->db->row_array($sql);
    if(isset($row['id'])){
       return $row['id'];
    }
    return false;
  }
  public function addComic($data = array()){
    if(!isset($data['name'])){
       return false;
    }
    $sql = sprintf('SELECT `id` FROM `comic` WHERE `name`=\'%s\' LIMIT 1',mysql_real_escape_string($data['name']));
    $row = $this->db->row_array($sql);
    if(isset($row['id'])){
       return $row['id'];
    }
    $sql = $this->db->insert_string('`comic`',$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  public function getVol($data = array()){
    if(!isset($data['vnum'])){
       return false;
    }
    $sql = sprintf('SELECT `vid` FROM `vols` WHERE `vnum`=%d AND `cid`=%d LIMIT 1',$data['vnum'],$data['cid']);
    $row = $this->db->row_array($sql);
    if(isset($row['vid'])){
       return $row['vid'];
    }
    return false;
  }
  public function addVol($data = array()){
    if(!isset($data['vnum'])){
       return false;
    }
    $sql = sprintf('SELECT `vid` FROM `vols` WHERE `vnum`=%d AND `cid`=%d LIMIT 1',$data['vnum'],$data['cid']);
    $row = $this->db->row_array($sql);
    if(isset($row['vid'])){
       return $row['vid'];
    }
    $sql = $this->db->insert_string('`vols`',$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  public function setcomicvol($data = array()){
    if(!$data['cid']){
      return false;
    }
    $sql = sprintf("UPDATE `comic` SET `vol`='%s' WHERE `id`=%d LIMIT 1",$this->db->escape($data['volnum']),$data['cid']);
    $this->db->query($sql);
    return 1;
  }
  public function getPage($data = array()){
    if(!isset($data['vid']) || $data['vid'] < 1){
       return false;
    }
    $ptable = $this->getpagestablename($data['vid']);
    $sql = sprintf('SELECT `pid`,`img` FROM %s WHERE `pid`=%d AND `vid`=%d AND `cid`=%d LIMIT 1',$ptable,$data['pid'],$data['vid'],$data['cid']);
    $row = $this->db->row_array($sql);
    if(isset($row['pid'])){
       return $row;
    }
    return false;
  }
  public function setPageImg($data = array()){
    if(!isset($data['vid']) || $data['vid'] < 1){
       return false;
    }
    $ptable = $this->getpagestablename($data['vid']);
    $setdata = array('img'=>$data['img']);
    $where = array('pid'=>$data['pid'],'vid'=>$data['vid'],'cid'=>$data['cid']);
    $sql = $this->db->update_string($ptable,$setdata,$where);
    $this->db->query($sql);
    return 1;
  }
  public function addPage($data = array()){
    if(!isset($data['vid']) || $data['vid'] < 1){
       return false;
    }
    $ptable = $this->getpagestablename($data['vid']);
    $sql = sprintf('SELECT `pid` FROM %s WHERE `pid`=%d AND `vid`=%d AND `cid`=%d LIMIT 1',$ptable,$data['pid'],$data['vid'],$data['cid']);
    $row = $this->db->row_array($sql);
    if(isset($row['pid'])){
       return $row['pid'];
    }
    $sql = $this->db->insert_string($ptable,$data);
    $this->db->query($sql);
    $this->db->insert_id();
//var_dump($data['pid'].'  '.$pid);exit;
    if(1 == $data['pid']){
       $sql = sprintf('UPDATE `vols` SET `firstpid`=\'%s\' WHERE `vid`=%d LIMIT 1',$data['vid'].'_'.$data['pid'],$data['vid']);
       echo $sql,"\n";
       $this->db->query($sql);
    }
//    return $pid;
  }
  public function setPreAndNextVol($datas){
    if(!$datas)
      return null;

    $sql = sprintf("SELECT * FROM vols
                 WHERE vnum < %d AND cid = %d
                 ORDER BY vnum DESC LIMIT 1 ",
         intval($datas['vnum']),$datas['cid']);

    $prevVol = $this->db->row_array($sql);
    if($datas['vnum'] != 1 && $prevVol['firstpid']){
      $sql = sprintf("UPDATE vols SET nextpid = '%s' WHERE vid = %d LIMIT 1",$datas['firstpid'],$prevVol['vid']);
//      echo "\n$sql\n";
      $this->db->query($sql);

      $sql = sprintf("UPDATE vols SET prepid = '%s' WHERE vid = %d LIMIT 1",$prevVol['firstpid'],$datas['vid']);
//      echo "\n$sql\n";
      $this->db->query($sql);
    }
    return true;
  }
  
}
