<div class="blank2 index_bg1"></div>
<div class="index_bg2">
<div class="indexLeft">
<div class="lr1px">
<div class="tabList" id="tabList">
<ul>
	<li class="on" onmouseover="changeTab(5,0)"><strong>热门连载漫画</strong>
	</li>
	<li onmouseover="changeTab(5,1)"><strong>经典完结漫画</strong></li>
	<li onmouseover="changeTab(5,2)"><strong>最新上架漫画</strong></li>
	<li onmouseover="changeTab(5,3)"><strong>全彩精选漫画</strong></li>
<?php if(1){?>
	<li class="end" onmouseover="changeTab(5,4);initGame();"><strong
		id="hk">热门网络游戏<em></em></strong></li>
<?php }?>
</ul>
</div>
<div class="blank8"></div>
<div class="comicList" id="comicList">
<ul style="display: block;">
<?php foreach($indexData['hotSerial'] as &$row){?>
	<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>">
<img src="<?php echo $row['cover'];?>" alt="<?php echo $row['name'];?>" /></a><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank"
		title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<ul>
<?php foreach($indexData['classicEnd'] as &$row){?>
	<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>">
<img src="<?php echo $row['cover'];?>" alt="<?php echo $row['name'];?>" /></a><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank"
		title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<ul>
<?php foreach($indexData['newGround'] as &$row){?>
	<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>">
<img src="<?php echo $row['cover'];?>" alt="<?php echo $row['name'];?>" /></a><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank"
		title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<ul>
<?php foreach($indexData['fullcolorChoice'] as &$row){?>
	<li><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>">
<img src="<?php echo $row['cover'];?>" alt="<?php echo $row['name'];?>" /></a><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank"
		title="<?php echo $row['volname'];?>"><?php echo $row['volname'];?></a>]</li>
<?php } ?>
</ul>
<ul>
	<div id="gamepage"><iframe width="100%" id="webgamepage"
		height="380" frameborder="0" scrolling="no" src="about:blank"></iframe></div>
</ul>
</div>
</div>
<div class="lineGray1" style="text-align: center; padding: 6px 0 2px;"><script
	language="javascript">show(1);</script></div>
<div class="blank4 index_bg4"></div>
<div class="index_bg5">
<div class="left" style="width: 146px;">
<div class="lr1px">
<h2 class="bar"><strong>漫画点击排行</strong></h2>
<ul class="topHits">
<?php foreach($indexData['hitsRank'] as $key=>&$row){ ?>
	<li><span class="t<?php echo $key+1;?>"><?php echo $key+1;?>.</span><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="blank8 lineGray"></div>
<div class="lr1px">
<h2 class="bar"><strong>新添漫画点击排行</strong></h2>
<ul class="topHits">
<?php foreach($indexData['newHitsRank'] as $key=>&$row){ ?>
	<li><span class="t<?php echo $key+1;?>"><?php echo $key+1;?>.</span><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="right" style="width: 591px;">
<div>
<div class="hotChapter">
<div style="border: 1px solid #FFFFFF;">
<h2><span><strong>火影忍者662</strong> + <strong>海贼王735</strong>
+ <strong>死神565</strong> 预计1月22日更新!</span> 热门漫画更新</h2>
<ul>
	<div class="blank2"></div>
	<li><strong><a href="/comic/54/" target="_blank">火影忍者漫画</a></strong><a
		href="/comic/54/huoyingrenzhe661.shtml" target="_blank">火影忍者661</a><a
		href="/comic/54/huoyingrenzhe660.shtml" target="_blank">火影忍者660</a><a
		href="/comic/54/huoyingrenzhe659.shtml" target="_blank">火影忍者659</a><a
		href="/comic/54/huoyingrenzhe658.shtml" target="_blank">火影忍者658</a><a
		href="/comic/54/huoyingrenzhe657.shtml" target="_blank">火影忍者657</a>
	<li><strong><a href="/comic/55/" target="_blank">海贼王漫画</a></strong><a
		href="/comic/55/haizeiwang734.shtml" target="_blank">海贼王734</a><a
		href="/comic/55/haizeiwang733.shtml" target="_blank">海贼王733</a><a
		href="/comic/55/haizeiwang732.shtml" target="_blank">海贼王732</a><a
		href="/comic/55/haizeiwang731.shtml" target="_blank">海贼王731</a><a
		href="/comic/55/haizeiwang730.shtml" target="_blank">海贼王730</a>
	<li class="end"><strong><a href="/comic/120/"
		target="_blank">死神漫画</a></strong><a href="/comic/120/sishen564.shtml"
		target="_blank">死神564</a><a href="/comic/120/sishen563.shtml"
		target="_blank">死神563</a><a href="/comic/120/sishen562.shtml"
		target="_blank">死神562</a><a href="/comic/120/sishen561.shtml"
		target="_blank">死神561</a><a href="/comic/120/sishen560.shtml"
		target="_blank">死神560</a></li>
</ul>
<div class="blank2"></div>
</div>
</div>
</div>
<?php foreach($indexColdBlock as $list){ ?>
<h2 class="sbar"><span><a href="javascript:void(0);" title="更多"><em>更多</em></a></span>
<strong>分类 <?php echo $list['start'],$list['end']? ' - '.$list['end'] : '';?></strong></h2>
<ul class="chrComicList">
<?php foreach($list['list'] as $val){ ?>
  <?php foreach($val as $v){ ?>
<li><a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a></li>
  <?php } ?>
<?php } ?>
</ul>
<span class="blank8"></span>
<div class="lineGray1"></div>
<?php } ?>
</div>
<div class="blank2"></div>
</div>
</div>
<div class="indexRight">
<div class="indexRightIn">
<div class="lr1px">
<h2 class="bar"><strong>热门漫画更新提醒-敬请留意</strong></h2>
<ul class="Advices">
	<li><a href="/comic/201/" target="_blank" title="妖精的尾巴368 1月24日更新"><b
		style="color: red">妖精的尾巴368 <span style="color: blue">1月24日更新</span></b></a></li>
	<li><a href="/comic/54/" target="_blank" title="火影忍者662 于1月22日更新"><b
		style="color: red">火影忍者662 <span style="color: blue">于1月22日更新</span></b></a></li>
	<li><a href="/comic/55/" target="_blank" title="海贼王735 预计1月22日更新"><b
		style="color: red">海贼王735 <span style="color: blue">预计1月22日更新</span></b></a></li>
	<li><a href="/comic/120/" target="_blank" title="死神565 预计1月22日更新"><b
		style="color: red">死神565 <span style="color: blue">预计1月22日更新</span></b></a></li>
	<li><a href="/comic/1067/" target="_blank"
		title="黑子的篮球246 1月22日更新"><b style="color: red">黑子的篮球246 <span
		style="color: blue">1月22日更新</span></b></a></li>
	<li class="dm"><a href='http://www.dm456.com/donghua/11/'
		target='_blank' title="火影忍者566"><strong>火影忍者566</strong>集 1月23日更新</a></li>
	<li class="dm"><a href='http://www.dm456.com/donghua/9/'
		target='_blank' title="海贼王628"><strong>海贼王628</strong>集 1月19日更新</a></li>
</ul>
<div
	style="width: 206px; margin: 0 auto; text-align: center; height: 32px;"><iframe
	marginwidth="0" marginheight="0" scrolling="no" framespacing="0"
	vspace="0" hspace="0" frameborder="0" width="100%" height="30"
	src="/v2.1/nmoneys/baidu/baidu_search.html?v=0719"></iframe></div>
</div>
<div class="blank8 lineGray"></div>
<div class="lr1px">
<h2 class="bar"><span><a href="/recent.html" class="red">>>更多</a>
</span><strong>最新更新漫画</strong></h2>
<ul class="newUpdate" style="padding-top: 0;">
<?php foreach($indexData['newRenew'] as &$row){ ?>
	<li><em class="red"><?php echo $row['rtime'];?></em><a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>[<a class="red" href="<?php echo $row['volurl'];?>" target="_blank" title="第<?php echo $row['vol'];?>话">第<?php echo $row['vol'];?>话</a>]</li>
<?php } ?>
</ul>
<div class="blank2"></div>
</div>
</div>
</div>
<div class="blank4 index_bg3"></div>
</div>
</div>
