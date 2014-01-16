<?php
require_once 'modelbase.php';

class Pagemodel extends Modelbase{
        public $_table = 'page';
        public $_pagecol = '`pid`, `vid`, `cid`, `img`, `isimg`, `isadult`, `hits`, `rtime`';
	public $_volcol = '`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
        public $_pagesetcol = '`pid`, `img`, `isadult`, `hits`, `rtime`';
        public $_comiccol = '`name`,`letter`,`state`';

	public function __construct(){
		parent::__construct();
		
	}
	public function getTable($vid){
		return 'page'.($vid % 10);
	}
	public function getPageInfoById($cid, $vid, $pid){
		if(!$cid || !$vid || !$pid)
		   return false;
		   
                $table = $this->getTable($vid);
		$sql=sprintf('SELECT %s FROM %s WHERE `pid`=%d AND `vid`=%d AND `cid`=%d LIMIT 1', $this->_pagecol, $table, $pid, $vid, $cid);
		$row = $this->db->query($sql)->row_array();
                $row['cover'] = $this->getPicUrl($row['img']);
	}

	public function getPagesetInfoByid($cid, $vid){
		if(!$cid || !$vid)
		   return false;
		   
                $table = $this->getTable($vid);
		$sql=sprintf('SELECT %s FROM %s WHERE `vid`=%d AND `cid`=%d LIMIT 200',$this->_pagesetcol, $table, $vid, $cid);
		$list = $this->db->query($sql)->result_array();
                foreach($list as &$val){
                  $val['cover'] = $this->getPicUrl($val['img']);
                }
                return $list;
	}
        public function updateInfoByid($table, $data, $id){
                if(!$table || !$data || !$id)
                   return false;

                $where = array();
                foreach($id as $key => $val){
                  $where[] = sprintf(" `%s`='%s'",$key, mysql_real_escape_string($val));
                }
                $where = implode(' AND ', $where).' LIMIT 1';
                $sql =  $this->db->update_string($table, $data, $where);
                return $this->db->query($sql);
        }
	public function getVolinfoByid($cid, $vid){
		if(!$cid || !$vid){
		   return false;
		}
		$sql=sprintf('SELECT %s FROM vols WHERE `vid`=%d AND `cid`=%d LIMIT 1',$this->_volcol, $vid, $cid);
		return $this->db->query($sql)->row_array();
	}
	public function updateComicDetail($info){
		if(!$info){
			return false;
		}
		$sql='UPDATE `comic` SET `detail`="'.mysql_escape_string($info['detail']).'" 
		WHERE `id`='.$info['id'].' LIMIT 1';
		$this->db->query($sql);
	}
	public function InsertComicPages($data){
		//if($data['cid']!=2)
		//var_dump($data);exit;
		$sql=sprintf("INSERT ignore INTO `pages`(`pid`, `vid`, `cid`, `prepid`, `nextpid`, 
		`img`, `isimg`, `isadult`, `hits`, `rtime`, `flag`) VALUES 
		(%d,%d,%d,0,0,'%s',0,0,0,%d,1)",$data['pid'],$data['cid'],$data['bid'],$data['img'],time());
		return $this->db->query($sql);
		
	}
	public function InsertComicVols($data){
		//if($data['cid']!=83458)
		
		$cname='#[^\d]+#is';
		//var_dump(preg_replace($cname, '', $data['cname']));exit;
		$cname=preg_replace($cname, '', $data['cname']);
		$sql=sprintf("INSERT ignore INTO `vols`(`vid`, `cid`, `vnum`, `name`, `cover`, `isimg`, `previd`, 
		`nextvid`, `isadult`, `hits`, `rtime`, `flag`) VALUES (%d,%d,'%s','%s',0,0,0,0,0,0,%d,1)",
		$data['cid'],$data['bid'],intval($cname),$data['cname'],time());
		//echo $sql;exit;
		return $this->db->query($sql);
	}
	public function UpdateCollectComicPages($comicid){
		$sql="UPDATE `updatecomic` SET `volflag`=0 WHERE comicid=".intval($comicid)." LIMIT 1";
		return $this->db->query($sql);
	}
	public function getNoneUpdateComicList($num){
		if(!$num){
			return false;
		}
		$sql='SELECT `comicid` FROM `updatecomic` WHERE volflag=1 LIMIT '.$num;
		return $this->db->query($sql)->result_array();
	}
	public function getNullDetailId(){
		$sql='SELECT id FROM `comic` WHERE `detail` = \'\'';
		return $this->db->query($sql)->result_array();
	}
	public function getComicByName($name){
		if(!$name){
			return false;
		}
		$sql='SELECT `id`, `cid`, `name`, `cover`, `isimg`, `author`, `detail`, `letter`, 
		`relatecomic`, `isadult`, `state`, `hits`, `vtotal`, `atime`, `rtime`, `flag` 
		FROM `comic` WHERE name="'.mysql_escape_string($name).'" LIMIT 1';
		return $this->db->query($sql)->row_array();
	}
	public function getComicById($id){
		if(!$id){
			return false;
		}
		$sql='SELECT `id`, `cid`, `name`, `cover`, `isimg`, `author`, `detail`, `letter`, 
		`relatecomic`, `isadult`, `state`, `hits`, `vtotal`, `atime`, `rtime`, `flag` 
		FROM `comic` WHERE id='.intval($id).' LIMIT 1';
		return $this->db->query($sql)->row_array();
	}
	public function upcomicupdate($comicid){
		if(!$comicid){
			return false;
		}

		$sql='UPDATE `updatecomic` SET flag =0 WHERE comicid='.$comicid.' LIMIT 1';
		$this->db->query($sql);
	}
	public function getupcomicByid($id){
		if(!$id){
			return false;
		}
		$sql='SELECT `comicid`, `cid` FROM `updatecomic` WHERE comicid='.$id.' LIMIT 1';
		//echo $sql;exit;
		return $this->db->query($sql)->row_array();
	}
	public function getUpcomicByNum($num,$cid){
		if(!$num){
			return false;
		}
		$sql='SELECT `comicid`, `cid` FROM `updatecomic` WHERE flag=1 AND cid='.$cid.' LIMIT '.$num;
		return $this->db->query($sql)->result_array();
	}
	public function addupcomic($comicid,$cid){
		if(!$comicid){
			return false;
		}
		$sql='INSERT ignore INTO `updatecomic`(`comicid`,`cid`)  VALUES ';
		if(is_array($comicid)){
			$tmp='';
			foreach($comicid as $id){
				$tmp.=',('.$id.','.$cid.')';
			}
			$sql.=ltrim($tmp,',');
			$this->db->query($sql);
		}else{
			$sql.='('.$comicid.','.$cid.')';
			$this->db->query($sql);
			
		}
	}
        public function test(){
                echo 11111111;exit;
        }
}

