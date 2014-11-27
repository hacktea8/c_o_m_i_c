<?php 
require_once 'viewbase.php';

class Index extends Viewbase {
 public $_per = 24;
 public $_self = 0;

 public function __construct(){
  parent::__construct();
 }
	
 public function index(){
  $indexData = $this->mhmodel->getIndexData();
  $navTotal = count($this->_channel);
  $indexColdBlock = $this->mhmodel->getIndexColdBlock($navTotal,$block = 4, $limit = 10);
  $this->assign(array('indexData'=>$indexData,'comicinfo' => $comicinfo,'indexColdBlock' => $indexColdBlock));
  $this->setseo();
//var_dump($this->viewData);exit;
  $this->view('index_index');
  if(self::$robot && self::$static_html){
   $view = APPPATH.'../index.html';
   $this->html_file($view);
  }
 }
	
 public function comicletter($char = 'A',$order = 'new',$page = 1){   
  $letter = strtoupper($letter);
  $lists = $this->comicmodel->getComicListByLetter($letter,$order,$page);
  $this->assign(array('letterLists' => $lists));
  $title = sprintf('字母%s开头的漫画排序方式%s第%d页',$char,$order,$page);
  $this->setseo($title);
//var_dump($this->viewData);exit;
  $this->view('index_comicletter'); 
 }
  
 public function cate($cid = 0,$order='atime',$page=1){
  $cid = intval($cid);
  $page = intval($page);
  $lists = $this->mhmodel->getComicListByCid($cid, $order, $page, $this->_per);
  $key = 'cate'.$cid.'topdata';
  $mk = 'site_cate_topdata'.$cid;
  $cateTopData = $this->mem->get($mk);
  if( empty($cateTopData)){
   $cateTopData = $this->mhmodel->getCateTopData($cid);
   $this->mem->set($mk,$cateTopData,self::$ttl['1h']);
  }
  $this->load->library('pagination');
  $config['cur_page'] = $page;
  $config['base_url'] = sprintf('/index/cate/%d/%s/',$cid,$page);
  $config['total_rows'] = $this->_channel[$cid]['ctotal'];
  $config['per_page'] = $this->_per;
  $this->pagination->initialize($config);
  $page_string = $this->pagination->create_links();
  $this->assign(array('order'=>$order,'page'=>$page,'page_string'=>$page_string,'cid'=>$cid,'lists' => $lists,'cateTopData'=>$cateTopData));
  $title = sprintf('%s漫画第%d页',$this->_channel[$cid]['name'],$page);
  $this->setseo($title);
//echo "<pre>";var_dump($this->viewData);exit;
  $this->view('index_cate');
 }

