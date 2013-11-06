<?php



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

function getmhCate($url){
  global $mhcateListPattern;
  $html = getHtml($url);
  $html = iconv('GBK','UTF-8',$html);
  file_put_contents('index_cate.html',$html);
  preg_match('#<div id="menu">.+</div>#Uis',$html,$match);
  preg_match_all($mhcateListPattern,$match[0],$match,PREG_SET_ORDER);
  return $match;
}

function getmhinfo($url){
global $model,$mhInfoPattern,$mhDesPattern,$mhCharPattern;
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
   $cinfo['ourl'] = $url;
   $cinfo['cid'] = $cid;
   $cinfo['sitetype'] = 0;
   $cinfo['name'] = $url;
   $cinfo['cover'] = $url;
   $cinfo['atime'] = $url;
   $cinfo['rtime'] = $url;
   $cinfo['author']=isset($match[1])?trim($match[1]):'';
  // $cinfo['cid']=$model->getCidByname(trim($match[2]));
   preg_match($mhDesPattern,$html,$match);
   $cinfo['detail']=trim($match['1']);
   preg_match($mhCharPattern,$html,$match);
   // 88 is other
   $cinfo['letter']=isset($match[1])?trim($match[1]):88;
//   var_dump($match);exit;
   //添加
  return $comicid = $model->addComic($cinfo);
}

function getmhVolsinfo($url){
   global $model,$mhVolListPattern;
   $html = getHtml($url);
   preg_match_all($mhVolListPattern,$html,$match,PREG_SET_ORDER);
echo '<pre>';
   var_dump($match);exit;
   //
   foreach($match as $vol){
      preg_match('#/(\d+)o(\d+)#',$vol[2],$m);
      if(!isset($m[1]) ||!isset($m[2])){
        continue;
      }
      $comicid = intval($m[1]);
      $oid=intval($m[2]);
      if(getVolByOid($comicid,$oid)){
        continue;
      }
      $vinfo=array();
      $vinfo['comicid']=$comicid;
      $vinfo['oid']=$oid;
      $vinfo['vname']=trim($vol[3]);
      //
      $volid=$model->addVol($vinfo);
      if(!$volid){
        continue;
      }
      getmhPageinfo($url);
      $model->setPreAndNextVol($volid);
   }
}

function getmhPageinfo($url){
   global $volid,$model,$comicid,$pageImgListPattern,$spathPattern,$serverListPattern,$serverUrl;
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
     $pageid = $model->addPage($pinfo);
     if(!$pageid){
        continue;
     }
   }
//   var_dump($match);exit;   
}

function getHtml($url){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
//   curl_setopt($curl, CURLOPT_PROXY ,"http://122.146.64.244:3128");
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
  return $tmpInfo;
//  return iconv('GB2312','UTF-8',$tmpInfo); 
}

?>
