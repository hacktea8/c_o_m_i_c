<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $comicinfo['title'],$web_title; ?></title>
<meta name="Keywords" content="<?php echo $comicinfo['keywords'];?>" />
<link href="<?php echo $css_url;?>global.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.fr {
	float: right;
}

.fl {
	float: left;
}

.none {
	display: none;
}

.pa {
	position: absolute;
}

.pr {
	position: relative;
}

.w220 {
	width: 220px;
}

.bt1px {
	border-top: 1px solid #999;
}

.share {
	position: absolute;
	right: 6px;
	top: 2px;
}

.right-box {
	width: 250px;
	height: 250px;
	padding-left: 4px;
	padding-bottom: 4px;
}

.bg-sepr {
	height: 8px;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
	background-color: #fff;
	clear: both;
}

.duoshuo {
	width: 720px;
	margin: 0 auto;
}

.w720 {
	width: 720px;
	margin: 0 auto;
}

.comment {
	padding: 10px 0;
	font-family: 'Microsoft YaHei', 'Arial Black', Gadget, sans-serif;
}

.comment a {
	font: 600 16px/24px 'Microsoft YaHei', 'Arial Black', Gadget, sans-serif;
	padding: 4px 0;
	text-align: center;
	width: 100px;
	display: inline-block;
	border: 1px solid #ccc;
	height: 24px;
	background-color: #f6f6f6;
	border-top: 1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #f0f0f0;
	box-shadow: 1px 1px 1px #f0f0f0;
}

.comment a:hover {
	background-color: #fafafa;
}

.comment span {
	color: #f30;
}
</style>
<script type="text/javascript" src="<?php echo $js_url;?>common.js"></script>
<script type="text/javascript" src="<?php echo $js_url;?>book.js"></script>
<script type="text/javascript"> var bookInfo = {bid:1119,vid:99}; var i = 0; if (Cookie.read('order') == null) { Cookie.create('order', String(i), 30); } else { i = parseInt(Cookie.read('order')); } function order(q, r) { if (!r) { if (q == i) return; i = q; Cookie.create('order', String(q), 30); } var el = $('subBookList'); var o = el.getElementsByTagName('li'); var len = o.length; var asc = $('asc'); var desc = $('desc'); var s = ""; if (q == 0) { desc.className = 'on'; asc.className = ''; } else { desc.className = ''; asc.className = 'on'; } var t = 0; for (var p = len - 1; p >= 0; p--) { var li = o[p].innerHTML; if (li != '') { s += '<li' + (t % 6 >= 3 ? ' class="alter"' : '') + '>' + o[p].innerHTML + '</li>'; t++; } } el.innerHTML = s; } </script>
</head>
<body>
<div class="main">
<div class="top">
<div class="logo"><a href="/" title="<?php echo $web_title;?>为您提供漫画、在线漫画、最新漫画免费观看"><?php echo $web_title;?>专为您提供漫画、在线漫画
、火影忍者漫画、火影漫画 ，并提供死神、海贼王漫画、网球王子、灌蓝高手、七龙珠等漫画在线免费观看</a></div>
<div class="top_right">
<div class="hotListText"><script language="javascript">hotComic();</script></div>
<div class="search" id="search"><a
	href=""
	style="font-size: 14px; font-weight: bold; color: blue;"
	target="_blank">聊动漫，上贴吧！</a> <span id="searchTip">标题或作者：</span><input
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
	<li><a href="/comic/shaonian/" title="少年热血">少年热血</a></li>
	<li><a href="/comic/wuxia/" title="武侠格斗">武侠格斗</a></li>
	<li><a href="/comic/kehuan/" title="科幻魔幻">科幻魔幻</a></li>
	<li><a href="/comic/tiyu/" title="竞技体育">竞技体育</a></li>
	<li><a href="/comic/xiju/" title="爆笑喜剧">爆笑喜剧</a></li>
	<li><a href="/comic/tuili/" title="侦探推理">侦探推理</a></li>
	<li><a href="/comic/kongbu/" title="恐怖灵异">恐怖灵异</a></li>
	<li><a href="/comic/dalu/" title="大陆漫画">大陆漫画</a></li>
	<li><a href="/comic/japan/" title="日本漫画">日本漫画</a></li>
	<li class="mini"><a href="/comic/hk/" title="港台漫画">港台</a></li>
	<li class="mini"><a href="/comic/oumei/" title="欧美漫画">欧美</a></li>
	<script language="javascript">otherNav();</script>
