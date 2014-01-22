<?php 
require_once 'webbase.php';

class Index extends Webbase {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
           $this->assign(array('comicinfo' => $comicinfo));
           $this->load->view('index_index', $this->viewData);	
	}
	
	
	
	
}

