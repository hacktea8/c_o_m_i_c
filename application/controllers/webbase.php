<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_error', 1);
error_reporting(E_ERROR);
class Webbase extends CI_Controller {
    public $smarty;
	
    public function __construct(){
    	parent::__construct();
        require(BASEPATH.'/libraries/smarty/Smarty.class.php');
    	$this->smarty=new Smarty;
    	//$this->smarty->debugging = true;
		//$this->smarty->caching = true;
		//$this->smarty->cache_lifetime = 120;
		$this->smarty->template_dir=APPPATH.'views/';
		$this->smarty->compile_dir=APPPATH.'cache/compile_dir';
		$this->smarty->cache_dir=APPPATH.'cache/cache';
		$this->smarty->left_delimiter='<!--{';
		$this->smarty->right_delimiter='}-->';
		
		$this->smarty->assign(array('domain'=>$this->config->item('domain'),
		'base_url'=>$this->config->item('base_url'),'css_url'=>$this->config->item('css_url'),
		'img_url'=>$this->config->item('img_url'),'js_url'=>$this->config->item('js_url'),
		'toptips'=>$this->config->item('toptips'),'web_title'=>$this->config->item('web_title')));
    }
	
}

