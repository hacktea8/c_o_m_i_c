<?php

require_once 'uc_config.php';

class Basecommon{
  public $uc_api = '';
  public $cookie_key = '';

  public function getSynuserUid($apikey = ''){
    if(isset($_COOKIE[$this->cookie_key])){
      $code = $_COOKIE[$this->cookie_key];
      $uinfo = $this->strcode($code, false, $apikey);
      list($uid) = explode("\t", $uinfo);
      return $uid;
    }
    return false;
  }
  public function getSynuserInfo($uid){
    global $master_uckey;
    $code = $this->strcode("wwww\t".$uid."\t".'eeee', $hash_key = $master_uckey, $encode = true);
    $request = array(
    'params'=>$code,
    'type'=>'uc',
    'mode'=>'User',
    'method'=>'synlogin'
    );
    ksort($request);
    reset($request);
    $arg = '';
    foreach ($request as $key => $value) {
      if ($value) {
        $value = stripslashes($value);
        $arg .= "$key=$value&";
      }
    }
    $sig = md5($arg.$row['secretkey']);
    $param = $arg."sig=$sig";
    $url = $this->uc_api.$param;
    $uinfo = json_decode(file_get_contents($url), 1);
    return $uinfo;
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
}

?>
