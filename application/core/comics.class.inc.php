<?php
session_start();

require_once 'function.lib.inc.php';
$rootUrl='http://www.imanhua.com/';
$mhDomain='http://www.imanhua.com';
$param=array('cookie'=>'./cookies','referer'=>$rootUrl,'scharset'=>'GBK',
'dcharset'=>'UTF-8');
$htmlCache='./htmlCache/';
$htmlCacheTime=60*60*24;
$domain='http://mh.hacktea8.com';
$cateconfig=array(1=>'shaonian',2=>'wuxia',3=>'kehuan',4=>'tiyu',5=>'xiju',6=>'tuili',
7=>'kongbu',8=>'dalu',9=>'japan',10=>'hk',11=>'oumei');


if(!file_exists($htmlCache))
   mkdir($htmlCache,'777',true);
   
function getNewComic(){
   
}

function getComicCate(){
	global $mhDomain,$param;
	$content=file_get_contents($mhDomain);
	$pattern='#<ul class="navList">(.+)</ul>#Uis';
	preg_match($pattern, $content,$match);
	unset($match[0]);
	if($match[1]){
		$match=iconv($param['scharset'], $param['dcharset'], $match[1]);
		$pattern='#<li><a href=".+" title=".+">(.+)</a></li>#Uis';
		preg_match_all($pattern, $match, $matches);
		return $matches[1];
	}
}
/**
 * 
 * 获得漫画的整体信息
 * @param $comicid
 */
function getComicInfo($comicid){
	global $rootUrl,$htmlCache,$htmlCacheTime,$param;
   if(!$comicid)
	  return false;
	  
   $comicUrl=$rootUrl.'comic/'.$comicid;
      
   $html=file_get_contents($comicUrl);
   $html=iconv($param['scharset'], $param['dcharset'], $html);

   //$html=getHtml($comicUrl, $param);
   //相同漫画
   $related='';
   if(stripos($html, '<div class="bookSimilar">')!=false){
      $tmp='#<div class="bookSimilar">(.+)</div>#Uis';
      preg_match($tmp, $html,$match);
      $pattern='#<a href="/comic/(\d+)/" title="(.+)">.+</a>#Uis';
      preg_match_all($pattern, $match[1], $matches);
      $related=array();
      foreach ($matches[1] as $id){
      	array_push($related, array('comicid'=>$id));
      }
      foreach ($matches[2] as $key=>$name){
      	$related[$key]['title']=$name;
      }
      $related=json_encode($related);
      //echo '<pre>';var_dump($related);exit;
   }
   $coverRule='#<div class="bookCover">\s*<img src="(.+)" alt=".+">\s*</div>#Uis';
   preg_match($coverRule, $html,$match);
   $cover=trim($match[1]);
   $nameRule='#<h2>(.+)</h2>#Uis';
   preg_match($nameRule, $html,$match);
   $title=trim($match[1]);
  // $attrRule='#'.preg_quote('<p class="bookAttr"><span>完结状态：[ <em>连载中</em> ]</span>原作者：久保带人 | 字母索引：<a href="/comic/S">S</a> | 加入时间：2007-4-30 | 更新时间：2013-6-5 </p>').'#is';
   $attrRule='#\<p class\="bookAttr"\>\<span\>完结状态：\[ \<em\>(.+)\</em\> \]\</span\>原作者：(.*) \| 字母索引：\<a href\="/comic/."\>(.)\</a\> \| 加入时间：([0-9-]+) \| 更新时间：([0-9-]*) \</p\>#Uis';
   //$attrRule2='#'.preg_quote('<p class="bookAttr"><span>完结状态：[ <em class="green">已完结</em> ]</span>原作者：冈村贤二 梶研吾 | 字母索引：<a href="/comic/W">W</a> | 加入时间：2013-5-5 | 更新时间：2013-5-5 </p>').'#Uis';
   $attrRule2='#\<p class\="bookAttr"\>\<span\>完结状态：\[ \<em class\="green"\>(.+)\</em\> \]\</span\>原作者：(.*) \| 字母索引：\<a href\="/comic/."\>(.)\</a\> \| 加入时间：([0-9-]*) \| 更新时间：([0-9-]*) \</p\>#Uis';
  // echo $attrRule2;exit;
   //echo $attrRule;exit;
   preg_match($attrRule, $html,$match);
   if(!isset($match[1])){
      preg_match($attrRule2, $html,$match);
   }
  // var_dump($match);exit;
   $status=($match[1]=='连载中')?0:1;
   if(isset($match[2])){
   $author=trim($match[2]);
   }else{
   $author='';
   }
   $letter=trim($match[3]);
   $jointime=trim($match[4]);
   $update=trim($match[5]);
   $introRule='#<div class="intro">(.+)</div>#Uis';
   preg_match($introRule, $html,$match);
//   if(substr_count($match[1],'</p>')>1){
//   $dropP='#<p>.+</p>#Uis';
//   $match=preg_replace($dropP, '', $match[1],1);
//   }else{
   	$match=$match[1];
   //}
   $intro=trim($match);
   
   return array('cover'=>mysql_escape_string($cover),'name'=>mysql_escape_string($title),'state'=>$status,'author'=>mysql_escape_string($author),'letter'=>mysql_escape_string($letter),
   'atime'=>strtotime($jointime),'rtime'=>strtotime($update),'detail'=>mysql_escape_string($intro),'relatecomic'=>$related);
}

