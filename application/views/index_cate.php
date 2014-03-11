<div class="main">
<div style="border: 1px solid #999; border-bottom: none;">
<h2 class="bar"><strong class="position"><span id="fav"><script
	language="javascript">toFav();</script><a class="baiduFav"
	href="javascript:window.open('http://cang.baidu.com/do/add?it='+encodeURIComponent(document.title.substring(0,76))+'&iu='+encodeURIComponent(location.href)+'&fr=ien#nw=1','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes');void(0)"
	title="添加到百度搜藏"><span>添加到百度搜藏</span></a> <a class="qqFav"
	href="javascript:window.open('http://shuqian.qq.com/post?title='+encodeURIComponent(document.title)+'&uri='+encodeURIComponent(document.location.href)+'&jumpback=2&noui=1','favit','width=960,height=600,left=50,top=50,toolbar=no,menubar=no,location=no,scrollbars=yes,status=yes,resizable=yes');void(0)"
	title="收藏到QQ书签"><span>收藏到QQ书签</span></a> </span>您当前的位置 ：<em><a href="/">爱漫画首页</a>
&gt;&gt; <a href="/comic/shaonian/">少年热血漫画</a></em></strong></h2>
</div>
<div class="blank8"></div>
<div class="leftPart">
<h2 class="bar"><strong><?php echo $channel[$cid]['name'];?>排行</strong></h2>
<ul class="topHits">
<?php foreach($cateTopData['hitsRank'] as $key => &$row){ ?>
<li><span class="t1"><?php echo $key+1;?>.</span><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="middlePart">
<div class="lr1px">
<div class="tabList" id="tabList">
<ul>
<li class="on" onmouseover="changeTab(2,0)"><strong>热门连载<?php echo $channel[$cid]['name'];?>漫画</strong></li>
<li class="end" onmouseover="changeTab(2,1)"><strong>经典完结<?php echo $channel[$cid]['name'];?>漫画</strong></li>
</ul>
</div>
<div class="blank8"></div>
<div class="comicList" id="comicList">
<ul style="display: block;">
<?php foreach($cateTopData['hotSerial'] as &$row){ ?>
<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><img src="<?php echo $row['cover'];?>" alt="<?php echo $row['title'];?>"></a>
<a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<ul style="display: none;">
<?php foreach($cateTopData['classicEnd'] as &$row){ ?>
<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><img src="<?php echo $row['cover'];?>" alt="<?php echo $row['title'];?>"></a>
<a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
</div>
</div>
</div>
<div class="rightPart">
<h2 class="bar"><span><a href="/recent.html" class="red">&gt;&gt;更多</a></span><strong><?php echo $channel[$cid]['name'];?>最近更新</strong></h2>
<ul class="newUpdate">
<?php foreach($cateTopData['newRenew'] as &$row){ ?>
<li><em class="red"><?php echo $row['rtime'];?></em>
<a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
</div>
</div>
<div class="blank8"></div>
<div class="main" style="height: 90px; overflow: hidden; text-align: center; background-color: #f0f0f0;">
</div>
<div class="blank8"></div>
<div class="main">
<div style="border: 1px solid #999999;">
<h2 class="bar"><span class="orderNav"><em>排序：</em> <a
	href="index.html#best" title="添加时间" class="on">添加时间</a> | <a
	href="update.html#best" title="更新时间">更新时间</a> | <a
	href="view.html#best" title="点击次数">点击次数</a></span><strong><a
	name="best" id="best"></a><?php echo $channel[$cid]['name'];?>漫画</strong></h2>
<div class="blank8"></div>
<div class="pagerFoot">
<?php echo $page_string;?>
</div>
<div class="blank4"></div>
<ul class="bookList">
<?php foreach($lists as &$row){ ?>
<li><a title="<?php echo $row['title'];?>" href="<?php echo $row['url'];?>" target="_blank">
<img alt="<?php echo $row['title'];?>" src="<?php echo $row['cover'];?>"><?php echo $row['title'];?></a><em>
「更新到：<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="最近更新时间:<?php echo $row['rtime'];?>"><?php echo $row['volname'];?></a> 」</em></li>
<?php } ?>
</ul>
<div class="blank4"></div>
<div class="pagerFoot">
<?php echo $page_string;?>
</div>
<div class="blank4"></div>
</div>
</div>
