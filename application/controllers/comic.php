<?php
require_once 'webbase.php';


class Comic extends Webbase {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($comicid=0){
		if(!$comicid)
		   return false;

	        $this->load->view('comic_index', $this->viewData);	
	}
}