function getVolInfo($comicid=0){
global $rootUrl,$htmlCache,$htmlCacheTime,$param;
   if(!$comicid)
	  return false;
	  
   $comicUrl=$rootUrl.'comic/'.$comicid;
   
   $html=file_get_contents($comicUrl);
   $html=iconv($param['scharset'], $param['dcharset'], $html);

   $listRule='#<ul style=".*" id=\'subBookList\'>(.+)</ul>#Uis';
   preg_match($listRule, $html,$match);
   //echo '<pre>';
  // var_dump($match);exit;
  // $vinfoRule='#<a href="(.+)" title="(.+)" target="_blank" #Uis';
   $vinfoRule=$oldvinfoRule='#<a href="(.+)" title=".+" target="_blank".*>.+</a>#Uis';
   preg_match_all($vinfoRule, $match[1], $matches);
   if(!isset($matches[1])){
   	  return false;
   }
   $vols=$matches[1];
   // echo '<pre>';
   //var_dump($matches);exit;
   
   
   return $vols;
}

function getPageInfo($volUrl=0){
global $rootUrl,$htmlCache,$param,$mhDomain,$domain;
   if(!$volUrl)
	  return false;
	  
   $volUrl=$mhDomain.$volUrl;
   $html=file_get_contents($volUrl);
   $html=iconv($param['scharset'], $param['dcharset'], $html);
/*/   $key=$htmlCache.md5($volUrl).'.html';
   if(file_exists($key)){
      $html=file_get_contents($key);
      
   }else{
      
      file_put_contents($key, $html);
   }
   */
   //var_dump($html);exit;
   preg_match('#var cInfo=.+</script>#Uis', $html,$match);
  // var_dump($match);exit;
   if(isset($match[0])){
      return $match[0];
   }

   $piclistRule='#eval\((.+)0\,\{\}\)\)#Uis';
   preg_match($piclistRule, $html,$match);
   //var_dump($match);exit;
   if(!isset($match[0])){
      return false;
   }
   $match=str_replace('eval', '', $match[0]);
   return $match;
}

function getPicSevList(){
	global $mhDomain;
	$url=$mhDomain.'/v2.2/scripts/configs.js?v=1012';
	$html=file_get_contents($url);
	$picSevRule='#var servs = \[(.+)\];#Uis';
	preg_match($picSevRule, $html, $matches);
	/*echo '<pre>';
	var_dump($matches);exit;
	{name:'电信①',host:'t4.mangafiles.com'},
	{name:'电信②',host:'t5.mangafiles.com'},
	{name:'电信③',host:'t6.mangafiles.com'},
	{name:'广东电信',host:'t6.mangafiles.com'},
	{name:'江苏电信',host:'t5.mangafiles.com'},
	{name:'网通',host:'c5.mangafiles.com'}
	*/
	return trim($matches[1]);
}

function setPicSev2Config(){
	
}

function rmExpireCache($cacheDir){
	$cacheFile=scandir($cacheDir);
	var_dump($cacheFile);exit;
	$len=count($cacheFile);
	for($i=0;i<$len;$i++){
		if($cacheFile[$i]=='.' ||$cacheFile[$i]=='..')
		   continue;
		   
		if(now()-fileatime($key)>$htmlCacheTime)
           @unlink($key);
	}
	
}

