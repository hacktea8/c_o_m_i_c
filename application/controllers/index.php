<?php 
require_once 'usrbase.php';

class Index extends Usrbase {
  public $_per = 48;

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
  
  public function cate($cid,$order='new',$page=1){
    $lists = $this->mhmodel->getComicListByCid($cid, $order, $page, $this->_per);
    $key = 'cate'.$cid.'topdata';
    $cateTopData = $this->mhmodel->getCateTopData($cid);
    $this->assign(array('lists' => $lists,'cateTopData'=>$cateTopData));
//var_dump($this->viewData);exit;
    $this->view('index_cate');
  }

  public function comic($comicid){
    if(!$comicid)
      return false;

    $comicinfo = $this->mhmodel->getComicinfoByid($comicid);

    $comicinfo['id'] = $comicid;
    $comicinfo['atime'] = date('Y-m-d', $comicinfo['atime']);
    $comicinfo['rtime'] = date('Y-m-d', $comicinfo['rtime']);
    $comicinfo['status'] = $comicinfo['status'] ? '已完结': '连载中';
/*/
echo '<pre>';
var_dump($comicinfo);exit;
/**/
    $this->assign(array('comicinfo' => $comicinfo));
    $this->view('index_comic');
  }
}

