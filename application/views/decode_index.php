<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>采集管理程序</title>
<script type="text/javascript" src="/public/js/jquery.js"></script>
</head>
<body>
<div>
<ul>
<li><a href="/decode/caijiAll" target="_blank" >采集所有-网站初始化···</a></li>
<li><a href="/decode/caijiToday" target="_blank" >采集今天更新的数据</a></li>
<li><a href="/decode/caijiOnlyComic" target="_blank" >只采集漫画数据</a></li>
<li><a href="/decode/caijiVols" target="_blank" >采集漫画卷数数据</a></li>
<li><a href="/decode/caijiComicdata" id='caiji' style="display:none" target="_blank" >采集一部漫画数据</a><input type="text" id="comicid" value="" />漫画ID</li>
</ul>
</div>
<script type="text/javascript">
$(document).ready(function (){
    $('#caiji').css('display','inline');
	
});
</script>
</body>
</html>