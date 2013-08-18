<?php
$str  = array(
"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0",
"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
"Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3",
"Accept-Encoding: gzip, deflate",
"Cache-Control: max-age=0"
  );
  
function getImage($remote_img){
   global $str;
  $curl = curl_init();
  $cookie_jar = $param['cookie'];
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl,CURLOPT_HTTPHEADER, $str);
  curl_setopt($curl,CURLOPT_COOKIEJAR, $cookie_jar);
  curl_setopt($curl,CURLOPT_COOKIEFILE,$cookie_jar);
  curl_setopt($curl,CURLOPT_REFERER, $param['referer']);

  curl_setopt($curl,CURLOPT_URL,$url);
//  $html = iconv("GB2312","UTF-8",curl_exec($curl));
//  $html = mb_convert_encoding(curl_exec($curl),$param['scharset'],$param['dcharset']);
  $html=curl_exec($curl);
  if(stripos($html,'<body>')>0)
     return false;

   return $html;
}

function buildImgPath($param=array(),$pic=array()){
	if(!$param)
	   return false;
	   
	$pageInfo=array('cid'=>$param['cid'],'bid'=>$param['bid'],'pic'=>array());
	foreach($pic as $val){
		$filePath=($param['cid']>7910)?'/Files/Images/'.$param['bid'].'/'.$param['cid'].'/'.$val:$val;
		array_push($pageInfo['pic'], $filePath);
	}
	return $pageInfo;
}

function getHtml($url,$param=array()){
  global $str;
  $curl = curl_init();
  $cookie_jar = $param['cookie'];
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl,CURLOPT_HTTPHEADER, $str);
  curl_setopt($curl,CURLOPT_COOKIEJAR, $cookie_jar);
  curl_setopt($curl,CURLOPT_COOKIEFILE,$cookie_jar);
  curl_setopt($curl,CURLOPT_REFERER, $param['referer']);

  curl_setopt($curl,CURLOPT_URL,$url);
  $html = iconv("GB2312","UTF-8",curl_exec($curl));
var_dump($html);exit;
  $html = mb_convert_encoding(curl_exec($curl),$param['scharset'],$param['dcharset']);
  return $html;
}

function sendCode($url,$code){
  $curl = curl_init();
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, array('code'=>$code));
  curl_setopt($curl,CURLOPT_URL,$url);
  $html=curl_exec($curl);
  return $html;
}

//将内容进行UNICODE编码，编码后的内容格式：YOKA\u738b （原始：YOKA王）
function unicode_encode($name)
{
    $name = iconv('UTF-8', 'UCS-2', $name);
    $len = strlen($name);
    $str = '';
    for ($i = 0; $i < $len - 1; $i = $i + 2)
    {
        $c = $name[$i];
        $c2 = $name[$i + 1];
        if (ord($c) > 0)
        {    // 两个字节的文字
            $str .= '\u'.base_convert(ord($c), 10, 16).base_convert(ord($c2), 10, 16);
        }
        else
        {
            $str .= $c2;
        }
    }
    return $str;
}

// 将UNICODE编码后的内容进行解码，编码后的内容格式：YOKA\u738b （原始：YOKA王）
function unicode_decode($name)
{
    // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
    $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $name, $matches);
    if (!empty($matches))
    {
        $name = '';
        for ($j = 0; $j < count($matches[0]); $j++)
        {
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0)
            {
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code).chr($code2);
                $c = iconv('UCS-2', 'UTF-8', $c);
                $name .= $c;
            }
            else
            {
                $name .= $str;
            }
        }
    }
    return $name;
}




