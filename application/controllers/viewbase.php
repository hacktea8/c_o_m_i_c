<?php
require_once 'webbase.php';

class Viewbase extends Webbase {
 public $_channel = '';
 static public $seo = array('title'=>'','keyword'=>'','description'=>'');
 
 public function __construct(){
  parent::__construct();
  $this->load->model('mhmodel');
  $this->_init();
 }

 protected function _init(){
  $this->_channel = $this->mhmodel->getNavList();
  $letterList = $this->mhmodel->getLetterList();
  $friendLink = $this->mhmodel->getFriendLinks();
  $hotComic = $this->mhmodel->getComicListByCid($cid = 0, $order = 'hits', $page = 1, $per = 10);
  $initData = array('friendLink'=>$friendLink,'letterList'=>$letterList
  ,'channel'=>$this->_channel,'hotComic'=>$hotComic
  );
  $this->assign($initData);
 }
 protected function setseo($title = '',$keyword = '',$description = ''){
  $title = $title?$title:'首页';
  self::$seo['title'] = $title.' - '.$this->viewData['web_title'];
  $keyword = $keyword?$keyword:'火影忍者漫画,漫画,火影忍者,在线漫画,火影漫画,死神,海贼王漫画,网球王子,灌蓝高手,七龙珠';
  self::$seo['keyword'] = $keyword;
  $description = $description?$description:$this->viewData['web_title'].'是国内更新火影忍者漫画速度最快、画质最好的火影忍者漫画网，同时每周三以最快速度更新海贼王漫画、死神漫画等热门在线漫画。';
  self::$seo['description'] = $description;
  $this->viewData['seo'] = self::$seo;
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
}
