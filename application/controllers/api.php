<?php
require_once 'usrbase.php';

class Api extends Usrbase {
  public $_per = 24;

  public function __construct(){
    parent::__construct();
  }
  public function user($count = 0){
    echo 1;
  }
}
