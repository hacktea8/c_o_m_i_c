<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagebase extends CI_Controller {
    public $smarty;
	public $picDomain;
	public $domain;
	
    public function __construct(){
    	parent::__construct();
        require(BASEPATH.'/libraries/smarty/Smarty.class.php');
    	$this->smarty=new Smarty;
    	$this->smarty->debugging = true;
		//$this->smarty->caching = true;
		//$this->smarty->cache_lifetime = 120;
		$this->smarty->template_dir=APPPATH.'views/';
		$this->smarty->compile_dir=APPPATH.'cache/compile_dir';
		$this->smarty->cache_dir=APPPATH.'cache/cache';
		$this->smarty->left_delimiter='<!--{';
		$this->smarty->right_delimiter='}-->';
		
    }
	
}