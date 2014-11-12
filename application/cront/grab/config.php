<?php

$sitetype = array(
array('domain' => ''),
array('domain' => 'http://www.cococomic.com/','listurl' => '/comiclist/%d/%d')
,array('domain' => 'http://hhcomic.com/','listurl' => '/hhlist/%d/%d.htm','comicurl' => '/comic/%s/','volurl' => '/hhpage/%s/%s','cover' => 'http://img.hhcomic.com/comicui/%s')
);

$saveTo = 'ttk';

define('DST_CHARSET','UTF-8');
$postimgdata = array('url' => 'http://img.hacktea8.com/mhapi/uploadurl?seq=', 'imgurl'=>'','referer' => '');

$ttkAlbum = array(
//hacktea8@163.com
'm0'=>array('w0'=>17372,'w1'=>17373,'w2'=>17374,'w3'=>17375,'w4'=>17376,'w5'=>17377,'w6'=>17378)
//
,'m1'=>array('w0'=>17380,'w1'=>17381,'w2'=>17382,'w3'=>17383,'w4'=>17384,'w5'=>17385,'w6'=>17386)
//,'m1'=>array('w0'=>,'w1'=>,'w2'=>,'w3'=>,'w4'=>,'w5'=>,'w6'=>)
);
$allowext = array('.gif','.jpg','.jpeg','.png','.bmp');
$ttkKey = array(
'm0'=>array('app'=>'5e2efdf74c009ba870fb03498036332e1af5d01d','key'=>'9a9796d21133d7d9baf2dfc2e9668ec7c58e765c')
,'m1'=>array('app'=>'4e03032e1889f53e5673b4a784b8c2ddc76606a2','key'=>'1e2f3c36138587c8c2d0726c98d9c3947f454a1f')
//,'m1'=>array('app'=>'','key'=>'')
);
