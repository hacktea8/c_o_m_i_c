<?php 
require_once 'usrbase.php';

class Index extends Usrbase {
  public $_per = 24;

  public function __construct(){
    parent::__construct();
  }
	
  public function index(){
    $indexData = $this->mhmodel->getIndexData();
    $this->assign(array('indexData'=>$indexData,'comicinfo' => $comicinfo));
//var_dump($this->viewData);exit;
    $this->view('index_index');	
  }
	
  public function comicletter($char = 'A',$order = 'new',$page = 1){
    
    $letter = strtoupper($letter);
    $lists = $this->comicmodel->getComicListByLetter($letter,$order,$page);
    $this->assign(array('letterLists' => $lists));
//var_dump($this->viewData);exit;
    $this->view('index_comicletter'); 
  }
  
  public function cate($cid,$order='atime',$page=1){
    $cid = intval($cid);
    $page = intval($page);
    $lists = $this->mhmodel->getComicListByCid($cid, $order, $page, $this->_per);
    $key = 'cate'.$cid.'topdata';
    $cateTopData = $this->mhmodel->getCateTopData($cid);
    $this->load->library('pagination');
    $config['cur_page'] = $page;
    $config['base_url'] = sprintf('/index/cate/%d/%s/',$cid,$page);
    $config['total_rows'] = $this->_channel[$cid]['ctotal'];
    $config['per_page'] = $this->_per;
    $this->pagination->initialize($config);
    $page_string = $this->pagination->create_links();
    $this->assign(array('order'=>$order,'page'=>$page,'page_string'=>$page_string,'cid'=>$cid,'lists' => $lists,'cateTopData'=>$cateTopData));
//echo "<pre>";var_dump($this->viewData);exit;
    $this->view('index_cate');
  }

  public function comic($comicid){
    if(!$comicid)
      return false;

    $comicinfo = $this->mhmodel->getComicinfoByid($comicid);
    $newUpdateData = $this->mhmodel->getComicRenewData($comicinfo['cid']);
    $comicinfo['status'] = $comicinfo['status'] ? '已完结': '连载中';
/*/
echo '<pre>';
var_dump($comicinfo);exit;
/**/
    $this->assign(array('newUpdateData'=>$newUpdateData,'comicinfo' => $comicinfo));
    $this->view('index_comic');
  }
}

