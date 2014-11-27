<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Webbase extends CI_Controller {
 static public $ttl = array('5m'=>300,'15m'=>900,'30m'=>1800,'1h'=>3600,'3h'=>10800,'6h'=>21600,'9h'=>32400,'12h'=>43200,'1d'=>86400,'3d'=>253200,'5d'=>432000,'7d'=>604800);
 public $viewData = array();
 protected $userInfo = array('uid'=>0,'uname'=>'','isvip'=>0);
 public $adminList = array(3);
 protected $isadmin = 0;	
 public $redis = '';
 public $mem = '';
 public function __construct(){
  parent::__construct();
  $this->load->library('memcached');
  $this->mem = &$this->memcached;
  $this->load->library('rediscache');
  $this->redis = &$this->rediscache;
  $this->load->library('basecommon');	
  $this->load->model('usermodel');	
  $this->load->helper('url');
  //解析UID
  $uid = $this->basecommon->getSynuserUid();
  $uinfo = $this->basecommon->getSynuserInfo($uid);
  $this->userInfo = $this->usermodel->getUserInfo($uinfo);
  $_c = $this->segment(1, 'index');
  $_a = $this->segment(2, 'index');
  $this->assign(array('domain'=>$this->config->item('domain'),
  'base_url'=>$this->config->item('base_url'),'css_url'=>$this->config->item('css_url')
  ,'_c'=>$_c,'_a'=>$_a,'email'=>$this->config->item('email')
  ,'cdn_url'=>$this->config->item('cdn_url')
  ,'img_url'=>$this->config->item('img_url'),'js_url'=>$this->config->item('js_url'),
  'toptips'=>$this->config->item('toptips'),'web_title'=>$this->config->item('web_title')
  ,'version'=>20141125,'login_url'=>$this->config->item('login_url'),'uinfo'=>$this->userInfo
  
  ));
  //  var_dump($uinfo);//exit;
 }
 public function checkLogin(){
  if(isset($this->userInfo['uid']) &&$this->userInfo['uid']>0){
   return true;
  }else{
   return false;
  }
 }
 public function checkIsadmin(){
  if(!$this->checkLogin()){
   redirect($this->config->item('login_url').$this->config->item('base_url'));
  }
  if(in_array($this->userInfo['groupid'],$this->adminList)){
   return true;
  }
  foreach($this->userInfo['groups'] as $gid){
   if(in_array($gid,$this->adminList)){
    return true;
   }
  }
  return false;
 }
 protected function segment($i, $default = 'maindex'){
  $q = $this->uri->rsegment($i, $default);
  $q = str_replace('.','',$q);
  return $q ? $q: $default;
 }
 protected function debug($data){
  echo "<pre>";var_dump($data);exit;
 }
 protected function cookie($name,$value = '', $ttl = 3600){
  if($value){
   $cookie = array(
   'name'   => $name,
   'value'  => $value,
   'expire' => $ttl,
   'domain' => '',
   'path'   => '/',
   'prefix' => '',
   'secure' => false
   );
   $this->input->set_cookie($cookie);
   return 1;
  }
  $cookie = $this->input->cookie($name);
  return $cookie;
 }
}
