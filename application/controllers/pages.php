<?php

require_once 'webbase.php';


class Pages extends Webbase {
        
	public function __construct(){
		parent::__construct();
                $this->load->model('pagemodel'); 
	}
	
	public function vol($cid, $vid, $p = 1){
                $volinfo = $this->pagemodel->getVolinfoByid($cid, $vid);
                if(!$volinfo['pageset']){
                   $volinfo['pageset'] = json_encode($this->pagemodel->getPagesetInfoByid($cid, $vid));
                   $this->pagemodel->updateInfoByid('vols', array('pageset'=>$volinfo['pageset']), array('cid'=>$cid,'vid'=>$vid));
                }
                $volinfo['pageset'] = json_decode($volinfo['pageset'], 1);
                $volinfo['pagesize'] = count($volinfo['pageset']);
                $volinfo['pageinfo'] = $volinfo['pageset'][$p - 1];

/*
echo '<pre>';
var_dump($volinfo);
exit;
*/
               $comicinfo['volinfo'] = $volinfo;
               $this->assign(array('comicinfo' => $comicinfo)); 

               $this->load->view('comic_page', $this->viewData);
	}
}