</ul>
</div>
<div class="subNav">
<div class="subNavList">
<div class="charNav"><strong><img
	src="<?php echo $img_url;?>btn-chrlist.gif" /></strong><a href="/comic/A/">A</a><a
	href="/comic/B/">B</a><a href="/comic/C/">C</a><a href="/comic/D/">D</a><a
	href="/comic/E/">E</a><a href="/comic/F/">F</a><a href="/comic/G/">G</a><a
	href="/comic/H/">H</a><a href="/comic/I/">I</a><a href="/comic/J/">J</a><a
	href="/comic/K/">K</a><a href="/comic/L/">L</a><a href="/comic/M/">M</a><a
	href="/comic/N/">N</a><a href="/comic/O/">O</a><a href="/comic/P/">P</a><a
	href="/comic/Q/">Q</a><a href="/comic/R/">R</a><a href="/comic/S/">S</a><a
	href="/comic/T/">T</a><a href="/comic/U/">U</a><a href="/comic/V/">V</a><a
	href="/comic/W/">W</a><a href="/comic/X/">X</a><a href="/comic/Y/">Y</a><a
	href="/comic/Z/">Z</a></div>
<div class="otherNav"><span><a href="/support/tuijian.aspx"
	onclick="return openWindow(this.href,540,600);">我要推荐漫画</a><a
	href="/support/jubao.aspx"
	onclick="return openWindow(this.href,500,520);">举报低俗漫画</a><a
	href="javascript:void(0);"
	onClick="window.external.AddFavorite('http://www.imanhua.com/?fav','爱漫画,在线漫画,为您提供最新、最好看的漫画');"
	class="addFav">收藏爱漫画</a></span><a href="/wanjie.html">完结漫画</a> <a
	href="/lianzai.html">连载漫画</a> <a href="/all.html">全部漫画</a> <a
	href="/top.html" class="red">漫画风云榜</a> <a href="/recent.html"
	class="red">最新更新</a></div>
</div>
</div>
<div
	style="width: 980px; margin: 0 auto 2px; width: 980px; height: 26px;"><script
	type="text/javascript">var cpro_id = "u1374308";</script>
</div>
<div class="main"><script type="text/javascript"
	src="<?php echo $js_url;?>top.js"></script> <script type="text/javascript">show(0);</script>