 public function comic($comicid = 0){
  if( !$comicid)
   return false;

  $comicinfo = $this->mhmodel->getComicinfoByid($comicid);
  $mk = 'site_comic_newupdate'.$comicinfo['cid'];
  $newUpdateData = $this->mem->get($mk);
  if( empty($newUpdateData)){
   $newUpdateData = $this->mhmodel->getComicRenewData($comicinfo['cid']);
   $this->mem->set($mk,$newUpdateData,self::$ttl['1h']);
  }
  $comicinfo['status'] = $comicinfo['status'] ? '已完结': '连载中';
/*/
echo '<pre>';
var_dump($comicinfo);exit;
/**/
  $this->assign(array('newUpdateData'=>$newUpdateData,'comicinfo' => $comicinfo));
  $title = sprintf('%s漫画 更新状态%s',$comicinfo['name'],$comicinfo['status']);
  $keyword = sprintf('%s的漫画,%s漫画',$comicinfo['author'],$this->_channel[$comicinfo['cid']]['name']);
  $intro = trim(strip_tags($comicinfo['detail']));
  $intro = mb_substr($intro,0,180,'UTF-8');
  $this->setseo($title,$keyword,$intro);
  $this->view('index_comic');
  if(self::$robot && self::$static_html){
   $view = CACHEDIR.($comicid%10).'/'.$comicid.'.html';;
   $this->html_file($view);
  }
 }
 public function volinfo($cid = 0,$vid = 0){
  if( !$cid || !$vid){
   return 0;
  }
  header("Content-type:text/javascript");
  $this->_self = 1;
  $comicinfo = $this->vol($cid, $vid);
  $this->_self = 0;
  $code = 'var cInfo={"cid":'.$comicinfo['volinfo']['vid'].',"p":"'.$comicinfo['volinfo']['p'].'","n":"'.$comicinfo['volinfo']['n'].'","cname":"'.$comicinfo['volinfo']['name'].'","burl":"/index/vol/'.$comicinfo['volinfo']['cid'].'/'.$comicinfo['volinfo']['vid'].'","files":['.$comicinfo['volinfo']['pagesetimg'].'],"bid":'.$comicinfo['volinfo']['cid'].',"len":'.$comicinfo['volinfo']['pagesize'].',"bname":"'.$comicinfo['name'].'","finished":"'.$comicinfo['state'].'"};';
  $arand = 62;//mt_rand(62,100);
  $volinfo = self::js_encode($code,$arand);
  $this->load->view('index_volinfo', compact('volinfo'));
 }
 public function vol($cid = 0, $vid = 0, $p = 1){
  $comicinfo = $this->mhmodel->getComicinfoByid($cid);
  $volinfo = $this->mhmodel->getVolinfoByid($cid, $vid);
  if( !$volinfo['pageset']){
   $volinfo['pageset'] = json_encode($this->mhmodel->getPagesetInfoByid($cid, $vid));
   $this->mhmodel->updateInfoByid('vols', array('pageset'=>$volinfo['pageset']), array('cid'=>$cid,'vid'=>$vid));
  }
  $volinfo['pageset'] = json_decode($volinfo['pageset'], 1);
  $volinfo['pagesize'] = count($volinfo['pageset']);
  $volinfo['pageinfo'] = $volinfo['pageset'][$p - 1];
  $volinfo['pagesetimg'] = array();
  foreach($volinfo['pageset'] as $val){
   $volinfo['pagesetimg'][] = '"'.$val['cover'].'"';
  }
  $tmp = explode('_', $volinfo['nextpid']);
  $volinfo['n'] = array_shift($tmp);
  $tmp = explode('_', $volinfo['prepid']);
  $volinfo['p'] = array_shift($tmp);
                
  $volinfo['pagesetimg'] = implode(',',$volinfo['pagesetimg']);
  $comicinfo['volinfo'] = $volinfo;
  if($this->_self){
   return $comicinfo;
  }
/*/
echo '<pre>';
var_dump($comicinfo);
exit;
/**/
  $this->assign(array('comicinfo' => $comicinfo,'comicid'=>$cid,'volid'=>$vid)); 
  $this->load->view('comic_page', $this->viewData);
  if(self::$robot && self::$static_html){
   $view = CACHEDIR.($cid%10)."/{$cid}_{$vid}.html";
   $this->html_file($view);
  }
 }
 static protected function js_encode($code = '',$a = 62){
return $code;
  $code = preg_replace('#[\r\n]+#','',$code);
  $code = preg_replace("#'#","\\'",$code);
  preg_match_all('#\b(\w+)\b#',$code,$tmp);
  sort($tmp[1],SORT_STRING);
  $tmp = $tmp[1];
  $dict = array();
  $t = '';
  $len = count($tmp);
  for($i=0; $i<$len; $i++){
   if($tmp[$i] != $t){
    array_push($dict,($t = $tmp[$i]));
   }
  }
  $len = count($dict);
  for($i=0; $i<$len; $i++){
try{
  $ch = self::num($i,$a);
}catch(Exception $e){
  var_dump( $e->getMessage());exit;
 }
  $code = preg_replace('#\b'.$dict[$i].'\b#U',$ch,$code);
  if($ch == $dict[$i])
   $dict[$i]='';
  }
  $str = "eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\\\b'+e(c)+'\\\\b','g'),k[c]);return p}("."'".$code."',".$a.",".$len.",'".implode('|',$dict)."'.split('|'),0,{}));";
  return $str;
 }
 static protected function num($c,$ga){
  $f = ($c<$ga?'':self::num(intval($c/$ga)));
  $s = ($c=$c%$ga);
  if($s>35){
   $r = chr($c+29);

  }else{
   $r = base_convert($c,10,36);
  }
  return chr(ord($r)+ord($f));
 }
}
