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
<div class="logo"><a href="/" title="爱漫画为您提供漫画、在线漫画、最新漫画免费观看">爱漫画网专为您提供漫画、在线漫画
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
	<li class="first"><a href="/">爱漫画首页</a></li>
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
	href="/">首页</a> >> <a href="/comic/E/">字母E漫画列表</a> >> <a
	href="/comic/1119/">恶魔奶爸漫画</a></em></strong></h2>
<div class="share"><!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><span
	class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a
	class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a>
<a class="bds_t163"></a> <a class="shareCount"></a></div>
<!-- Baidu Button END --></div>
<h1>恶魔奶爸</h1>
<p class="bookAttr"><span>完结状态：[ <em>连载中</em> ]</span>原作者：田村隆平 |
字母索引：<a href="/comic/E">E</a> | 加入时间：2009-03-15 | 更新时间：2013-12-26</p>
<span class="blank6"></span>
<div class="bookMain">
<div class="bookIntro">
<div class="fr right-box"><script type="text/javascript">show(1);</script>
</div>
<h2>恶魔奶爸漫画</h2>
<div class="intro">
<p>男鹿辰巳，石矢魔高中的不良学生，打架无败记录，因此被周围人称为恶魔，外号&ldquo;暴走男鹿&rdquo;。动画每一集片头都被称为&ldquo;很久很久以前，有一个不把别人当人看的&hellip;&hellip;&rdquo;由爱漫画收集自互联网－爱漫画，让你爱上漫画！</p>
<p>某次在河边打架的时候遇见了从上游漂来的大叔（阿兰德龙，次元传送恶魔），男鹿把大叔带上岸之后大叔却突然分成两半，惊魂未定之余又发现了大叔体内有个婴儿，谁知道这个小婴儿竟然是来自魔界未来的大魔王的儿子（次子）！大魔王让自己的次子去毁灭人类？！男鹿也莫名其妙的成为魔王的父亲，从此开始了本来就不平凡的生活。<br />
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
<h2 class="bar"><span class="orderNav">[ 最近更新于：2013-12-26]
排序：<a href="javascript:void(0);" onclick="order(0)" class="on" id="desc">降序</a>
| <a href="javascript:void(0);" onclick="order(1)" id="asc">升序</a>
&nbsp;</span><strong>恶魔奶爸漫画列表</strong></h2>
<div class="blank8"></div>
<div class="clipBox">漫友注意啦：支持<strong>恶魔奶爸漫画</strong>，就赶快把阅读地址：<script
	type="text/javascript">initClipBox();</script>在博客、QQ、论坛签名档上告诉你的好友们</div>
