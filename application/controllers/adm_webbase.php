<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_errors',1);
error_reporting(E_ALL);
include_once('webbase.php');

class Adm_webbase extends Webbase {

	 public function __construct(){
         parent::__construct();
             if(!$this->checkIsadmin()){
                redirect('/');
             }
	     $this->load->_ci_tpl_path='admin/';
	 }
	/**
     *
	 */
}
