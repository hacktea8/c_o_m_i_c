<?php
require_once 'webbase.php';

class Usrbase extends Webbase {

   public function __construct(){
     parent::__construct();
     $this->load->model('mhmodel');
     $this->_init();
   }

   protected function _init(){
     $channel = $this->mhmodel->getNavList();
     $letterList = $this->mhmodel->getLetterList();

     $this->assign(array('letterList'=>$letterList,'channel'=>$channel));
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
