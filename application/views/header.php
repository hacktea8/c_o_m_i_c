<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo['title'],'-',$web_title;?></title>
<meta name="Keywords"
	content="火影忍者漫画,漫画,火影忍者662,在线漫画,火影漫画,死神,海贼王漫画,网球王子,灌蓝高手,七龙珠" />
<meta name="Description"
	content="火影忍者662于1月22日更新，爱漫画是国内更新火影忍者漫画速度最快、画质最好的火影忍者漫画网，同时每周三以最快速度更新海贼王漫画、死神漫画等热门在线漫画。" />
<link href="<?php echo $css_url;?>global.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $css_url,$_a;?>.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico">
<script language="javascript" src="<?php echo $js_url;?>common.js"></script>
<script language="javascript" src="<?php echo $js_url;?>index.js"></script>
<base onmouseover="window.status='★--请记住『<?php echo $web_title;?>』永久域名：<?php echo $domain;?> --★';return true;" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43439571-3', 'hacktea8.com');
  ga('send', 'pageview');

</script>
</head>
<body>
<style type="text/css">
#suggest {
	top: 27px;
	left: 272px;
}
</style>
<div class="main">
<div class="top">
<div class="logo"><a href="/" title="<?php echo $web_title;?>为您提供漫画、在线漫画、最新漫画免费观看"><?php echo $web_title;?>网专为您提供漫画、在线漫画、火影忍者漫画、火影漫画 ，并提供死神、海贼王漫画、网球王子、灌蓝高手、七龙珠等漫画在线观看</a></div>
<div class="top_right" style="width: 720px;">
<div class="hotListText">热门漫画：
<a href="/comic/54/" target="_blank"
	title="火影忍者漫画"><strong>火影忍者漫画</strong></a> 
</div>
<div class="search" id="search" style="width: 720px;"><a
	href="#"
	style="font-size: 14px; font-weight: bold; color: blue; background-color: #fff;"
 onclick="return false;";target="_blank">诚聘技术精英，广纳动漫人才加盟！</a> <span id="searchTip">标题或作者：</span><input
	name="kw" type="text" value="火影忍者" id="kw"
	onkeydown="fnKeydown(event);" onkeyup="fnKeyup(event);"
	onfocus="fnFocus();" onblur="fnBlur();" /> <input type="button"
	class="btnBig" name="Submit" value="搜索本站漫画" onclick="searchSend()" />
<div id="suggest"></div>
</div>
</div>
</div>
</div>
<div class="main_nav">
<ul class="navList">
<li class="first"><a href="/"><?php echo $web_title;?>首页</a></li>
<?php foreach($channel as &$row){ ?>
<li class="mini"><a href="<?php echo $row['url'];?>" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="subNav">
<div class="subNavList">
<div class="charNav"><strong>
<img src="<?php echo $img_url;?>btn-chrlist.gif" /></strong>
<?php if(0) foreach($letterList as &$row){ ?>
<a href="<?php echo $row['url'];?>" title="<?php echo $row['letter'];?>"><?php echo $row['letter'];?></a>
<?php } ?>
</div>
<div class="otherNav"><span>
<a href="/support/jubao" onclick="">举报低俗漫画</a><a
	href="javascript:void(0);"
	onClick="window.external.AddFavorite('http://<?php echo $domain;?>','爱漫画,在线漫画,为您提供最新、最好看的漫画');"
	class="addFav">收藏<?php echo $web_title;?></a></span>
<?php if(0){ ?>
<a href="/wanjie.html">完结漫画</a> <a
	href="/lianzai.html">连载漫画</a>
<a href="/top.html" class="red">漫画风云榜</a> <a href="/recent.html"
	class="red">最新更新</a>
<?php } ?>
&nbsp;<strong>火影忍者662</strong> <strong>火影忍者漫画662</strong>
1月22日更新</div>
</div>
</div>
<div class="main pr">
