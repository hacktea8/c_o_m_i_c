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
    return 'pages'.$ptid;
  } 
  public function getAllcate(){
    $sql = 'SELECT * FROM `cate` WHERE `flag`=1';
    return $this->db->result_array($sql);
  }
  public function getCateByname($cname){
    if(!$cname){
       return null;
    }
    $sql = sprintf("SELECT `id` FROM `cate` WHERE `name`='%s' limit 1",mysql_real_escape_string($cname));
    $row = $this->db->row_array($sql);
    if(isset($row['id']))
      return $row['id'];

    $sql = sprintf("INSERT INTO `cate`( `name`) VALUES ('%s')",mysql_real_escape_string($cname));
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  public function addComic($data = array()){
    if(!isset($data['name'])){
       return false;
    }
    $sql = $this->db->insert_string('`comic`',$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  public function setPreAndNextVol($datas){
    if(!$datas)
      return null;

    $sql = sprintf("SELECT * FROM vols
                 WHERE vid != %d AND comicid = %d
                 ORDER BY vol DESC LIMIT 1 ",
         intval($datas['vid']),$datas['comicid']);

    $prevVol = $thi->db->query_first($sql);
    if($datas['vol'] != 1 && $prevVol['firstpid']){
      $sql = sprintf("UPDATE vols SET nextpid = %d WHERE id = %d LIMIT 1",$datas['firstpid'],$prevVol['id']);
      echo "\n$sql\n";
      $this->db->query($sql);

      $sql = sprintf("UPDATE vols SET prevpid = %d WHERE id = %d LIMIT 1",$prevVol['firstpid'],$datas['id']);
      echo "\n$sql\n";
      $this->db->query($sql);
    }
    return true;
  }
  
}
