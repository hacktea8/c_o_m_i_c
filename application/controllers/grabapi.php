<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grabapi extends CI_Controller {

 /**
  * Index Page for this controller.
  *
 */
 public function __construct(){
  parent::__construct();
echo 11119;exit;
  $this->load->model('grabapimodel');
 }
 public function getNonePagePicList(){
echo 9999;exit;
  $index = $_POST['index'];
  $limit = $_POST['limit'];
  $data = $this->grabapimodel->getNonePagePicList($index, $limit);
  $data = json_encode($data);
  die($data);
 }
 public function addPagePic(){
  $post = $_POST['article_data'];
  $post = json_decode($post,1);
  if(!$post){
    echo '404';
    return 0;
  }
  $data = $this->grabapimodel->addPagePic($post);
  $data = json_encode($data);
  die($data);
 }
}
