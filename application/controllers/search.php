<?php
require_once 'viewbase.php';

class Search extends Viewbase {

 public function __construct(){
  parent::__construct();
 }
 public function index($q='',$order = 0,$page = 1){
  $q = $q ? $q:$this->input->get('q');
  $q = urldecode($q);
  $q = htmlentities($q);
  $page = intval($page);
  $page = $page -1;
  $page = $page < 0 ? 0: $page;
  $list = array();
  $pageSize = 12;
  if($q){
   $this->load->library('yunsearchapi');
   $opt = array('query'=>$q,'start'=>$page*$pageSize,'hits'=>$pageSize);
   $this->yunsearchapi->search($list,$opt);
   $hotKeywords = $this->yunsearchapi->getTopQuery($num=8,$days=30);
   //var_dump($hotKeywords);exit;
   if('OK' == $hotKeywords['status']){
    $hotKeywords = $hotKeywords['result']['items']['emu_hacktea8'];
   }
  }
/*/
echo '<pre>';
var_dump($opt);
var_dump($hotKeywords);
var_dump($list);exit;
/**/
  $page++;
  $hot_search = array();
  $recommen_topic = array();
  $recommen_topic[1] = array();
  $recommen_topic[2] = array();
  $hot_topic = array();
  $hot_topic['hit'] = array();
  $hot_topic['focus'] = array();
  $this->load->library('pagination');
  $config['base_url'] = sprintf('/search/index/%s/%d/',urlencode($q),$order);
  $config['total_rows'] = $list['result']['viewtotal'];
  $config['per_page'] = $pageSize;
  $config['cur_page'] = $page;
  $this->pagination->initialize($config);
  $page_string = $this->pagination->create_links();
  $seo_title = sprintf('正在搜索%s第%d页',$q,$page);
  $this->assign(array('searchlist'=>$list['result'],'kw'=>$q,'q'=>$q
  ,'page_string'=>$page_string,'hot_search'=>$hot_search
  ,'recommen_topic'=>$recommen_topic,'hot_topic'=>$hot_topic
  ,'seo_title'=>$seo_title
  ));
  $this->load->view('search_index',$this->viewData);
 }
}