</div>
<div class="main">
<div class="blank2 bookBG"></div>
<div class="bookBG1">
<div class="fl w220">
<h2 class="bar"><span><a href="/recent.html" class="red">>>更多</a>
</span><strong>最新更新漫画</strong></h2>
<ul class="newUpdate">
	<li><em class="red">2014/1/14</em><a href="/comic/3248/"
		target="_blank" title="猛禽小队">猛禽小队</a>[<a class="red"
		href="/comic/3248/list_94044.html" target="_blank" title="第25卷">第25卷</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/3865/"
		target="_blank" title="高分少女">高分少女</a>[<a class="red"
		href="/comic/3865/list_94043.html" target="_blank" title="第08话(补)">第08话(补)</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/4906/"
		target="_blank" title="飙速宅男">飙速宅男</a>[<a class="red"
		href="/comic/4906/list_94042.html" target="_blank" title="第124话">第124话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5210/"
		target="_blank" title="高岭之华">高岭之华</a>[<a class="green"
		href="/comic/5210/list_94041.html" target="_blank" title="完结">完结</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/2153/"
		target="_blank" title="海月姬">海月姬</a>[<a class="red"
		href="/comic/2153/list_94033.html" target="_blank" title="53话">53话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/4759/"
		target="_blank" title="请跟废柴谈恋爱">请跟废柴谈恋爱</a>[<a class="red"
		href="/comic/4759/list_94032.html" target="_blank" title="第09话">第09话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/1883/"
		target="_blank" title="神圣福音">神圣福音</a>[<a class="red"
		href="/comic/1883/list_94031.html" target="_blank" title="第06卷">第06卷</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/2982/"
		target="_blank" title="伪恋">伪恋</a>[<a class="red"
		href="/comic/2982/list_94028.html" target="_blank" title="第08卷">第08卷</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/1365/"
		target="_blank" title="键人">键人</a>[<a class="red"
		href="/comic/1365/list_94027.html" target="_blank" title="第01卷">第01卷</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5103/"
		target="_blank" title="HACHI东京23宫">HACHI东京23宫</a>[<a class="red"
		href="/comic/5103/list_94026.html" target="_blank" title="第11话">第11话</a>]</li>
</ul>
<script type="text/javascript">show(4);</script>
<div class="bt1px" style="background-color: #f0f0f0; margin: 1px;">
<script type="text/javascript">show(5);</script></div>
<h2 class="bar bt1px"><strong>最新添加的漫画</strong></h2>
<ul class="newUpdate">
	<li><em class="red">2014/1/14</em><a href="/comic/5210/"
		target="_blank" title="高岭之华">高岭之华</a>[<a class="green"
		href="/comic/5210/list_94041.html" target="_blank" title="完结">完结</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5208/"
		target="_blank" title="哈莉奎茵">哈莉奎茵</a>[<a class="red"
		href="/comic/5208/list_94023.html" target="_blank" title="#01">#01</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5207/"
		target="_blank" title="JSA全明星">JSA全明星</a>[<a class="red"
		href="/comic/5207/list_94022.html" target="_blank" title="#01">#01</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5206/"
		target="_blank" title="暴力宇宙海贼">暴力宇宙海贼</a>[<a class="red"
		href="/comic/5206/list_94021.html" target="_blank" title="第01话">第01话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5205/"
		target="_blank" title="剪刀石头布">剪刀石头布</a>[<a class="red"
		href="/comic/5205/list_94020.html" target="_blank" title="第01话">第01话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5204/"
		target="_blank" title="片翼迷宮">片翼迷宮</a>[<a class="red"
		href="/comic/5204/list_94019.html" target="_blank" title="第01话">第01话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5203/"
		target="_blank" title="La Vie en Doll">La Vie en Doll</a>[<a
		class="red" href="/comic/5203/list_94018.html" target="_blank"
		title="第01话">第01话</a>]</li>
	<li><em class="red">2014/1/14</em><a href="/comic/5202/"
		target="_blank" title="群青战记">群青战记</a>[<a class="red"
		href="/comic/5202/list_94017.html" target="_blank" title="第01话">第01话</a>]</li>
	<li><em>2014/1/11</em><a href="/comic/5201/" target="_blank"
		title="黑色爬山虎宅邸秘闻">黑色爬山虎宅邸秘闻</a>[<a class="red"
		href="/comic/5201/list_93906.html" target="_blank" title="第01话">第01话</a>]</li>
	<li><em>2014/1/11</em><a href="/comic/5200/" target="_blank"
		title="Journalist Revolution">Journalist Revolution</a>[<a
		class="green" href="/comic/5200/list_93900.html" target="_blank"
		title="完结">完结</a>]</li>
</ul>
</div>
<div class="bookInfo pr">
<h2 class="bar"><strong class="position">您当前的位置 ：<em><a
	href="/">首页</a> >> <a href="/comic/<?php echo $comicinfo['letter'];?>/">字母<?php echo $comicinfo['letter'];?>漫画列表</a> >> <a
	href="/comic/<?php echo $comicinfo['id'];?>/"><?php echo $comicinfo['name'];?>漫画</a></em></strong></h2>
<div class="share"><!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><span
	class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a
	class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a>
<a class="bds_t163"></a> <a class="shareCount"></a></div>
<!-- Baidu Button END --></div>
<h1>恶魔奶爸</h1>
<p class="bookAttr"><span>完结状态：[ <em>连载中<?php echo $comicinfo['status'];?></em> ]</span>原作者：<?php echo $comicinfo['author'];?> |
字母索引：<a href="/comic/<?php echo $comicinfo['letter'];?>"><?php echo $comicinfo['letter'];?></a> | 加入时间：<?php echo $comicinfo['atime'];?> | 更新时间：<?php echo $comicinfo['rtime'];?></p>
<span class="blank6"></span>
<div class="bookMain">
<div class="bookIntro">
<div class="fr right-box"><script type="text/javascript">show(1);</script>
</div>
<h2><?php echo $comicinfo['name'];?>漫画</h2>
<div class="intro">
<?php echo $comicinfo['intro'];?>
&nbsp;</p>
</div>
<div class="bookSimilar">
<h2>恶魔奶爸相关漫画</h2>
<ul>
	<li><a href="/comic/2372/" title="魔王勇者 我拒绝">魔王勇者 我拒绝</a></li>
	<li><a href="/comic/3551/" title="打工吧魔王大人">打工吧魔王大人</a></li>
	<li><a href="/comic/65/" title="今天开始做魔王">今天开始做魔王</a></li>
	<li><a href="/comic/3041/" title="魔王勇者-女魔法师外传">魔王勇者-女魔法师外传</a></li>
	<li><a href="/comic/3400/" title="魔王属性少女与村民A">魔王属性少女与村民A</a></li>
	<li><a href="/comic/3150/" title="恶魔奶爸单行本">恶魔奶爸单行本</a></li>
	<li><a href="/comic/4878/" title="打工吧魔王大人校园篇">打工吧魔王大人校园篇</a></li>
	<li><a href="/comic/4698/" title="新妹魔王的契约者">新妹魔王的契约者</a></li>
	<li><a href="/comic/1054/" title="魔王爱勇者">魔王爱勇者</a></li>
	<li><a href="/comic/5002/" title="魔王大人你就收下这个吧">魔王大人你就收下这个吧</a></li>
	<li><a href="/comic/2967/" title="新魔王勇者">新魔王勇者</a></li>
	<li><a href="/comic/4993/" title="魔技科的剑士与召唤魔王">魔技科的剑士与召唤魔王</a></li>
	<li><a href="/comic/4179/" title="甜心魔王小冤家">甜心魔王小冤家</a></li>
	<li><a href="/comic/5064/" title="魔王勇者向着丘之彼方">魔王勇者向着丘之彼方</a></li>
	<li><a href="/comic/793/" title="魔王Juvenile Remix">魔王Juvenile
	Remix</a></li>
	<li><a href="/comic/4713/" title="FANTASMA">FANTASMA</a></li>
	<li><a href="/comic/2750/" title="魔王的教室">魔王的教室</a></li>
	<li><a href="/comic/3336/" title="自称魔王和中二组织">自称魔王和中二组织</a></li>
	<li><a href="/comic/4739/" title="D机关的魔王">D机关的魔王</a></li>
	<li><a href="/comic/1295/" title="恶魔辩护">恶魔辩护</a></li>
	<li><a href="/comic/1892/" title="召唤恶魔">召唤恶魔</a></li>
	<li><a href="/comic/2335/" title="恶魔偶像">恶魔偶像</a></li>
	<li><a href="/comic/4204/" title="恶魔幸存者2 the ANIMATION">恶魔幸存者2
	the ANIMATION</a></li>
	<li><a href="/comic/3738/" title="饲主是恶魔">饲主是恶魔</a></li>
	<li><a href="/comic/4499/" title="恶魔般的新郎">恶魔般的新郎</a></li>
	<li><a href="/comic/2761/" title="恶魔幸存者2">恶魔幸存者2</a></li>
	<li><a href="/comic/4707/" title="DDD恶魔附体战士">DDD恶魔附体战士</a></li>
	<li><a href="/comic/1417/" title="恶魔恶魔">恶魔恶魔</a></li>
	<li><a href="/comic/3633/" title="女神异闻录恶魔幸存者">女神异闻录恶魔幸存者</a></li>
	<li><a href="/comic/4555/" title="恶魔之拥">恶魔之拥</a></li>
	<li><a href="/comic/960/" title="花与恶魔">花与恶魔</a></li>
	<li><a href="/comic/4145/" title="恶魔72">恶魔72</a></li>
	<li><a href="/comic/4470/" title="恶魔与糖果">恶魔与糖果</a></li>
	<li><a href="/comic/910/" title="恶魔战士">恶魔战士</a></li>
	<li><a href="/comic/3383/" title="美丽的恶魔">美丽的恶魔</a></li>
	<li><a href="/comic/4724/" title="恶魔少女实习生">恶魔少女实习生</a></li>
	<li><a href="/comic/34/" title="恶魔管家">恶魔管家</a></li>
</ul>
<div class="blank4"></div>
</div>
<script type="text/javascript">show(2);</script>
<div class="comment"><a href='#comment'>发表评论</a> &nbsp;<span>(评论并转发腾讯微薄亦有机会赢Q币)</span></div>
<div class="blank4"></div>
</div>
<div class="bookCover"><img
	src="<?php echo $img_url;?>/mowangdefuqing.jpg" alt="恶魔奶爸漫画" /></div>
</div>
<div
	style="background-color: #FFFFFF; border-top: 1px solid #999999; clear: both;">
<script type="text/javascript">show(3);</script></div>
<div class="subBookList" id="subBookBox"
	style="border-top: 1px solid #999999;">
<h2 class="bar"><span class="orderNav">[ 最近更新于：<?php echo $comicinfo['rtime'];?>]
排序：<a href="javascript:void(0);" onclick="order(0)" class="on" id="desc">降序</a>
| <a href="javascript:void(0);" onclick="order(1)" id="asc">升序</a>
&nbsp;</span><strong><?php echo $comicinfo['name'];?>漫画列表</strong></h2>
<div class="blank8"></div>
<div class="clipBox">漫友注意啦：支持<strong><?php echo $comicinfo['name'];?>漫画</strong>，就赶快把阅读地址：<script
	type="text/javascript">initClipBox();</script>在博客、QQ、论坛签名档上告诉你的好友们</div>
<ul style="" id='subBookList'>
	<li><a href="/comic/1119/list_93076.html" title="第234话"
		target="_blank">第234话</a></li>
	<li><a href="/comic/1119/list_36230.html" title="第25话"
		target="_blank">第25话</a></li>
	<li><a href="/comic/1119/list_35848.html" title="第24话"
		target="_blank">第24话</a></li>
	<li><a href="/comic/1119/list_35537.html" title="第23话"
		target="_blank">第23话</a></li>
	<li class="alter"><a href="/comic/1119/list_35388.html"
		title="第22话" target="_blank">第22话</a></li>
	<li class="alter"><a href="/comic/1119/list_35132.html"
		title="第21话" target="_blank">第21话</a></li>
	<li class="alter"><a href="/comic/1119/list_34954.html"
		title="第20话" target="_blank">第20话</a></li>
	<li><a href="/comic/1119/list_34849.html" title="第19话"
		target="_blank">第19话</a></li>
	<li><a href="/comic/1119/list_34411.html" title="第18话"
		target="_blank">第18话</a></li>
	<li><a href="/comic/1119/list_34268.html" title="第17话"
		target="_blank">第17话</a></li>
	<li class="alter"><a href="/comic/1119/list_34072.html"
		title="第16话" target="_blank">第16话</a></li>
	<li class="alter"><a href="/comic/1119/list_33690.html"
		title="第15话" target="_blank">第15话</a></li>
	<li class="alter"><a href="/comic/1119/list_33399.html"
		title="第14话" target="_blank">第14话</a></li>
	<li><a href="/comic/1119/list_33134.html" title="第13话"
		target="_blank">第13话</a></li>
	<li><a href="/comic/1119/list_32976.html" title="第12话"
		target="_blank">第12话</a></li>
	<li><a href="/comic/1119/list_32450.html" title="第11话"
		target="_blank">第11话</a></li>
	<li class="alter"><a href="/comic/1119/list_32266.html"
		title="第10话" target="_blank">第10话</a></li>
	<li class="alter"><a href="/comic/1119/list_32005.html"
		title="第09话" target="_blank">第09话</a></li>
	<li class="alter"><a href="/comic/1119/list_31908.html"
		title="第08话" target="_blank">第08话</a></li>
	<li><a href="/comic/1119/list_31671.html" title="第07话"
		target="_blank">第07话</a></li>
	<li><a href="/comic/1119/list_31422.html" title="第06话"
		target="_blank">第06话</a></li>
	<li><a href="/comic/1119/list_31239.html" title="第05话"
		target="_blank">第05话</a></li>
	<li class="alter"><a href="/comic/1119/list_31042.html"
		title="番外篇1" target="_blank">番外篇1</a></li>
	<li class="alter"><a href="/comic/1119/list_31041.html"
		title="第04话" target="_blank">第04话</a></li>
	<li class="alter"><a href="/comic/1119/list_31040.html"
		title="第03话" target="_blank">第03话</a></li>
	<li><a href="/comic/1119/list_31039.html" title="第02话"
		target="_blank">第02话</a></li>
	<li><a href="/comic/1119/list_31038.html" title="第01话"
		target="_blank">第01话</a></li>
</ul>
<div class="blank8"></div>
</div>
<div>
<div class="bg-sepr"></div>
<h2 class="bar"><strong>恶魔奶爸漫画评论</strong><a id="comment"></a></h2>
<div class="duoshuo">
<div class="ds-thread"></div>
</div>
</div>
</div>
<div class="blank2"></div>
</div>
<div class="blank2 bookBG2"></div>
</div>
<script type="text/javascript" id="bdshare_js"
	data="type=tools&amp;uid=12103"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">  if (typeof(bookInfo.vid) === 'number' && bookInfo.vid > 0) {  var url = 'http://www.dm456.com/aspx/outer2.aspx?id=' + bookInfo.vid; var obj = document.getElementById("subBookBox"); var newNode = document.createElement("div"); newNode.style.backgroundColor="#ffffff"; newNode.innerHTML ='<iframe width="752" height="122" src="' + url + '" style="padding:0; margin:0;border:none;overflow:hidden;" ></iframe><div class="blank8" style="background-color: #fff;"></div>';  obj.parentNode.insertBefore(newNode,obj); } var duoshuoQuery = { short_name: "imanhua" }; var _c = createXMLHttp(); _c.open("GET", "/v2/user/count.aspx?bid=1119", false); _c.send(null); document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000); (function () {  var ds = document.createElement('script'); ds.type = 'text/javascript'; ds.async = true; ds.src = 'http://static.duoshuo.com/embed.js'; ds.charset = 'UTF-8'; (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds); })(); </script>
<div class="main" style="margin-top: 8px;"><script
	type="text/javascript">show(6);</script></div>
<div class="blank4"></div>
<div class="footer"><?php echo $comicinfo['name'];?>漫画来自网友分享和上传，以供漫画爱好者研究<?php echo $comicinfo['name'];?>漫画画法技巧和构图方式。若侵犯到您的权益，请立即<a
	target="_blank" class="red" href="/contact.html"><b>联系我们</b></a>删除。本站不负任何相关责任。
<br />
<script src="<?php echo $js_url;?>foot.js" language='JavaScript'></script>
<script src='<?php echo $js_url;?>icount.js' language='JavaScript' ></script></div>
</body>
</html>
