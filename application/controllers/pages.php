<?php

require_once 'webbase.php';


class Pages extends Webbase {
        
	public function __construct(){
		parent::__construct();
                $this->load->model('pagemodel'); 
	}
	
	public function vol($cid, $vid, $p = 1){
                $comicinfo = $this->pagemodel->getComicinfoByid($cid);
                $volinfo = $this->pagemodel->getVolinfoByid($cid, $vid);
                if(!$volinfo['pageset']){
                   $volinfo['pageset'] = json_encode($this->pagemodel->getPagesetInfoByid($cid, $vid));
                   $this->pagemodel->updateInfoByid('vols', array('pageset'=>$volinfo['pageset']), array('cid'=>$cid,'vid'=>$vid));
                }
                $volinfo['pageset'] = json_decode($volinfo['pageset'], 1);
                $volinfo['pagesize'] = count($volinfo['pageset']);
                $volinfo['pageinfo'] = $volinfo['pageset'][$p - 1];
                $volinfo['pagesetimg'] = array();
                foreach($volinfo['pageset'] as $val){
                  $volinfo['pagesetimg'][] = '"'.$val['img'].'"';
                }
                $tmp = explode('_', $volinfo['nextpid']);
                $volinfo['n'] = array_shift($tmp);
                $tmp = explode('_', $volinfo['prepid']);
                $volinfo['p'] = array_shift($tmp);
                
                $volinfo['pagesetimg'] = implode(',',$volinfo['pagesetimg']);
                $comicinfo['volinfo'] = $volinfo;
/*/
echo '<pre>';
var_dump($comicinfo);
exit;
/**/
               $this->assign(array('comicinfo' => $comicinfo)); 

               $this->load->view('comic_page', $this->viewData);
	}
        public function chapter($cb,$cid,$vid){
               echo $_GET['cb'];;die(json_encode(array('s'=>1,'p'=>1,'n'=>2)));
        }
}
