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
  public function getFriendLinks($flag = 1){
     $where = $flag < 0 ? '' : sprintf("WHERE `flag`=%d", $flag);
     $sql = sprintf("SELECT * FROM `friendlinks` %s", $where);
     $list = $this->db->query($sql)->result_array();
     return $list;
  }
        public function getNavList($flag = 1){
                $where = $flag < 0 ? '' : sprintf("WHERE `flag`=%d", $flag);
                $sql = sprintf("SELECT * FROM `cate` %s", $where);
                $list = $this->db->query($sql)->result_array();
                $return = array();
                foreach($list as &$v){
                  $v['url'] = $this->getUrl($key = 'cate',$v['id']);
                  $return[$v['id']] = $v;
                }
                return $return;
        }
        public function getLetterList(){
                $sql = sprintf("SELECT * FROM  `letters` ORDER BY  `sort`");
                $return = $this->db->query($sql)->result_array($sql);
                foreach($return as &$v){
                  $v['url'] = $this->getUrl($key = 'letter',$v['id']);
                }
                return $return;
        }
        public function getUrl($key = 'cate',$p1='',$p2='',$p3=''){
                $url = '';
                if('lists' == $key){
                   $url = sprintf('/index/cate/%d/%s/%d.shtml',$p1,$p2,$p3);
                }elseif('cate' == $key){
                   $url = sprintf('/index/cate/%d.shtml',$p1);
                }elseif('comic' == $key){
                   $url = sprintf('/index/comic/%d.shtml',$p1);
                }elseif('vol' == $key){
                   $url = sprintf('/index/vol/%d/%d.shtml',$p1,$p2);
                }elseif('letter' == $key){
                   $url = sprintf('/index/comicletter/%d.shtml',$p1);
                }
                return $url;
        }
}
