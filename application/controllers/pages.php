<?php
require_once 'pagebase.php';


class Pages extends Pagebase {

	public function __construct(){
		parent::__construct();
	}
	
	public function vol(){
		$this->smarty->display('vol.html');
	}
}