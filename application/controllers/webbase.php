<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_error', 1);
error_reporting(E_ERROR);
class Webbase extends CI_Controller {
    public $viewData = array();
	
    public function __construct(){
    	parent::__construct();
		
		$this->assign(array('domain'=>$this->config->item('domain'),
		'base_url'=>$this->config->item('base_url'),'css_url'=>$this->config->item('css_url'),
		'img_url'=>$this->config->item('img_url'),'js_url'=>$this->config->item('js_url'),
		'toptips'=>$this->config->item('toptips'),'web_title'=>$this->config->item('web_title')));
    }
    public function assign($data){
      foreach($data as $key => $val){
        $this->viewData[$key] = $val;
      }
    }
}

