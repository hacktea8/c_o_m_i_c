<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->database();

class ModelBase extends CI_Model{
	protected $db;
	
	public function __construct(){
		$this->db=$this->database('default',true);
	}
}