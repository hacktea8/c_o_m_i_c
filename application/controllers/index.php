<?php 
require_once 'webbase.php';

class Index extends Webbase {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
die('2222222222222');		
		$this->smarty->display('index.htm');
	}
	
	
	
	
}

