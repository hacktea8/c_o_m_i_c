<?php
require_once 'webbase.php';

class Usrbase extends Webbase {
   public $_channel = '';

   public function __construct(){
     parent::__construct();
     $this->load->model('mhmodel');
     $this->_init();
   }

   protected function _init(){
     $this->_channel = $this->mhmodel->getNavList();
     $letterList = $this->mhmodel->getLetterList();
     $friendLink = $this->mhmodel->getFriendLinks();
     $this->assign(array('friendLink'=>$friendLink,'letterList'=>$letterList,'channel'=>$this->_channel));
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