function getComiclistBycate($url){
	global $param;
	if(!$url){
		return false;
	}
	$html=file_get_contents($url);
	$html=iconv($param['scharset'], $param['dcharset'], $html);
	$pattern='#<ul class="bookList">(.+)</ul>#Uis';
	preg_match($pattern, $html, $matches);
	if(!isset($matches[1])){
		return false;
	}
	$bookList=$matches[1];
	//var_dump($bookList);exit;
	$pattern='#<a title=".+" href="\/comic\/(\d+)\/" target="_blank">#Uis';
	preg_match_all($pattern, $bookList, $matches);
	//echo '<pre>';var_dump($matches);exit;
	return $matches[1];
}

function unicode2utf($unicode){
	   //echo $unicode;exit;
	   if(strripos($unicode, '\\\\u')){
	      return iconv("UCS-2","UTF-8", pack('H*', str_replace('\\\\u', '', $unicode)));
	   }
	   return iconv("UCS-2","UTF-8", pack('H*', str_replace('\\u', '', $unicode)));
}

function num0($c){
	static $a=62;
//       小于常量 返回空,
   //return($c>$a?'':num(intval($c/$a),$a))+(($c=$c%$a)>35?chr($c+29):base_convert($c,10,36));
   return (($c=$c%$a)>35?chr($c+29):base_convert($c,10,36));
   return ($c<$a?0:num(intval($c/$a),$a))+(($c=$c%$a)>35?chr($c+29):base_convert($c,10,36));
   
   $flag=-1;
   while(intval($c)>9){
     $c=base_convert($c,10,36);
     $flag++;
   }
   //echo $c;exit;
   return $flag>0?chr(ord($c)-32):$c;
}

function num1($c){
	return $c;
}

function parseObj($obj){
	//var_dump($obj);exit;
	/*
	  $pattern='#"cid":(.*),"len":(.*),"finished":(.*),"bid":(.*),"bname":"(.*)","files":\[(.*)\],"burl":"(.*)","cname":"(.*)"#Uis';
	  preg_match($pattern,$obj,$match);
	  var_dump($match);exit;
	  if(isset($match[1])){
	    $match[6]=explode(',',$match[6]);
	    foreach($match[6] as $key=>$val){
	      $match[6][$key]=trim($val,'"');
	    }
	    $match[5]=unicode2utf(trim($match[5],'"'));
	    $match[8]=unicode2utf($match[8]);
	    return array('cid'=>$match[1],'len'=>$match[2],'finished'=>$match[3],'bid'=>$match[4],
	    'bname'=>$match[5],'files'=>$match[6],'burl'=>$match[7],'cname'=>$match[8]);
	  }
	  */
	$_start=stripos($obj,'{');
	$obj=substr($obj, $obj+1);
	//把数组匹配出来
	$_start=stripos($obj, ',"files":');
	
	$files=substr($obj, $_start);
	$obj=substr($obj, 0,$_start);
	$_start=strripos($files, '"]');
	$obj.=substr($files, $_start+2);
	$files=substr($files, 0,$_start+1);
	$_start=strripos($obj, '};');
	$obj=substr($obj, 0,$_start-1);
	$_start=stripos($files, '["');
	$files=substr($files, $_start+1);
	$_start=stripos($obj, '{"');
	$obj=substr($obj, $_start+1);
	$obj=explode(',', $obj);
	$result=array();
	foreach ($obj as $val){
		$val=explode(':', $val);
		if(!isset($val[0])||!isset($val[0])){
			return false;
		}
		//var_dump(trim($val[0],'"'));exit;
		$result[trim($val[0],'"')]=trim($val[1],'"');
	}
	if(!isset($result['bid'])||!isset($result['cid'])||$result['bid']<1||$result['cid']<1){
		return false;
	}
	$result['cname']=unicode2utf($result['cname']);
	$result['bname']=unicode2utf($result['bname']);
	$files=explode(',', $files);
	foreach ($files as $key=>$val){
		$files[$key]=trim($val,'"');
	}
	$result['files']=$files;
	//echo '<pre>1111';
	//  var_dump($result);echo '<br />';var_dump($files);exit;
	  return $result;
}
	

class myFtp{
	
}

class FileHost{
	
	public function myMkdir(){
		
	}
	
	public function myUnlink(){
		
	}
	
	public function Getcontent(){
		
	}
	public function Rmdir(){
		
	}
	public function GetCurUrl(){
		
	}
	public function fputContents($filename,$data,$mode=777){
		
	}
}