<?php 
require_once 'webbase.php';

class Index extends Webbase {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		
		$this->smarty->display('index.htm');
	}
	
	
	
	
}

