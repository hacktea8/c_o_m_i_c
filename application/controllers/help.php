<?php
require_once 'viewbase.php';

class Help extends Viewbase {

 public function __construct(){
  parent::__construct();
 }
 public function index(){
  $title = '帮助中心';
  $this->setseo($title);
  $this->view('help_index');
 }
}
