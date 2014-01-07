<?php

require_once 'webbase.php';


class Pages extends Webbase {
        
	public function __construct(){
		parent::__construct();
                $this->load->model('pagemodel'); 
	}
	
	public function vol($cid, $vid, $p = 1){
                $volinfo = $this->pagemodel->getVolinfoByid($cid, $vid);
                var_dump($volinfo);
                if(!$volinfo['pageset']){
                   $volinfo['pageset'] = json_encode($this->pagemodel->getPagesetInfoByid($cid, $vid));
                   $this->pagemodel->updateInfoByid('vols', array('pageset'=>$volinfo['pageset']), array('cid'=>$cid,'vid'=>$vid));
                }
                $volinfo['pageset'] = json_decode($volinfo['pageset'], 1);
var_dump($volinfo);
exit;
                $this->load->view('comic_page', $this->viewData);
	}
}
