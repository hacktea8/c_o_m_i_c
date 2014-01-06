<?php

require_once 'webbase.php';


class Pages extends Webbase {
        
	public function __construct(){
		parent::__construct();
                $this->load->model('pagemodel'); 
	}
	
	public function vol($comicid, $vid, $p = 1){
                $this->pagemodel->test();
                $this->load->view('comic_page', $this->viewData);
		$this->smarty->display('vol.html');
	}
}
