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
        public function getNavList($flag = 1){
                $where = $flag < 0 ? '' : sprintf("WHERE `flag`=%d", $flag);
                $sql = sprintf("SELECT * FROM `cate` %s", $where);
                $return = $this->db->query($sql)->result_array();
                foreach($return as &$v){
                  $v['url'] = $this->getUrl($key = 'cate',$v['id']);
                }
                return $return;
        }
        public function getFriendLinks(){
                
        }
        public function getUrl($key = 'cate',$p1='',$p2='',$p3=''){
                $url = '';
                if('lists' == $key){
                   $url = sprintf('/index/cate/%d/%s/%d.shtml',$p1,$p2,$p3);
                }elseif('cate' == $key){
                   $url = sprintf('/index/cate/%d.shtml',$p1);
                }elseif('detail' == $key){
                   $url = sprintf('/index/comic/%d.shtml',$p1);
                }elseif('vols' == $key){
                   
                }
                return $url;
        }
}
