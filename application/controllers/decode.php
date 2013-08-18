<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'core/comics.class.inc.php';

$comicVolInfoPath=ROOTPATH.'data/volInfoFile.txt';
$comicEncodeInfoPath=ROOTPATH.'data/volEncodeInfoFile.txt';
//图片服务器列表
$picSevList=array();
//图片当前主机
$picCurHost='';
//图片下载模式 1本地 2远程FTP
$picDownMode=1;
//图片目录自定义部分 /目录名
$picPathPre='';
//下载图片模式 1下载 2盗链
$downPicMode=2;

if(!file_exists(dirname($comicVolInfoPath)))
   mkdir(dirname($comicVolInfoPath),777,true);


class Decode extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('decodemodel');
	}
	public function index(){
		echo num(36,62);//base_convert(10,10,36);
		exit;
		//echo str_replace(array('&','"','\'','<','>'),array('&amp;','&quot;','&#039;','&lt;','&gt;'),"《<黑客防线2001年起更新ing><黑客x档案");exit;
		$this->load->view('decode_index');
	}
	/*
	 * 采集信息到配置文件
	 */
	public function collectcomicvol($num){
		$num=isset($num)?intval($num):0;
		if(!$num){
			return false;
		}
		$comiclist=$this->decodemodel->getNoneUpdateComicList($num);
		foreach ($comiclist as $val){
			$this->caijiVols($val['comicid']);
			//exit;
		}
		die(json_encode(1));
	}

	/*
	 * 
	 */
	public function readEncodeInfo($num){
		global $comicEncodeInfoPath;
		$info=file($comicEncodeInfoPath);
		$data=array();
		foreach ($info as $key=>$val){
			if($key>$num){
			   break;
			}
			array_push($data, $val);
			unset($info[$key]);
		}
		copy($comicEncodeInfoPath, $comicEncodeInfoPath.date('YmdHi').'.bak');
		file_put_contents($comicEncodeInfoPath, '');
		foreach ($info as $val){
			file_put_contents($comicEncodeInfoPath, $val,FILE_APPEND);
		}
		die(json_encode($data));
	}
	/*
	 * 采集漫画卷的详细信息
	 */
	public function caijiVols($vid){
		if(!is_numeric($vid)){
			return false;
		}
		
		$volInfo=getVolInfo($vid);
		//var_dump($volInfo);exit;
		if(empty($volInfo)){
			die('卷采集有误!');
		}
		//$this->decodes(getPageInfo('/comic/4530/list_82427.html'));
		foreach ($volInfo as $val){
			$data=getPageInfo($val);
			//var_dump($data);exit;
			if($info=$this->decodes($data)){
				//var_dump($info);exit;
				//添加卷信息
				$info['bid']=$vid;
				$this->decodemodel->InsertComicVols($info);
				//添加图片信息
				foreach($info['files'] as $key=>$img){
					//$pid=explode('_', $img);
					//$pid=explode('.', $pid[1]);
					//$pid=$pid[0];
					//$pid=$key+1;
					$info['pid']=$key+1;
					$info['img']=$img;
					$this->decodemodel->InsertComicPages($info);
				}
				
			}else{
			   die('采集错误!'.$val);
			   
			}
			//exit;
			//break;
		}
		//更新列表
		$this->decodemodel->UpdateCollectComicPages($info['bid']);
	}
	/*
	 * 采集漫画数据
	 */
	public function caijiComicdata($comicid=0){
		if(!$comicid)
		    return false;
		    
		return getComicInfo($comicid);
		
	}
	/*
	 * 解析程序
	 */
	protected function decodes($code){
		global $comicEncodeInfoPath;
		$encodeFun=array('e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};',
		'e=function(c){return c};');
		/*$data=json_encode($code)."\r\n";
		file_put_contents($comicEncodeInfoPath, $data,FILE_APPEND);
		return 1;
		var_dump($code);exit;
		*/
		$flag=true;
		foreach ($encodeFun as $k=>$val){
			if(stripos($code, $val)){
				$flag=false;
				$fun=$k;
				break;
			}
		}
		if($flag){
			//var_dump($code);exit;
			return parseObj($code);
		   return false;
		}
		   //var_dump($data);exit;
		preg_match('#return p;\}\(\'(.+)\'\.split\(\'\|\'\)#Uis',$code,$match);
		$ecode=$match[1];
		$ecode=explode('\',',$ecode);
		$encode=$ecode[0];
		$ecode=explode(',\'',$ecode[1]);
		$edict=explode('|',$ecode[1]);
		$ecode=explode(',',$ecode[0]);
		$a=intval($ecode[0]);
		$elen=$ecode[1];
//echo '<pre>';
//		var_dump($edict);exit;
		for($i=$elen-1;$i>0;$i--){
		  $ch='num'.$fun;
		  $ch=$ch($i);
		  //echo $ch;exit;
		  if(!$edict[$i]){
		   continue;
		  }
		  $encode=preg_replace('#\b'.$ch.'\b#U',$edict[$i],$encode);
		}
		
		return parseObj($encode);
	}
	
	
	
	/*
	 * 漫画添加程序
	 */
	public function addComic(){
		
	}
	/*
	 * 图片获取程序
	 */
	public function getPic(){
		global $comicVolInfoPath;
		$info=file($comicVolInfoPath);
		foreach ($info as $val){
			$param=(array)json_decode($val,1);
			$pic=explode(',', $param['files']);
			//var_dump($pic);exit;
			unset($param['files']);
			$pic=buildImgPath($param, $pic);
			/*
			 array(3) {
			  ["cid"]=>
			  string(5) "82975"
			  ["bid"]=>
			  string(3) "120"
			  ["pic"]=>
			  array(17) {
			    [0]=>
			    string(36) "/Files/Images/120/82975/JOJO_001.png"
			    [1]=>
			    string(36) "/Files/Images/120/82975/JOJO_002.png"
			    [2]=>
			    string(36) "/Files/Images/120/82975/JOJO_003.png"
			 * */
			//echo '<pre>';var_dump($pic);exit;
			return $pic;
		}
	}
	/*
	 * 图片下载程序
	 */
	protected function downloadPic($picUrl){
		global $picSevList,$picCurHost,$downPicMode;
		if(!$picUrl)
		   return false;
		   
		if($picCurHost){
			$remote_img='http://'.$picCurHost.$picUrl;
			$img=getImage($remote_img);
			if($img){
				if($downPicMode==1){
					$this->move2host($img, $picUrl);
				}else if($downPicMode==2){
					//返回图片内容
					//showimage($img);
				}else{
					
				}
			}else{
				foreach($picSevList as $url){
					$remote_img='http://'.$picCurHost.$picUrl;
					$img=getImage($remote_img);
					if($img){
						$picCurHost=$url;
						if($downPicMode==1){
							//
							$this->move2host($img, $picUrl);
						}else if($downPicMode==2){
							//
							//showimage($img);
						}else{
					
						}
						break;
					}
				} 
			}
		}
		
	}
	/*
	 * 图片处理程序
	 */
	public function move2host($img,$picUrl){
		if(!$img ||!$picUrl){
			return false;
		}
		if($picDownMode==1){
			//本地
			//把图片下载到本地
			if(!file_exists(dirname(ROOTPATH.$picPathPre.$picUrl))){
				mkdir(dirname(ROOTPATH.$picPathPre.$picUrl),777,true);
			}
			file_put_contents(ROOTPATH.$picPathPre.$picUrl, $img);
		}else if(2==$picDownMode){
			//远程主机
			$ftp=new FileHost();
			$picUrl=$picPathPre.$picUrl;
			$ftp->fputContents($picUrl,$img);
		}else{
		
		}
	}
	/*
	 * 获得分类信息
	 */
	public function getmhcate(){
		$cate=getComicCate();
		
		foreach ($cate as $val){
			$this->decodemodel->InsertCate(trim($val));
		}
	}
	/*
	 * 采集管理界面
	 */
	public function collectguid(){
		$catelist=$this->decodemodel->getCateList();
		//var_dump($catelist);exit;
		$this->load->view('decode_collectguid',array('catelist'=>$catelist));
	}
	public function decodeinfo(){
		$this->load->view('decode_decode');
	}
	public function collectpage($num){
		if(!$num){
			die('0');
		}
		caijiVols($num);
	}
	/*
	 * 采集漫画信息
	 */
	public function collectcomic($cid,$cateid){
		//echo strtotime('2013-5-5');exit;
		/*

		 */
		//var_dump($cateid.' '.$cid);exit;
		if(!$cid ||!$cateid){
			return false;
		}
		$info=getComicInfo($cid);
		if(!isset($info['name'])){
			return false;
		}
		$info['cid']=intval($cateid);
		$info['id']=intval($cid);
		//var_dump($info);exit;
		$this->decodemodel->AddnewComic($info);
		die(json_encode($info));
	}
	protected function catecomicid($cate,$cid){
		global $rootUrl,$param;	
		$url=$rootUrl.'comic/'.$cate.'/';
		//echo $url;exit;
		$html=file_get_contents($url);
		$html=iconv($param['scharset'], $param['dcharset'], $html);
		$pattern='#<div class="pagerFoot"><span>\S+<strong>(\d+)</strong>\S+</span>#Uis';
		preg_match($pattern, $html,$match);
		//echo '<pre>';var_dump($match);exit;
		if(!$match[1]){
			return false;
		}
		$max=$match[1];
		unset($match);
		for($i=1;$i<=$max;$i++){
			if($i==1){
				$curl=$url;
			}else{
				$curl=$url.'index_p'.$i.'.html';
			}
			$comicid=getComiclistBycate($curl);
			if(is_array($comicid)){
				$id=array_pop($comicid);
				array_push($comicid, $id);
			}else{
				$id=$comicid;
			}
			//echo $id,',';continue;
			if($this->decodemodel->getupcomicByid($id)){
				break;
			}
			
			unset($id);
			
			$this->decodemodel->addupcomic($comicid,$cid);
			unset($comicid);
			
		}				
		
	}
	/*
	 * 获得分类下的漫画
	 */
	public function catecomiclist($cateid){
		global $cateconfig;	
		
		$cateid=intval($cateid);
		if(!$cateid){
		foreach ($cateconfig as $key=>$cate){
			$this->catecomicid($cate,$key);
		}
		}else{
			$this->catecomicid($cateconfig[$cateid],$cateid);
		}
		die(json_encode(1));
	}
	public function updatecomic($num,$cid){
		$num=intval($num);
		$cid=intval($cid);
		$num=$num?$num:100;
		$upcomic=$this->decodemodel->getUpcomicByNum($num,$cid);
		//var_dump($upcomic);exit;
		foreach($upcomic as $val){
			$info=getComicInfo($val['comicid']);
			if(!isset($info['name'])){
				return false;
			}
			$info['cid']=$val['cid'];
			$info['id']=$val['comicid'];
			//var_dump($info);exit;
			usleep(1000);
			$this->decodemodel->AddnewComic($info);
			usleep(1000);
		}
		die(json_encode(1));
	}
	public function getunixtime(){
		echo strtotime('2010-11-5');exit;
	}
	public function upNullDetail(){
		die('helllo word!');
		$ids=$this->decodemodel->getNullDetailId();
		//var_dump($ids);exit;
		foreach($ids as $id){
			$id=$id['id'];
			$cinfo=getComicInfo($id);
			$info=array('id'=>$id,'detail'=>$cinfo['detail']);
			$this->decodemodel->updateComicDetail($info);
			usleep(1000);
		}
	}
}