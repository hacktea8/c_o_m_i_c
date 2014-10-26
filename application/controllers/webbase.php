<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_error', 1);
error_reporting(E_ERROR);
class Webbase extends CI_Controller {
    public $viewData = array();
    protected $userInfo=array('uid'=>0,'uname'=>'','isvip'=>0);
    public $adminList=array(3);
    protected $isadmin=0;	
    public function __construct(){
    	parent::__construct();
	$this->load->library('basecommon');	
	$this->load->model('usermodel');	
        $this->load->helper('url');
        //解析UID
        $uid = $this->basecommon->getSynuserUid();
        $uinfo = $this->basecommon->getSynuserInfo($uid);
        $this->userInfo = $this->usermodel->getUserInfo($uinfo);
        $_c = $this->uri->segment(1, 'index');
        $_a = $this->uri->segment(2, 'index');
	$this->assign(array('domain'=>$this->config->item('domain'),
		'base_url'=>$this->config->item('base_url'),'css_url'=>$this->config->item('css_url'),'_c'=>$_c,'_a'=>$_a,
		'img_url'=>$this->config->item('img_url'),'js_url'=>$this->config->item('js_url'),
		'toptips'=>$this->config->item('toptips'),'web_title'=>$this->config->item('web_title')
                ,'version'=>20140109,'login_url'=>$this->config->item('login_url'),'uinfo'=>$this->userInfo
                
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
}

