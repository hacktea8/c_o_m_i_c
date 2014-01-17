<?php
require_once 'webbase.php';


class Comic extends Webbase {

	public function __construct(){
		parent::__construct();
                $this->load->model('comicmodel');
	}
	
	public function index($comicid=0){
		if(!$comicid)
		   return false;

                $comicinfo = $this->comicmodel->getComicinfoByid($comicid);

                $comicinfo['id'] = $comicid;
                $comicinfo['atime'] = date('Y-m-d', $comicinfo['atime']);
                $comicinfo['rtime'] = date('Y-m-d', $comicinfo['rtime']);
                $comicinfo['status'] = $comicinfo['status'] ? '已完结': '连载中';
/*/
echo '<pre>';
var_dump($comicinfo);exit;
/**/
                $this->assign(array('comicinfo' => $comicinfo));
	        $this->load->view('comic_index', $this->viewData);	
	}
}
