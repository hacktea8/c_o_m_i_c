<?php
require_once 'webbase.php';

class Viewbase extends Webbase {
 public $_channel = '';
 static public $seo = array('title'=>'','keyword'=>'','description'=>'');
 static public $static_html = '1';
 static public $robot = 1;

 public function __construct(){
  parent::__construct();
  $this->load->model('mhmodel');
  $this->_init();
 }

 protected function _init(){
  $k = 'site_init_data';
  $initData = $this->mem->get($k);
  if( empty($initData)){
   $this->_channel = $this->mhmodel->getNavList();
   $letterList = $this->mhmodel->getLetterList();
   $friendLink = $this->mhmodel->getFriendLinks();
   $hotComic = $this->mhmodel->getComicListByCid($cid = 0, $order = 'hits', $page = 1, $per = 10);
   $initData = array('friendLink'=>$friendLink,'letterList'=>$letterList
   ,'channel'=>$this->_channel,'hotComic'=>$hotComic
   );
   $this->mem->set($k,$initData,self::$ttl['1h']);
  }
  $this->_channel = $this->_channel?$this->_channel:$initData['channel'];
  $this->checkIsrobot();
  $this->assign($initData);
 }
 protected function setseo($title = '',$keyword = '',$description = ''){
  $title = $title?$title:'漫画首页';
  self::$seo['title'] = $title.' - '.$this->viewData['web_title'];
  $keyword = $keyword?$keyword:',爱漫画,火影忍者漫画最新,漫画最新,火影忍者最新,在线漫画,火影漫画最新,死神最新,海贼王漫画,网球王子最新,灌蓝高手最新,七龙珠最新';
  self::$seo['keyword'] = $keyword;
  $description = $description?$description:$this->viewData['web_title'].'是国内更新火影忍者漫画速度最快、画质最好的火影忍者漫画网，同时每周三以最快速度更新海贼王漫画、死神漫画等热门在线漫画。';
  self::$seo['description'] = $description;
  $this->viewData['seo'] = self::$seo;
 }
 protected function html_file($view){
  $cache_dir = dirname($view);
  makedir($cache_dir,0777);
  $output = $this->output->get_output();
  file_put_contents($view, $output);
  @chmod($view, 0777);
  die($output);
 }
 protected function assign($data){
  foreach($data as $key => $val){
   $this->viewData[$key] = $val;
  }
 }
 protected function view($view){
  $this->load->view('header',$this->viewData);
  $this->load->view($view);
  $this->load->view('footer');
 }
 protected function checkIsrobot(){
  if( isset($_SERVER['HTTP_USER_AGENT']) && false !== stripos($_SERVER['HTTP_USER_AGENT'],'spider')){
   self::$robot = 0;
  }
 }
}
