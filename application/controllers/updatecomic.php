<?php
require_once 'viewbase.php';

class Updatecomic extends Viewbase {
 
 public function __construct(){
  parent::__construct();
 }
 public function recent(){
  $this->setseo('最新更新的漫画');
  $list = $this->mhmodel->getComicUpdateRecentBlock();
  $this->assign(compact('list'));
//$this->debug($this->viewData);
  $this->view('upcomic_recent');
 }
 public function top(){
  $this->view('upcomic_top');
 }
}
