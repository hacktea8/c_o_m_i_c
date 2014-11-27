<?php
define('P_W', '1');
require_once 'uc_config.php';

class Basecommon{
  public $uc_api = 'http://www.hacktea8.com/pw_api.php?';
  public $cookie_key = 'Leq_668_Hk8_auth';
  public $master_uckey = 'kazrpp58kz81nnr696tk';
  public $domain_app =array('mh.hacktea8.com'=>'vc6vd4bw4jc6xl2drrwg');

  public function getSynuserUid(){
    $apikey = $this->getKeyBydomain();
    if(isset($_COOKIE[$this->cookie_key])){
      $code = $_COOKIE[$this->cookie_key];
      $uinfo = $this->strcode($code, false, $apikey);
      list($uid) = explode("\t", $uinfo);
      return $uid;
    }
    return false;
  }
  public function getKeyBydomain(){
    $domain = strtolower($_SERVER['HTTP_HOST']);
    return $this->domain_app[$domain];
  }
  public function getSynuserInfo($uid){
    $request = array(
    'params'=>"$uid",
    'type'=>'uc',
    'mode'=>'User',
    'method'=>'getInfo'
    );
    $url = $this->uc_api.$this->strtrip($request,$this->master_uckey);
    $ctx = stream_context_create(array(    
    'http' => array(    
        'timeout' => 15 
        )    
    )    
    );
    $uinfo = file_get_contents($url, null, $ctx);
    $uinfo = unserialize($uinfo);
    $uinfo = $uinfo['result'][$uid];
    $groups = explode(',', $uinfo['groups']); 
    $groups[] = $uinfo['groupid'];
    $groups = array_unique($groups);
    $uinfo['groups'] = $groups;
    $uinfo['name'] = mb_convert_encoding($uinfo['name'],'UTF-8','GBK');
    return $uinfo;
  }
  public function strtrip($request,$uckey){
    ksort($request);
    reset($request);
    $arg = '';
    foreach ($request as $key => $value) {
      if ($value) {
        $value = stripslashes($value);
        $arg .= "$key=$value&";
      }
    }
    $sig = md5($arg.$uckey);
    $return = $arg."sig=$sig";
    
    return $return;
  }
  public function strcode($string, $encode = true, $apikey = '') {
    global $uc_key;
    $apikey = $apikey ? $apikey: $uc_key;
    !$encode && $string = base64_decode($string);
    $code = '';
    $key  = substr(md5($_SERVER['HTTP_USER_AGENT'] . $apikey),8,18);
    $keylen = strlen($key);
    $strlen = strlen($string);
    for ($i = 0; $i < $strlen; $i++) {
      $k    = $i % $keylen;
      $code  .= $string[$i] ^ $key[$k];
    }
    return ($encode ? base64_encode($code) : $code);
  }
  public function getcode($len = 6){
    $str = 'qwertyuioplkjhgfdsazxcvbnm1234567890,.?;:!@#$%^&*()-=+';
    $length = strlen($str) - 1;
    $tmp = '';
    for($i=0;$i<$len;$i++){
      $tmp .= $str[mt_rand(0,$length)];
    }
    return $tmp;
  }
}
function get_client_ip(){
  $ip = $_SERVER['REMOTE_ADDR'];
  return $ip;
}
?>
