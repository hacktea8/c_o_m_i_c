<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $comicinfo['title'],' - ',$web_title;?></title>
<link href="<?php echo $css_url;?>detail.min.css?v=<?php echo $version;?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">var cInfo={"cid":<?php echo $comicinfo['volinfo']['vid'];?>,"cname":"\u7b2c\u0035\u0033\u8bdd","burl":"/pages/vol/<?php echo $comicinfo['cid'];?>/<?php echo $comicinfo['volinfo']['vid'];?>","files":[<?php echo $comicinfo['volinfo']['pagesetimg'];?>],"bid":<?php echo $comicinfo['cid'];?>,"len":<?php echo $comicinfo['volinfo']['pagesize'];?>,"bname":"\u8fdb\u51fb\u7684\u5de8\u4eba","finished":0};</script>
<script src="<?php echo $js_url;?>configs.js?v=<?php echo $version;?>"></script>
<!--[if IE 6]> <script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);</script> <![endif]-->
</head>
<body>
<div class="nav">
<div class="w980 pr">
<div class="main-nav"><a href="/" title="返回首页" class="logo"></a><a
	href="/recent.html" class="pr new-update">最新更新<i></i></a><a
	href="/all.html">所有漫画</a><a href="/wanjie.html">完结</a><a
	href="/lianzai.html">连载</a><a href="/top.html">风云榜</a><a
	href="/comic/japan/">日本漫画</a></div>
<div class="more pr" id="sub-nav"><strong>更多类别</strong><i></i>
<div class="content shadow sub-nav">
<ul>
	<li><a href="/comic/japan/">日本漫画</a></li>
	<li><a href="/comic/dalu/">大陆漫画</a></li>
	<li><a href="/comic/hk/">港台漫画</a></li>
	<li><a href="/comic/oumei/">欧美漫画</a></li>
	<li><a href="/comic/shaonian/">少年热血</a></li>
	<li><a href="/comic/wuxia/">武侠格斗</a></li>
	<li><a href="/comic/kehuan/">科幻魔幻</a></li>
	<li><a href="/comic/tiyu/">竞技体育</a></li>
	<li><a href="/comic/xiju/">爆笑喜剧</a></li>
	<li><a href="/comic/tuili/">侦探推理</a></li>
	<li><a href="/comic/kongbu/">恐怖灵异</a></li>
	<li><a href="/top.html">风云榜</a></li>
</ul>
</div>
</div>
<div class="more pr" id="history"><strong>我的浏览记录</strong><i></i>
<div class="content shadow" id="hList"><span class="hNone">loading...</span></div>
</div>
<div class="menu-end"></div>
<div class="search pa"><input id="txtKey" value="" />
<button id="btnSend">搜索</button>
<div id="sList" class="sList shadow"></div>
</div>
</div>
</div>
<div class="w980 imh-vvv" id="imh-0"></div>
<div class="title w980" id="title">
<div class="page-number fr">第<strong id="pageCurrent"></strong>页 /
共<strong><?php echo $comicinfo['volinfo']['pagesize'];?></strong>页</div>
<h1><a href="/comic/<?php echo $comicinfo['cid'];?>/" title="<?php echo $comicinfo['name'];?>"><?php echo $comicinfo['name'];?></a></h1>
<em>-</em>
<h2><?php echo $comicinfo['volinfo']['name'];?></h2>
</div>
<div class="w980 tc" style="padding: 10px 0 0;">
<div class="main-btn"><a href="/comic/<?php echo $comicinfo['cid'];?>/" id="viewList"
	class="btn-red">目录列表</a> <a href="javascript:;" class="prevC btn-red">上一章</a>
<a href="javascript:;" id="prev" class="prevP btn-red">上一页</a> <select
	id="pageSelect"
	onchange="location.href= cInfo.burl+'?p='+this.options[this.selectedIndex].value">
<?php for($i = 1;$i <= $comicinfo['volinfo']['pagesize']; $i++){ ?>
	<option value="<?php echo $i;?>">第<?php echo $i;?>页</option>
<?php } ?>
</select> <a href="javascript:;" id="next" class="nextP btn-red">下一页</a> <a
	href="javascript:;" class="nextC btn-red">下一章</a> <a
	href="/comic/<?php echo $comicinfo['cid'];?>/" class="btn-red">返回目录</a></div>
