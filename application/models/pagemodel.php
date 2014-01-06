<?php
require_once 'modelbase.php';

class Pagemodel extends Modelbase{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function getCateList(){
		$sql='SELECT `id`, `name`, `flag` FROM `cate` LIMIT 20';
		return $this->db->query($sql)->result_array();
	}
	public function getCnameById($cid){
		if(!$cid)
		   return false;
		   
		$sql=sprintf('SELECT `id`, `name`, `ctotal`, `flag` FROM `cate` WHERE `id`=%d LIMIT 1',$cid);
		return $this->db->query($sql)->row_array(); 
	}

	public function getCidByname($cname){
		if(!$cname)
		   return false;
		   
		$sql=sprintf('SELECT `id`, `name`, `ctotal`, `flag` FROM `cate` WHERE `name`="%s" LIMIT 1',$cname);
		return $this->db->query($sql)->row_array(); 
	}
	public function InsertCate($cname){
		if(!$cname){
			//echo 'NULL';
		   return false;
		}
		if($this->getCidByname($cname)){
			//echo '已存在';
			return true;
		}
		$sql=sprintf('INSERT INTO `cate`(`name`) VALUES ("%s")',$cname);
		$this->db->query($sql);
		//echo '已执行';
		return $this->db->affected_rows(); 
	}
	public function AddnewComic($info){
		if(!$info){
			return false;
		}
		if($this->getComicById($info['id'])){
			return $info['id'];
		}
		$this->db->insert('comic', $info); 

		$this->upcomicupdate($info['id']);
		return $info['id'];
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

