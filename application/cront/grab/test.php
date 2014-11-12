<?php

define('ROOTPATH',dirname(__FILE__).'/hhcomic/');

require_once ROOTPATH.'../config.php';
require_once ROOTPATH.'../function.php';


$updata = array('imgurl'=>'http://img.xiaba.cvimage.cn/4cc02705faaa3a507e4e0300.png'
,'referer'=>''
);
$r = upload2Ttk($updata);

var_dump($r);

