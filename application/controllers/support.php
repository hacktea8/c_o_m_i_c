<?php
require_once 'usrbase.php';

class Support extends Usrbase {

  public function __construct(){
    parent::__construct();
  }

  public function jubao(){

    $this->assign(array('comicinfo' => $comicinfo));
    $this->view('support_jubao');	
  }

  public function contact(){
    $this->view('support_contact');
  }
  public function copyright(){
    $this->assign(array('_a' => 'contact'));
    $this->view('support_copyright');
  }
  public function copyright2(){
    $this->assign(array('_a' => 'contact'));
    $this->view('support_copyright2');
  }
}