</div>
<div class="tip" id="tips"><span class="fr"> <a
	href="javascript:;" id="mouseAct" class="mouseAct"
	title="选中此项，鼠标单击进行翻页。&#10;左键下一页，右键上一页，图片不可拖拽移动。&#10;-----------------&#10;不选此项，鼠标双击进行翻页。&#10;双击左键进入下一页，图片可以拖拽移动。">鼠标单击翻页，试试吧。</a>
</span> 提示：（键盘右键→）下一页，（键盘左键←）上一页，（键盘Z）上一章，（键盘X）下一章，（键盘F11）全屏浏览，（Ctrl+D）收藏本页。</div>
<div class="cf mtb4">
<table border="0" cellspacing="0" cellpadding="0" class="pr main"
	id="mainTable">
	<tr>
		<td align="center" class="main-left" id="mainLeft">
		<div class="img-load" id="imgLoad">图片正在载入中，请稍后....</div>
		<div class="img-load-mask" id="imgLoadMask"></div>
		<div class="main-fold" id="mainFold"><a href="javascript:;"
			title="收起更多" id="foldAct">收起更多</a></div>
		</td>
		<td align="center" valign="top" class="main-right" id="mainRight">
		<h6 style="margin-top: -4px;">更换背景颜色</h6>
		<div class="cf skin-list" id="skinList">
		<ul>
			<li data-skin="0" class="skin-white"><a href="javascript:;"
				title="白色"><span>白色</span><i></i></a></li>
			<li data-skin="1" class="skin-black"><a href="javascript:;"
				title="黑色"><span>黑色</span><i></i></a></li>
			<li data-skin="2" class="skin-blue"><a href="javascript:;"
				title="蓝色"><span>蓝色</span><i></i></a></li>
			<li data-skin="3" class="skin-green"><a href="javascript:;"
				title="绿色"><span>绿色</span><i></i></a></li>
			<li data-skin="4" class="skin-pink"><a href="javascript:;"
				title="粉红"><span>粉红</span><i></i></a></li>
			<li data-skin="5" class="skin-orange"><a href="javascript:;"
				title="橙色"><span>橙色</span><i></i></a></li>
			<li data-skin="6" class="skin-purple"><a href="javascript:;"
				title="紫色"><span>紫色</span><i></i></a></li>
		</ul>
		</div>
		<h6>服务器节点切换</h6>
		<div class="host-list" id="hostList"></div>
		<h6>和朋友一起分享吧</h6>
		<div class="share" id="share"></div>
		<div id="optimus" class="cf"></div>
		</td>
	</tr>
</table>
</div>
<div class="w980 imh-vvv" id="imh-1"></div>
<div class="w980 tc">
<div class="pager" id="pagination"></div>
</div>
<div class="w980 imh-vvv" id="imh-2"></div>
<div class="w980"
	style="margin-top: 10px; height: 514px; overflow: hidden;">
<div class="fr" style="width: 250px; height: 514px;">
<div class="imh-vvv" id="imh-3"></div>
<div class="imh-vvv" id="imh-4"></div>
</div>
<div style="width: 720px;">
<div class="bar"><span style="padding-right: 10px;"><a
	href="/recent.html">更多更新</a></span>
<h3><strong>最新漫画更新列表</strong></h3>
</div>
<div class="update" id="uptList">
<div class="loading"></div>
</div>
</div>
</div>
<div class="sidebar" id="sidebar">
<ul>
	<li class="toTop" id="toTop" style="display: none;"><a
		href="javascript:;"> <span>回到顶部</span> <i></i> </a></li>
	<li class="toFav"><a href="javascript:;" id="toFav"> <span>加入收藏</span>
	<i></i> </a></li>
	<li class="toFeedback"><a href="javascript:;" id="toFeedback">
	<span>报错举报</span> <i></i> </a></li>
	<li class="toHelp"><a href="/help/" target="_blank"> <span>查看帮助</span>
	<i></i> </a></li>
</ul>
</div>
<script type="text/javascript" src="<?php echo $js_url;?>jquery.js"></script>
<script type="text/javascript" src="<?php echo $js_url;?>main.min.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $js_url;?>chapter.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=12103"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript" defer="defer">document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000);</script>
<div id="bd_160x600"><script type="text/javascript">var cpro_id = "u1406893";</script>
</div>
<div class="footer">
<div class="footer-main">
<div class="w980 tc"><script charset="utf-8" type="text/javascript" src="<?php echo $js_url;?>foot_chapter.js"></script></div>
</div>
</div>
</body>
</html>
