<?php
require_once 'viewbase.php';

class Updatecomic extends Viewbase {
 
 public function __construct(){
  parent::__construct();
 }
 public function recent(){
  $this->view('upcomic_recent');
 }
 public function top(){
  $this->view('upcomic_top');
 }
}
