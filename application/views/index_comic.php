<div style="width: 980px; margin: 0 auto 2px; width: 980px; height: 26px;">
</div>
<div class="main">
</div>
<div class="main">
<div class="blank2 bookBG"></div>
<div class="bookBG1">
<div class="fl w220">
<h2 class="bar"><span><a href="/recent.html" class="red">>>更多</a>
</span><strong>最新更新漫画</strong></h2>
<ul class="newUpdate">
<?php foreach($newUpdateData['renew'] as $row){ ?>
<li><em class="red"><?php echo $row['rtime'];?></em>
<a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<div class="bt1px" style="background-color: #f0f0f0; margin: 1px;">
</div>
<h2 class="bar bt1px"><strong>最新添加的漫画</strong></h2>
<ul class="newUpdate">
<?php foreach($newUpdateData['newadd'] as $row){ ?>
<li><em class="red"><?php echo $row['rtime'];?></em><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>[<a class="green"
		href="<?php echo $row['volurl'];?>" target="_blank" title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
</div>
<div class="bookInfo pr">
<h2 class="bar"><strong class="position">您当前的位置 ：<em><a
	href="/">首页</a> >> <a href="/index/cate/<?php echo $comicinfo['cid'];?>/"><?php echo $channel[$comicinfo['cid']]['name'];?>漫画列表</a> >> <a
	href="/index/comic/<?php echo $comicinfo['id'];?>/"><?php echo $comicinfo['name'];?>漫画</a></em></strong></h2>
<div class="share"><!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><span
	class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a
	class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a>
<a class="bds_t163"></a> <a class="shareCount"></a></div>
<!-- Baidu Button END --></div>
<h1><?php echo $comicinfo['name'];?></h1>
<p class="bookAttr"><span>完结状态：[ <em><?php echo $comicinfo['status']?'完结':'连载';?></em> ]</span>原作者：<?php echo $comicinfo['author'];?> |
<?php if(0){ ?>字母索引：<a href="/comic/<?php echo $comicinfo['letter'];?>"><?php echo $comicinfo['letter'];?></a><?php } ?> | 加入时间：<?php echo $comicinfo['atime'];?> | 更新时间：<?php echo $comicinfo['rtime'];?></p>
<span class="blank6"></span>
<div class="bookMain">
<div class="bookIntro">
<div class="fr right-box">
</div>
<h2><?php echo $comicinfo['name'];?>漫画</h2>
<div class="intro">
<?php echo $comicinfo['detail'];?>
&nbsp;</p>
</div>
<div class="bookSimilar">
<h2>恶魔奶爸相关漫画</h2>
<ul>
<?php foreach($comicinfo['relate'] as $row){ ?>
	<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a></li>
<?php } ?>
</ul>
<div class="blank4"></div>
</div>
<div class="comment"><a href='#comment'>发表评论</a> &nbsp;<span>(评论并转发腾讯微薄亦有机会赢Q币)</span></div>
<div class="blank4"></div>
</div>
<div class="bookCover"><img
	src="<?php echo $comicinfo['cover'];;?>" alt="<?php echo $comicinfo['name'];?>漫画" /></div>
</div>
<div
	style="background-color: #FFFFFF; border-top: 1px solid #999999; clear: both;">
</div>
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
<?php foreach($comicinfo['vols'] as $row){ ?>
<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['name'];?>" target="_blank"><?php echo $row['name'];?></a></li>
<?php } ?>
</ul>
<div class="blank8"></div>
</div>
<div>
<div class="bg-sepr"></div>
<h2 class="bar"><strong><?php echo $comicinfo['name'];?>漫画评论</strong><a id="comment"></a></h2>
<div class="duoshuo">
<div class="ds-thread"></div>
</div>
</div>
</div>
<div class="blank2"></div>
</div>
<div class="blank2 bookBG2"></div>
</div>
<div class="blank4"></div>
