<?php

$_domain='http://www.99comic.com/';

//更新漫画
$upmhListPattern='#<div class=\'cpitem\'><span class=\'.+\'>(.*)</span><span class=\'.+\'>\d+</span><span class=\'.+\'><a href=\'(.+)\' title=\'.*\'>(.+)</a>\s*</span><span class=\'.+\'><span class=\'.+\'>(.*)</span></span><span class=\'.+\'><a target=_blank href=\'(.+)\'>(.*)</a>.*</span></div>#U';
//新加漫画
$NewmhListPattern=&$upmhListPattern;
//漫画分类
$mhcateListPattern='#<a href="(.+)" class="linkb">(.+)</a>#U';
//获取列表页漫画
//$catemhlistPattern='#<li class="list_small">\s*<a href="/Comic/99(\d+)/" title=".+"><img src=(\S+) alt="(.+)" class="small_preview" lt=".*" /></a>\s*<h3><a href=".+" title=".+">(.+)</a></h3>\s*</li>#Uis';
$catemhlistPattern='#<a href="/Comic/99(\d+)/" title="([^"]+)"><img src=(\S+) alt="([^"]+)" class="small_preview" lt="" /></a>#Uis';
//获取列表页漫画页码
$catemhlistpagePattern='#部 每页25部 共有(\d+)页 当前<font color=".+">\d+</font>页#Uis';
//漫画信息
$mhInfoPattern='#<ul class="ul en_info">\s*<li><b>漫畫作者：</b><a target=_blank href=\'.+\'>(.+)</a></li>\s*<li><b>漫畫類型：</b><a href=\'.+\' title=\'.+\'>(.+)</a></li>\s*<li><b>享受指數：.+</li>\s*<li><b>漫畫狀態：</b><b class="red">連載 (.+)</b></li>\s*<li><b>瀏覽次數：</b><b class="red">.+</b>次</li>\s*<li><b>上架日期：</b>.+</li>\s*<li><b>更新集數：</b><a title=\'.+\' target=\'_blank\' href=\'.+\'>(.+)</a></li>\s*<li><b>更新日期：</b>.+</li>\s*</ul>#U';
//漫画集数列表
$mhVolListPattern='#<div><a title=\'.+\'\s*(class=\'cVolNew\')?\s*target=\'_blank\' href=\'(.+)\'>(.+)</a>.*</div>#Uis';
//漫画描述
$mhDesPattern='#<div class="cCon">(.+)</div>#Uis';
//漫画所属字母
$mhCharPattern='#<div id="location_div_left">您的位置：\s*<a href="http://www.99comic.com/" title="九九漫畫">返回首頁</a> &gt; <a href="http://www.99comic.com/lists/" title="漫畫列表">漫畫列表</a> &gt; <a title=\'.+\' href=\'.+\'>.+</a> &gt; <a title=\'.+\' href=\'.+\'>([A-Z0-9])?漫畫</a>.+</div>#Uis';
//
$pageImgListPattern='#var sFiles="(.+)";#Uis';
$spathPattern='#var sPath="(\d+)";#U';
$serverListPattern='#var sDS = \s*"(.+)";#U';
$serverUrl=$_domain.'script/viewhtml.js';


?>
