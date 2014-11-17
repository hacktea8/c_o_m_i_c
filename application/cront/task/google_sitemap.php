#!/usr/local/php/bin/php -q
<?php

$root=dirname(__FILE__).'/';
define('BASEPATH', $root.'../../../');
//echo BASEPATH;exit;
require_once($root.'../grab/db.class.php');

class model{
  public $db;
  public function __construct(){
    $this->db = new DB_MYSQL();
  }
  public function getList($page = 1,$limit = 100){
    $start = $page * $limit;
    //$table = $this->db->getTable('comic');
    $table = 'comic';
    $sql = sprintf('SELECT `id`,`rtime` FROM %s WHERE `flag`=1 LIMIT %d,%d',$table,$start,$limit);
     return $this->db->result_array($sql);
  }
  public function addIndex($data = array()){
    $sql = sprintf("SELECT * FROM %s WHERE `type`=%d AND `index`=%d limit 1",$this->db->getTable('sitemap'),$data['type'],$data['index']);
    $row = $this->db->row_array($sql);
    if($row){
      return $row['id'];
    }
    $sql = $this->db->insert_string($this->db->getTable('sitemap'),$data);
    $this->db->query($sql); 
    return $this->db->insert_id();
  }
  public function getIndexList($type){
    $table = $this->db->getTable('sitemap');
    $sql = sprintf('SELECT   `index` FROM %s WHERE `type`=%d ORDER BY `id` DESC',$table,$type);
    return $this->db->result_array($sql);
  }
  public function getMaxIndex($type){
    $table = $this->db->getTable('sitemap');
    $sql = sprintf('SELECT  `aid`, `index` FROM %s WHERE `type`=%d ORDER BY `id` DESC  LIMIT 1',$table,$type);
    $row = $this->db->row_array($sql);
    $index = isset($row['index'])?$row['index']:0;
    if($index && $row['aid']){
      $index++;
    }
    return $index;
  }
  public function setIndex($data,$where){

    $sql = $this->db->update_string($this->db->getTable('sitemap'),$data,$where);
    $this->db->query($sql);
    return 1;
  }
  public function getListNum($aid){
  }
}

$type = 1;
$base_url = 'http://mh.emubt.com';
$count = 1;
$countLimit = 3000;
$model = new model();
$startIndex = $model->getMaxIndex($type);
$sitemap = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$tmp = '';
/**/
for($p = $startIndex;;$p++){
 $list = $model->getList($p,$countLimit);
 $list = $list ? $list: array();
 foreach($list as $val){
  $tmp .= '<url><loc>'.$base_url.'/index/comic/'.$val['id'].'</loc><lastmod>'.date('Y-m-d',$val['rtime']).'</lastmod><changefreq>weekly</changefreq><priority>1</priority></url>';
  }
  if( $tmp){
   $tmp = $sitemap.$tmp.'</urlset>';
   $index_file = BASEPATH.'google_sitemap'.$p.'.xml';
   file_put_contents($index_file,$tmp);
   @chmod($index_file, 0777);
   $model->addIndex(array('type'=>$type,'aid'=>0,'index'=>$p,'update'=>$val['rtime']));
   $tmp = '';
     
sleep(5);
  }
   if(count($list) == $countLimit){
      $model->setIndex(array('aid'=>1),array('`index`'=>$p,'`type`'=>$type));
   }
   if(empty($list)){
     break;
   }
}
/**/

$sitemap_index = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$indexList = $model->getIndexList($type);
foreach($indexList as $val){
  $sitemap_index .= '<sitemap><loc>'.$base_url.'/google_sitemap'.$val['index'].'.xml</loc><lastmod>'.date('Y-m-d').'</lastmod></sitemap>';
}

$sitemap_index .= '</sitemapindex>';
$sf = BASEPATH.'google_sitemap.xml';
file_put_contents($sf, $sitemap_index);
@chmod($sf, 0777);
echo "\n=== work success! ==\n";
?>
