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
	public function getComicinfoByid($cid){
		if(!$cid){
			return false;
		}
                $sql = sprintf('SELECT %s FROM `comic` WHERE flag=1 AND cid=%d LIMIT 1', $this->_comiccol,$cid);
		$info = $this->db->query($sql)->row_array(); 

		return $info;
	}
}
