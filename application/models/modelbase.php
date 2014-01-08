<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelbase extends CI_Model{
	protected $db;
	
	public function __construct(){
                parent::__construct();
		$this->db = $this->load->database('default',true);
	}
        public function getPicUrl($key){
               
               return 'http://img.hacktea8.com/showpic.php?key='.$key;
        }
}
