<?php 
require_once 'usrbase.php';

class Index extends Usrbase {
  public function __construct(){
    parent::__construct();
  }
	
  public function index(){
    $this->assign(array('comicinfo' => $comicinfo));
//var_dump($this->viewData);exit;
    $this->view('index_index');	
  }
	
  public function onechar($char = 'A'){
    $this->assign(array('comicinfo' => $comicinfo));
//var_dump($this->viewData);exit;
    $this->view('index_onechar'); 
  }
	
	
}

