<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_error', 1);
error_reporting(E_ERROR);
class Uploadcomic extends CI_Controller {
    protected $sec = 'mh-hacktea8-com';
    public function __construct(){
        $q = $this->input->post('q');
        if( !$this->checkseccode($q)){
           die(0);
        }
    	parent::__construct();
    }
    public function updatecomic(){

    }
    public function updatevols(){

    }
    public function updatepages(){

    }
    protected function checkseccode($q){
        if(!$q){
           return false;
        }
        $code = $this->sec.date('Y-m-d H:i').'00';
        $code = md5(base64_encode(md5($code)));
        return $code == $q;
    }
	
}

