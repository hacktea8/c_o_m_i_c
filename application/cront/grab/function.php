<?php

include_once($APPPATH.'/db.class.php');

$db=new DB_MYSQL();


function getOneResult($url){
global $pattern;
  if(strtolower(substr($url,0,7))=='http://'){
     $url=getHtml($url);
  }
  preg_match($pattern,$url,$match);
  return isset($match[1])?trim($match[1]):false;
}

function getcatecomics($curl){
  global $catemhlistpagePattern,$catemhlistPattern;
  $psize=1;
  for($i=1;$i<=$psize;$i++){
     $_curl=$curl.'/'.$i.'.htm';
     $html=getHtml($_curl);
     if(1==$i){
       preg_match($catemhlistpagePattern,$html,$match);
       $psize=isset($match[1])?(intval($match[1])>0?intval($match[1]):1):1;
     } 
     preg_match_all($catemhlistPattern,$html,$match,PREG_SET_ORDER);
     var_dump($match);exit;
  }
}

function updateCatemhTotal($cid=0){
  if(!$cid)
    return false;

global $db;
  $sql=sprintf('UPDATE `cate` SET `ctotal`=(SELECT count(`id`) FROM `comic` WHERE `cid`=%d) WHERE `id`=%d',$cid,$cid);
  $db->query($sql);
  
}

function getpagestablename($vid=0){
  if(!$vid)
     return false;

  $ptid=$vid%10;
  return 'pages'.$ptid;
}

function getAllcate(){
global $db;
  $sql='SELECT `id`, `oid`, `name`, `ctotal` FROM `cate` WHERE `flag`=1';
  return $db->result_array($sql);
}

function getCateByname($cname,$ocid){
  if(!$cname ||!$ocid){
     return null;
  }
  global $db;
  $sql=sprintf("SELECT `id` FROM `cate` WHERE `oid`=%d limit 1",$ocid);
  $row=$db->row_array($sql);
  if(isset($row['id']))
    return $row['id'];

  $sql=sprintf("INSERT INTO `cate`( `oid`, `name`) VALUES (%d,'%s')",$ocid,mysql_escape_string($cname));
  $db->query($sql);
  return $db->insert_id();
}

function getmhCate($url){
  global $mhcateListPattern;
  $html=getHtml($url);
  preg_match('#<div id="menu">.+</div>#Uis',$html,$match);
  preg_match_all($mhcateListPattern,$match[0],$match,PREG_SET_ORDER);
  return $match;
}

function getmhinfo($url){
global $mhInfoPattern,$mhDesPattern,$mhCharPattern;
   preg_match('#/99(\d+)#',$html,$match);
   $oid=intval($match[1]);
   if($model->getComicByOid($oid)){
     return true;
   }
   $html=getHtml($url);
   preg_match($mhInfoPattern,$html,$match);
//echo '<pre>';
   //var_dump($match);exit;
   $cinfo=array();
   $cinfo['author']=isset($match[1])?trim($match[1]):'';
  // $cinfo['cid']=$model->getCidByname(trim($match[2]));
   $cinfo['vtotal']=intval($match[3]);
   $cinfo['oid']=$oid;
   preg_match($mhDesPattern,$html,$match);
   $cinfo['des']=trim($match['1']);
   preg_match($mhCharPattern,$html,$match);
   // 88 is other
   $cinfo['char']=isset($match[1])?trim($match[1]):88;
//   var_dump($match);exit;
   //添加
  return $comicid=$model->addComic($cinfo);
}

function getmhVolsinfo($url){
   global $mhVolListPattern;
   $html=getHtml($url);
   preg_match_all($mhVolListPattern,$html,$match,PREG_SET_ORDER);
echo '<pre>';
   var_dump($match);exit;
   //
   foreach($match as $vol){
      preg_match('#/(\d+)o(\d+)#',$vol[2],$m);
      if(!isset($m[1]) ||!isset($m[2])){
        continue;
      }
      $comicid=intval($m[1]);
      $oid=intval($m[2]);
      if(getVolByOid($comicid,$oid)){
        continue;
      }
      $vinfo=array();
      $vinfo['comicid']=$comicid;
      $vinfo['oid']=$oid;
      $vinfo['vname']=trim($vol[3]);
      //
      $volid=addVol($vinfo);
      if(!$volid){
        continue;
      }
      getmhPageinfo($url);
      setPreAndNextVol($volid);
   }
}

function getmhPageinfo($url){
   global $volid,$comicid,$pageImgListPattern,$spathPattern,$serverListPattern,$serverUrl;
   $html=getHtml($url);
   //
   preg_match($pageImgListPattern,$html,$match);
  // echo '<pre>';
   $pages=explode('|',$match[1]);
   preg_match($spathPattern,$html,$match);
   $sPath=intval($match[1])-1; 
   $html=getHtml($serverUrl);
   preg_match($serverListPattern,$html,$match);
   $serverList=explode($match[1]);
   $sroot=$serverList[$sPath];
   $pinfo=array();
   $pinfo['comicid']=$comicid;
   $pinfo['vid']=$volid;
   $pno=0;
   foreach($pages as $page){
     $pno++;
     $pinfo['pic']=$sroot.$page;
     $pinfo['pno']=$pno;
     $pageid=addPage($pinfo);
     if(!$pageid){
        continue;
     }
     setPreAndNextPage($pinfo);
   }
//   var_dump($match);exit;   
}

function setPreAndNextPage($datas){
  if(!$datas)
    return false;

  global $db;
  $sql = sprintf("SELECT * FROM pages WHERE vid = %d
                  AND id != %d AND pageno = %d AND comicid = %d LIMIT 1 ",
         $datas['vid'],$datas['id'],intval($datas['pageno'])-1,$datas['comicid']);
  $prevPage = $db->query_first($sql);
  if($datas['pageno'] != 1){
    $sql = sprintf("UPDATE pages SET nextpid = %d WHERE id = %d LIMIT 1",$datas['id'],$prevPage['id']);
    echo "\n$sql\n";
    $db->query($sql);
    $sql = sprintf("UPDATE pages SET prevpid = %d WHERE id = %d LIMIT 1",$prevPage['id'],$datas['id']);
    echo "\n$sql\n";
    $db->query($sql);
    }
    return true;
}

function setPreAndNextVol($datas){
  if(!$datas)
    return null;

  global $db;
  $sql = sprintf("SELECT * FROM vols
                 WHERE id != %d AND vol < %d AND comicid = %d
                 ORDER BY vol DESC LIMIT 1 ",
         $datas['id'],intval($datas['vol']),$datas['comicid']);

  $prevVol = $db->query_first($sql);
  if($datas['vol'] != 1 && $prevVol['coverpid']){
    $sql = sprintf("UPDATE vols SET nextpid = %d WHERE id = %d LIMIT 1",$datas['coverpid'],$prevVol['id']);
    echo "\n$sql\n";
    $db->query($sql);

    $sql = sprintf("UPDATE vols SET prevpid = %d WHERE id = %d LIMIT 1",$prevVol['coverpid'],$datas['id']);
    echo "\n$sql\n";
    $db->query($sql);
  }
  return true;
}

function getHtml($url){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error';
    return false;
  }
  curl_close($curl);
  return iconv('GB2312','UTF-8',$tmpInfo); 
}

?>
