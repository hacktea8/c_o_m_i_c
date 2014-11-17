<?php
require_once 'webbase.php';

class Api extends Webbase {

 public function __construct(){
  parent::__construct();
 }
 public function user($count = 0){
  echo 1;
 }
 public function add_comic_pv($comicid = 0,$volid = 0){
  $ip = $this->input->ip_address();
  $key = sprintf('user_hits_check:%s:%d:%d',$ip,$comicid,$volid);
//var_dump($this->redis->exists($key));exit;
  if( $this->redis->exists($key)){
   return 0;
  }
  $this->redis->set($key, 1,self::$ttl['1d']);
  $key = sprintf('user_topic_hits:%d:%d',$comicid,$volid);
  $this->redis->incr($key);
 }
}