<ul style="" id='subBookList'>
	<li><a href="/comic/1119/list_93076.html" title="第234话"
		target="_blank">第234话</a></li>
	<li><a href="/comic/1119/list_92701.html" title="第233话"
		target="_blank">第233话</a></li>
	<li><a href="/comic/1119/list_92435.html" title="第232话"
		target="_blank">第232话</a></li>
	<li class="alter"><a href="/comic/1119/list_92039.html"
		title="第231话" target="_blank">第231话</a></li>
	<li class="alter"><a href="/comic/1119/list_91768.html"
		title="第230话" target="_blank">第230话</a></li>
	<li class="alter"><a href="/comic/1119/list_91249.html"
		title="第229话" target="_blank">第229话</a></li>
	<li><a href="/comic/1119/list_91018.html" title="第228话"
		target="_blank">第228话</a></li>
	<li><a href="/comic/1119/list_90590.html" title="第227话"
		target="_blank">第227话</a></li>
	<li><a href="/comic/1119/list_89843.html" title="第226话"
		target="_blank">第226话</a></li>
	<li class="alter"><a href="/comic/1119/list_89536.html"
		title="第225话" target="_blank">第225话</a></li>
	<li class="alter"><a href="/comic/1119/list_89153.html"
		title="第224话" target="_blank">第224话</a></li>
	<li class="alter"><a href="/comic/1119/list_88926.html"
		title="第223话" target="_blank">第223话</a></li>
	<li><a href="/comic/1119/list_88560.html" title="第222话"
		target="_blank">第222话</a></li>
	<li><a href="/comic/1119/list_88190.html" title="第221话"
		target="_blank">第221话</a></li>
	<li><a href="/comic/1119/list_87875.html" title="第220话"
		target="_blank">第220话</a></li>
	<li class="alter"><a href="/comic/1119/list_87688.html"
		title="第219话" target="_blank">第219话</a></li>
	<li class="alter"><a href="/comic/1119/list_87088.html"
		title="第218话" target="_blank">第218话</a></li>
	<li class="alter"><a href="/comic/1119/list_86805.html"
		title="第217话" target="_blank">第217话</a></li>
	<li><a href="/comic/1119/list_85943.html" title="第216话"
		target="_blank">第216话</a></li>
	<li><a href="/comic/1119/list_85655.html" title="第215话"
		target="_blank">第215话</a></li>
	<li><a href="/comic/1119/list_85269.html" title="第214话"
		target="_blank">第214话</a></li>
	<li class="alter"><a href="/comic/1119/list_84871.html"
		title="第213话" target="_blank">第213话</a></li>
	<li class="alter"><a href="/comic/1119/list_84565.html"
		title="第212话" target="_blank">第212话</a></li>
	<li class="alter"><a href="/comic/1119/list_84219.html"
		title="第211话" target="_blank">第211话</a></li>
	<li><a href="/comic/1119/list_83968.html" title="第210话"
		target="_blank">第210话</a></li>
	<li><a href="/comic/1119/list_83586.html" title="第209话"
		target="_blank">第209话</a></li>
	<li><a href="/comic/1119/list_83353.html" title="第208话"
		target="_blank">第208话</a></li>
	<li class="alter"><a href="/comic/1119/list_82992.html"
		title="第207话" target="_blank">第207话</a></li>
	<li class="alter"><a href="/comic/1119/list_82660.html"
		title="第206话" target="_blank">第206话</a></li>
	<li class="alter"><a href="/comic/1119/list_82356.html"
		title="第205话" target="_blank">第205话</a></li>
	<li><a href="/comic/1119/list_82045.html" title="第204话"
		target="_blank">第204话</a></li>
	<li><a href="/comic/1119/list_81732.html" title="第203话"
		target="_blank">第203话</a></li>
	<li><a href="/comic/1119/list_81103.html" title="第202话"
		target="_blank">第202话</a></li>
	<li class="alter"><a href="/comic/1119/list_80843.html"
		title="第201话" target="_blank">第201话</a></li>
	<li class="alter"><a href="/comic/1119/list_80568.html"
		title="第200话" target="_blank">第200话</a></li>
	<li class="alter"><a href="/comic/1119/list_80277.html"
		title="第199话" target="_blank">第199话</a></li>
	<li><a href="/comic/1119/list_80010.html" title="第198话"
		target="_blank">第198话</a></li>
	<li><a href="/comic/1119/list_79733.html" title="第197话"
		target="_blank">第197话</a></li>
	<li><a href="/comic/1119/list_79487.html" title="第196话"
		target="_blank">第196话</a></li>
	<li class="alter"><a href="/comic/1119/list_79228.html"
		title="第195话" target="_blank">第195话</a></li>
	<li class="alter"><a href="/comic/1119/list_78964.html"
		title="第194话" target="_blank">第194话</a></li>
	<li class="alter"><a href="/comic/1119/list_78708.html"
		title="第193话" target="_blank">第193话</a></li>
	<li><a href="/comic/1119/list_78513.html" title="第192话"
		target="_blank">第192话</a></li>
	<li><a href="/comic/1119/list_78293.html" title="第191话"
		target="_blank">第191话</a></li>
	<li><a href="/comic/1119/list_78136.html" title="第190话"
		target="_blank">第190话</a></li>
	<li class="alter"><a href="/comic/1119/list_77846.html"
		title="第189话" target="_blank">第189话</a></li>
	<li class="alter"><a href="/comic/1119/list_77622.html"
		title="第188话" target="_blank">第188话</a></li>
	<li class="alter"><a href="/comic/1119/list_76841.html"
		title="第187话" target="_blank">第187话</a></li>
	<li><a href="/comic/1119/list_76453.html" title="第186话"
		target="_blank">第186话</a></li>
	<li><a href="/comic/1119/list_76264.html" title="第185话"
		target="_blank">第185话</a></li>
	<li><a href="/comic/1119/list_76020.html" title="第184话"
		target="_blank">第184话</a></li>
	<li class="alter"><a href="/comic/1119/list_75674.html"
		title="第183话" target="_blank">第183话</a></li>
	<li class="alter"><a href="/comic/1119/list_75329.html"
		title="第182话" target="_blank">第182话</a></li>
	<li class="alter"><a href="/comic/1119/list_75121.html"
		title="第181话" target="_blank">第181话</a></li>
	<li><a href="/comic/1119/list_74843.html" title="第180话"
		target="_blank">第180话</a></li>
	<li><a href="/comic/1119/list_74576.html" title="第179话"
		target="_blank">第179话</a></li>
	<li><a href="/comic/1119/list_74284.html" title="第178话"
		target="_blank">第178话</a></li>
	<li class="alter"><a href="/comic/1119/list_73988.html"
		title="第177话" target="_blank">第177话</a></li>
	<li class="alter"><a href="/comic/1119/list_73667.html"
		title="第176话" target="_blank">第176话</a></li>
	<li class="alter"><a href="/comic/1119/list_73475.html"
		title="第175话" target="_blank">第175话</a></li>
	<li><a href="/comic/1119/list_73231.html" title="第174话"
		target="_blank">第174话</a></li>
	<li><a href="/comic/1119/list_72977.html" title="第173话"
		target="_blank">第173话</a></li>
	<li><a href="/comic/1119/list_72685.html" title="第172话"
		target="_blank">第172话</a></li>
	<li class="alter"><a href="/comic/1119/list_72414.html"
		title="第171话" target="_blank">第171话</a></li>
	<li class="alter"><a href="/comic/1119/list_72060.html"
		title="第170话" target="_blank">第170话</a></li>
	<li class="alter"><a href="/comic/1119/list_71785.html"
		title="第169话" target="_blank">第169话</a></li>
	<li><a href="/comic/1119/list_71410.html" title="第168话"
		target="_blank">第168话</a></li>
	<li><a href="/comic/1119/list_71025.html" title="第167话"
		target="_blank">第167话</a></li>
	<li><a href="/comic/1119/list_70833.html" title="第166话"
		target="_blank">第166话</a></li>
	<li class="alter"><a href="/comic/1119/list_70589.html"
		title="第165话" target="_blank">第165话</a></li>
	<li class="alter"><a href="/comic/1119/list_70294.html"
		title="第164话" target="_blank">第164话</a></li>
	<li class="alter"><a href="/comic/1119/list_70034.html"
		title="第163话" target="_blank">第163话</a></li>
	<li><a href="/comic/1119/list_69721.html" title="第162话"
		target="_blank">第162话</a></li>
	<li><a href="/comic/1119/list_69598.html" title="JumpNEXT番外篇"
		target="_blank">JumpNEXT番外篇</a></li>
	<li><a href="/comic/1119/list_69488.html" title="第161话"
		target="_blank">第161话</a></li>
	<li class="alter"><a href="/comic/1119/list_69311.html"
		title="第160话" target="_blank">第160话</a></li>
	<li class="alter"><a href="/comic/1119/list_68945.html"
		title="第159话" target="_blank">第159话</a></li>
	<li class="alter"><a href="/comic/1119/list_68654.html"
		title="第158话" target="_blank">第158话</a></li>
	<li><a href="/comic/1119/list_68410.html" title="第157话"
		target="_blank">第157话</a></li>
	<li><a href="/comic/1119/list_68085.html" title="第156话"
		target="_blank">第156话</a></li>
	<li><a href="/comic/1119/list_67898.html" title="第155话"
		target="_blank">第155话</a></li>
	<li class="alter"><a href="/comic/1119/list_67432.html"
		title="第154话" target="_blank">第154话</a></li>
	<li class="alter"><a href="/comic/1119/list_67003.html"
		title="第153话" target="_blank">第153话</a></li>
	<li class="alter"><a href="/comic/1119/list_66735.html"
		title="第152话" target="_blank">第152话</a></li>
	<li><a href="/comic/1119/list_66469.html" title="第151话"
		target="_blank">第151话</a></li>
	<li><a href="/comic/1119/list_66293.html" title="第150话"
		target="_blank">第150话</a></li>
	<li><a href="/comic/1119/list_65994.html" title="第149话"
		target="_blank">第149话</a></li>
	<li class="alter"><a href="/comic/1119/list_65687.html"
		title="第148话" target="_blank">第148话</a></li>
	<li class="alter"><a href="/comic/1119/list_65466.html"
		title="第147话" target="_blank">第147话</a></li>
	<li class="alter"><a href="/comic/1119/list_65244.html"
		title="第146话" target="_blank">第146话</a></li>
	<li><a href="/comic/1119/list_64879.html" title="第145话"
		target="_blank">第145话</a></li>
	<li><a href="/comic/1119/list_64572.html" title="第144话"
		target="_blank">第144话</a></li>
	<li><a href="/comic/1119/list_64280.html" title="第143话"
		target="_blank">第143话</a></li>
	<li class="alter"><a href="/comic/1119/list_64034.html"
		title="第142话" target="_blank">第142话</a></li>
	<li class="alter"><a href="/comic/1119/list_63993.html"
		title="番外篇7" target="_blank">番外篇7</a></li>
	<li class="alter"><a href="/comic/1119/list_63875.html"
		title="第141话" target="_blank">第141话</a></li>
	<li><a href="/comic/1119/list_63700.html" title="第140话"
		target="_blank">第140话</a></li>
	<li><a href="/comic/1119/list_63476.html" title="第139话"
		target="_blank">第139话</a></li>
	<li><a href="/comic/1119/list_63125.html" title="番外篇6"
		target="_blank">番外篇6</a></li>
	<li class="alter"><a href="/comic/1119/list_62833.html"
		title="第138话" target="_blank">第138话</a></li>
	<li class="alter"><a href="/comic/1119/list_62306.html"
		title="第137话" target="_blank">第137话</a></li>
	<li class="alter"><a href="/comic/1119/list_62015.html"
		title="第136话" target="_blank">第136话</a></li>
	<li><a href="/comic/1119/list_61798.html" title="第135话"
		target="_blank">第135话</a></li>
	<li><a href="/comic/1119/list_61612.html" title="第134话"
		target="_blank">第134话</a></li>
	<li><a href="/comic/1119/list_61502.html" title="第133话"
		target="_blank">第133话</a></li>
	<li class="alter"><a href="/comic/1119/list_61233.html"
		title="第132话" target="_blank">第132话</a></li>
	<li class="alter"><a href="/comic/1119/list_60942.html"
		title="第131话" target="_blank">第131话</a></li>
	<li class="alter"><a href="/comic/1119/list_60681.html"
		title="第130话" target="_blank">第130话</a></li>
	<li><a href="/comic/1119/list_60377.html" title="第129话"
		target="_blank">第129话</a></li>
	<li><a href="/comic/1119/list_60052.html" title="第128话"
		target="_blank">第128话</a></li>
	<li><a href="/comic/1119/list_59757.html" title="第127话"
		target="_blank">第127话</a></li>
	<li class="alter"><a href="/comic/1119/list_59595.html"
		title="第126话" target="_blank">第126话</a></li>
	<li class="alter"><a href="/comic/1119/list_59265.html"
		title="第125话" target="_blank">第125话</a></li>
	<li class="alter"><a href="/comic/1119/list_58851.html"
		title="第124话" target="_blank">第124话</a></li>
	<li><a href="/comic/1119/list_58588.html" title="第123话"
		target="_blank">第123话</a></li>
	<li><a href="/comic/1119/list_58248.html" title="第122话"
		target="_blank">第122话</a></li>
	<li><a href="/comic/1119/list_57938.html" title="第121话"
		target="_blank">第121话</a></li>
	<li class="alter"><a href="/comic/1119/list_57651.html"
		title="第120话" target="_blank">第120话</a></li>
	<li class="alter"><a href="/comic/1119/list_57007.html"
		title="第119话" target="_blank">第119话</a></li>
	<li class="alter"><a href="/comic/1119/list_56646.html"
		title="第118话" target="_blank">第118话</a></li>
	<li><a href="/comic/1119/list_56426.html" title="第117话"
		target="_blank">第117话</a></li>
	<li><a href="/comic/1119/list_56227.html" title="第116话"
		target="_blank">第116话</a></li>
	<li><a href="/comic/1119/list_55872.html" title="第115话"
		target="_blank">第115话</a></li>
	<li class="alter"><a href="/comic/1119/list_55507.html"
		title="第114话" target="_blank">第114话</a></li>
	<li class="alter"><a href="/comic/1119/list_55340.html"
		title="第113话" target="_blank">第113话</a></li>
	<li class="alter"><a href="/comic/1119/list_55183.html"
		title="第112话" target="_blank">第112话</a></li>
	<li><a href="/comic/1119/list_55011.html" title="第111话"
		target="_blank">第111话</a></li>
	<li><a href="/comic/1119/list_54831.html" title="第110话"
		target="_blank">第110话</a></li>
	<li><a href="/comic/1119/list_54682.html" title="第109话"
		target="_blank">第109话</a></li>
	<li class="alter"><a href="/comic/1119/list_54538.html"
		title="第108话" target="_blank">第108话</a></li>
	<li class="alter"><a href="/comic/1119/list_54359.html"
		title="第107话" target="_blank">第107话</a></li>
	<li class="alter"><a href="/comic/1119/list_54216.html"
		title="第106话" target="_blank">第106话</a></li>
	<li><a href="/comic/1119/list_53916.html" title="第105话"
		target="_blank">第105话</a></li>
	<li><a href="/comic/1119/list_53752.html" title="第104话"
		target="_blank">第104话</a></li>
	<li><a href="/comic/1119/list_53560.html" title="第103话"
		target="_blank">第103话</a></li>
	<li class="alter"><a href="/comic/1119/list_53398.html"
		title="第102话" target="_blank">第102话</a></li>
	<li class="alter"><a href="/comic/1119/list_53041.html"
		title="第101话" target="_blank">第101话</a></li>
	<li class="alter"><a href="/comic/1119/list_52877.html"
		title="第100话" target="_blank">第100话</a></li>
	<li><a href="/comic/1119/list_52672.html" title="第99话"
		target="_blank">第99话</a></li>
	<li><a href="/comic/1119/list_52449.html" title="第98话"
		target="_blank">第98话</a></li>
	<li><a href="/comic/1119/list_52316.html" title="第97话"
		target="_blank">第97话</a></li>
	<li class="alter"><a href="/comic/1119/list_52177.html"
		title="第96话" target="_blank">第96话</a></li>
	<li class="alter"><a href="/comic/1119/list_52048.html"
		title="第95话" target="_blank">第95话</a></li>
	<li class="alter"><a href="/comic/1119/list_51959.html"
		title="第94话" target="_blank">第94话</a></li>
	<li><a href="/comic/1119/list_51805.html" title="第93话"
		target="_blank">第93话</a></li>
	<li><a href="/comic/1119/list_51658.html" title="第92话"
		target="_blank">第92话</a></li>
	<li><a href="/comic/1119/list_51642.html" title="番外篇5"
		target="_blank">番外篇5</a></li>
	<li class="alter"><a href="/comic/1119/list_51364.html"
		title="第91话" target="_blank">第91话</a></li>
	<li class="alter"><a href="/comic/1119/list_50933.html"
		title="第90话" target="_blank">第90话</a></li>
	<li class="alter"><a href="/comic/1119/list_50767.html"
		title="第89话" target="_blank">第89话</a></li>
	<li><a href="/comic/1119/list_50583.html" title="第88话"
		target="_blank">第88话</a></li>
	<li><a href="/comic/1119/list_50363.html" title="第87话"
		target="_blank">第87话</a></li>
	<li><a href="/comic/1119/list_50104.html" title="第86话"
		target="_blank">第86话</a></li>
	<li class="alter"><a href="/comic/1119/list_49898.html"
		title="第85话" target="_blank">第85话</a></li>
	<li class="alter"><a href="/comic/1119/list_49651.html"
		title="第84话" target="_blank">第84话</a></li>
	<li class="alter"><a href="/comic/1119/list_49424.html"
		title="第83话" target="_blank">第83话</a></li>
	<li><a href="/comic/1119/list_49261.html" title="第82话"
		target="_blank">第82话</a></li>
	<li><a href="/comic/1119/list_49123.html" title="第81话"
		target="_blank">第81话</a></li>
	<li><a href="/comic/1119/list_48980.html" title="第80话"
		target="_blank">第80话</a></li>
	<li class="alter"><a href="/comic/1119/list_48863.html"
		title="第79话" target="_blank">第79话</a></li>
	<li class="alter"><a href="/comic/1119/list_48695.html"
		title="第78话" target="_blank">第78话</a></li>
	<li class="alter"><a href="/comic/1119/list_48518.html"
		title="第77话" target="_blank">第77话</a></li>
	<li><a href="/comic/1119/list_48353.html" title="第76话"
		target="_blank">第76话</a></li>
	<li><a href="/comic/1119/list_48138.html" title="番外篇4"
		target="_blank">番外篇4</a></li>
	<li><a href="/comic/1119/list_48137.html" title="第75话"
		target="_blank">第75话</a></li>
	<li class="alter"><a href="/comic/1119/list_47867.html"
		title="第74话" target="_blank">第74话</a></li>
	<li class="alter"><a href="/comic/1119/list_47659.html"
		title="番外篇3" target="_blank">番外篇3</a></li>
	<li class="alter"><a href="/comic/1119/list_47591.html"
		title="第73话" target="_blank">第73话</a></li>
	<li><a href="/comic/1119/list_47196.html" title="第72话"
		target="_blank">第72话</a></li>
	<li><a href="/comic/1119/list_45919.html" title="第71话"
		target="_blank">第71话</a></li>
	<li><a href="/comic/1119/list_45532.html" title="第70话"
		target="_blank">第70话</a></li>
	<li class="alter"><a href="/comic/1119/list_45216.html"
		title="第69话" target="_blank">第69话</a></li>
	<li class="alter"><a href="/comic/1119/list_44944.html"
		title="第68话" target="_blank">第68话</a></li>
	<li class="alter"><a href="/comic/1119/list_44700.html"
		title="第67话" target="_blank">第67话</a></li>
	<li><a href="/comic/1119/list_44511.html" title="第66话"
		target="_blank">第66话</a></li>
	<li><a href="/comic/1119/list_44315.html" title="第65话"
		target="_blank">第65话</a></li>
	<li><a href="/comic/1119/list_44129.html" title="第64话"
		target="_blank">第64话</a></li>
	<li class="alter"><a href="/comic/1119/list_43863.html"
		title="第63话" target="_blank">第63话</a></li>
	<li class="alter"><a href="/comic/1119/list_43627.html"
		title="第62话" target="_blank">第62话</a></li>
	<li class="alter"><a href="/comic/1119/list_43395.html"
		title="第61话" target="_blank">第61话</a></li>
	<li><a href="/comic/1119/list_43220.html" title="第60话"
		target="_blank">第60话</a></li>
	<li><a href="/comic/1119/list_43051.html" title="第59话"
		target="_blank">第59话</a></li>
	<li><a href="/comic/1119/list_42663.html" title="第58话"
		target="_blank">第58话</a></li>
	<li class="alter"><a href="/comic/1119/list_42453.html"
		title="第57话" target="_blank">第57话</a></li>
	<li class="alter"><a href="/comic/1119/list_42255.html"
		title="第56话" target="_blank">第56话</a></li>
	<li class="alter"><a href="/comic/1119/list_42103.html"
		title="第55话" target="_blank">第55话</a></li>
	<li><a href="/comic/1119/list_41866.html" title="第54话"
		target="_blank">第54话</a></li>
	<li><a href="/comic/1119/list_41687.html" title="第53话"
		target="_blank">第53话</a></li>
	<li><a href="/comic/1119/list_41496.html" title="第52话"
		target="_blank">第52话</a></li>
	<li class="alter"><a href="/comic/1119/list_41222.html"
		title="第51话" target="_blank">第51话</a></li>
	<li class="alter"><a href="/comic/1119/list_41068.html"
		title="第50话" target="_blank">第50话</a></li>
	<li class="alter"><a href="/comic/1119/list_40867.html"
		title="第49话" target="_blank">第49话</a></li>
	<li><a href="/comic/1119/list_40784.html" title="第48话"
		target="_blank">第48话</a></li>
	<li><a href="/comic/1119/list_40621.html" title="第47话"
		target="_blank">第47话</a></li>
	<li><a href="/comic/1119/list_40493.html" title="第46话"
		target="_blank">第46话</a></li>
	<li class="alter"><a href="/comic/1119/list_40317.html"
		title="第45话" target="_blank">第45话</a></li>
	<li class="alter"><a href="/comic/1119/list_40155.html"
		title="第44话" target="_blank">第44话</a></li>
	<li class="alter"><a href="/comic/1119/list_40039.html"
		title="番外篇2" target="_blank">番外篇2</a></li>
	<li><a href="/comic/1119/list_39866.html" title="第43话"
		target="_blank">第43话</a></li>
	<li><a href="/comic/1119/list_39642.html" title="第42话"
		target="_blank">第42话</a></li>
	<li><a href="/comic/1119/list_39456.html" title="第41话"
		target="_blank">第41话</a></li>
	<li class="alter"><a href="/comic/1119/list_39273.html"
		title="第40话" target="_blank">第40话</a></li>
	<li class="alter"><a href="/comic/1119/list_39114.html"
		title="第39话" target="_blank">第39话</a></li>
	<li class="alter"><a href="/comic/1119/list_38928.html"
		title="第38话" target="_blank">第38话</a></li>
	<li><a href="/comic/1119/list_38795.html" title="第37话"
		target="_blank">第37话</a></li>
	<li><a href="/comic/1119/list_38642.html" title="第36话"
		target="_blank">第36话</a></li>
	<li><a href="/comic/1119/list_38494.html" title="第35话"
		target="_blank">第35话</a></li>
	<li class="alter"><a href="/comic/1119/list_38320.html"
		title="第34话" target="_blank">第34话</a></li>
	<li class="alter"><a href="/comic/1119/list_38125.html"
		title="第33话" target="_blank">第33话</a></li>
	<li class="alter"><a href="/comic/1119/list_37866.html"
		title="第32话" target="_blank">第32话</a></li>
	<li><a href="/comic/1119/list_37713.html" title="第31话"
		target="_blank">第31话</a></li>
	<li><a href="/comic/1119/list_37526.html" title="第30话"
		target="_blank">第30话</a></li>
	<li><a href="/comic/1119/list_37262.html" title="第29话"
		target="_blank">第29话</a></li>
	<li class="alter"><a href="/comic/1119/list_37104.html"
		title="第28话" target="_blank">第28话</a></li>
	<li class="alter"><a href="/comic/1119/list_36739.html"
		title="第27话" target="_blank">第27话</a></li>
	<li class="alter"><a href="/comic/1119/list_36481.html"
		title="第26话" target="_blank">第26话</a></li>
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
<div class="footer">恶魔奶爸漫画来自网友分享和上传，以供漫画爱好者研究恶魔奶爸漫画画法技巧和构图方式。若侵犯到您的权益，请立即<a
	target="_blank" class="red" href="/contact.html"><b>联系我们</b></a>删除。本站不负任何相关责任。
<br />
<script src="<?php echo $js_url;?>foot.js" language='JavaScript'></script>
<script src='<?php echo $js_url;?>icount.js' language='JavaScript' ></script></div>
</body>
</html>
