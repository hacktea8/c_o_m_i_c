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
<h2 class="sbar"><span><a href="/all.html#a" title="更多"><em>更多</em></a></span>
<strong>字母 A - D</strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/1099/" target="_blank" title="爱我">爱我</a></li>
	<li><a href="/comic/1324/" target="_blank" title="暗之末裔">暗之末裔</a></li>
	<li><a href="/comic/613/" target="_blank" title="Amatsuki雨月">Amatsuki雨月</a></li>
	<li><a href="/comic/3125/" target="_blank" title="AKB0048">AKB0048</a></li>
	<li><a href="/comic/3704/" target="_blank" title="AKB48杀人事件">AKB48杀人事件</a></li>
	<li><a href="/comic/1809/" target="_blank" title="奥特曼STORY0">奥特曼STORY0</a></li>
	<li><a href="/comic/170/" target="_blank" title="爱丽丝学院">爱丽丝学院</a></li>
	<li><a href="/comic/3683/" target="_blank" title="暗杀教室">暗杀教室</a></li>
	<li><a href="/comic/3401/" target="_blank" title="Area D异能领域">Area
	D异能领域</a></li>
	<li><a href="/comic/1991/" target="_blank" title="AKB49">AKB49</a></li>
	<li><a href="/comic/4376/" target="_blank" title="白雪公主与7个囚犯">白雪公主与7个囚犯</a></li>
	<li><a href="/comic/1336/" target="_blank" title="笨蛋测验召唤兽">笨蛋测验召唤兽</a></li>
	<li><a href="/comic/1396/" target="_blank" title="白兔糖">白兔糖</a></li>
	<li><a href="/comic/1183/" target="_blank" title="变形金刚-威震天万岁">变形金刚-威震天万岁</a></li>
	<li><a href="/comic/10/" target="_blank" title="B'tX钢铁神兵">B'tX钢铁神兵</a></li>
	<li><a href="/comic/4191/" target="_blank" title="笨女孩">笨女孩</a></li>
	<li><a href="/comic/189/" target="_blank" title="北斗神拳">北斗神拳</a></li>
	<li><a href="/comic/2875/" target="_blank" title="蝙蝠侠与罗宾">蝙蝠侠与罗宾</a></li>
	<li><a href="/comic/12/" target="_blank" title="棒球大联盟">棒球大联盟</a></li>
	<li><a href="/comic/4906/" target="_blank" title="飙速宅男">飙速宅男</a></li>
	<li><a href="/comic/2311/" target="_blank" title="诚如神之所说">诚如神之所说</a></li>
	<li><a href="/comic/2320/" target="_blank" title="苍蓝钢铁的琶音">苍蓝钢铁的琶音</a></li>
	<li><a href="/comic/3179/" target="_blank"
		title="噬神者the 2nd break">噬神者the 2nd break</a></li>
	<li><a href="/comic/1034/" target="_blank" title="超智游戏">超智游戏</a></li>
	<li><a href="/comic/1330/" target="_blank" title="裁断分离之罪恶剪刀">裁断分离之罪恶剪刀</a></li>
	<li><a href="/comic/1559/" target="_blank" title="春秋战雄">春秋战雄</a></li>
	<li><a href="/comic/257/" target="_blank" title="创世神兵">创世神兵</a></li>
	<li><a href="/comic/2250/" target="_blank" title="虫奉行">虫奉行</a></li>
	<li><a href="/comic/754/" target="_blank" title="CODE BREAKER">CODE
	BREAKER</a></li>
	<li><a href="/comic/3397/" target="_blank" title="超能力者齐木楠雄的灾难">超能力者齐木楠雄的灾难</a></li>
	<li><a href="/comic/356/" target="_blank" title="第一神拳">第一神拳</a></li>
	<li><a href="/comic/3216/" target="_blank" title="电波教师">电波教师</a></li>
	<li><a href="/comic/3793/" target="_blank" title="地球末日">地球末日</a></li>
	<li><a href="/comic/1081/" target="_blank" title="东方八犬异闻">东方八犬异闻</a></li>
	<li><a href="/comic/2066/" target="_blank" title="刀剑神域">刀剑神域</a></li>
	<li><a href="/comic/25/" target="_blank" title="D格雷少年">D格雷少年</a></li>
	<li><a href="/comic/3757/" target="_blank" title="刀剑神域fairy dance">刀剑神域fairy
	dance</a></li>
	<li><a href="/comic/30/" target="_blank" title="大唐双龙传">大唐双龙传</a></li>
	<li><a href="/comic/3845/" target="_blank" title="盗墓者">盗墓者</a></li>
	<li><a href="/comic/1800/" target="_blank" title="火云邪神2">火云邪神2</a></li>
</ul>
<span class="blank8"></span>
<div class="lineGray1"></div>
<h2 class="sbar"><span><a href="/all.html#e" title="更多"><em>更多</em></a></span>
<strong>字母 E - H</strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/1119/" target="_blank" title="恶魔奶爸">恶魔奶爸</a></li>
	<li><a href="/comic/2761/" target="_blank" title="恶魔幸存者2">恶魔幸存者2</a></li>
	<li><a href="/comic/4087/" target="_blank" title="俄女杀手阿留沙">俄女杀手阿留沙</a></li>
	<li><a href="/comic/3243/" target="_blank" title="EverGreen">EverGreen</a></li>
	<li><a href="/comic/2039/" target="_blank" title="Enigma谜">Enigma谜</a></li>
	<li><a href="/comic/1567/" target="_blank" title="EIGHTH">EIGHTH</a></li>
	<li><a href="/comic/1295/" target="_blank" title="恶魔辩护">恶魔辩护</a></li>
	<li><a href="/comic/2193/" target="_blank" title="恶之华">恶之华</a></li>
	<li><a href="/comic/2335/" target="_blank" title="恶魔偶像">恶魔偶像</a></li>
	<li><a href="/comic/3812/" target="_blank" title="恶灵猎人">恶灵猎人</a></li>
	<li><a href="/comic/1484/" target="_blank" title="绯弹的亚里亚">绯弹的亚里亚</a></li>
	<li><a href="/comic/44/" target="_blank" title="Fate stay night">Fate
	stay night</a></li>
	<li><a href="/comic/3462/" target="_blank" title="蜂蜜恋爱">蜂蜜恋爱</a></li>
	<li><a href="/comic/347/" target="_blank" title="封神演义">封神演义</a></li>
	<li><a href="/comic/4209/" target="_blank" title="复仇者V5">复仇者V5</a></li>
	<li><a href="/comic/1740/" target="_blank" title="拂晓的尤娜">拂晓的尤娜</a></li>
	<li><a href="/comic/195/" target="_blank" title="风云第三部">风云第三部</a></li>
	<li><a href="/comic/4036/" target="_blank" title="封神纪III">封神纪III</a></li>
	<li><a href="/comic/193/" target="_blank" title="风云第二部">风云第二部</a></li>
	<li><a href="/comic/2467/" target="_blank" title="封神纪II">封神纪II</a></li>
	<li><a href="/comic/1562/" target="_blank" title="GE Good Ending">GE
	Good Ending</a></li>
	<li><a href="/comic/176/" target="_blank" title="光速蒙面侠21">光速蒙面侠21</a></li>
	<li><a href="/comic/1980/" target="_blank" title="灌篮高手全国大赛篇">灌篮高手全国大赛篇</a></li>
	<li><a href="/comic/46/" target="_blank" title="灌篮高手">灌篮高手</a></li>
	<li><a href="/comic/833/" target="_blank" title="革神语">革神语</a></li>
	<li><a href="/comic/188/" target="_blank" title="GTO麻辣教师">GTO麻辣教师</a>/li>
	<li><a href="/comic/523/" target="_blank" title="怪物猎人">怪物猎人</a></li>
	<li><a href="/comic/1985/" target="_blank" title="功夫">功夫</a></li>
	<li><a href="/comic/471/" target="_blank" title="怪物王女">怪物王女</a></li>
	<li><a href="/comic/196/" target="_blank" title="鬼吹灯漫画">鬼吹灯漫画</a></li>
	<li><a href="/comic/54/" target="_blank" title="火影忍者">火影忍者</a></li>
	<li><a href="/comic/55/" target="_blank" title="海贼王">海贼王</a></li>
	<li><a href="/comic/426/" target="_blank" title="会长是女仆大人">会长是女仆大人</a></li>
	<li><a href="/comic/4106/" target="_blank" title="Hungry Joker">Hungry
	Joker</a></li>
	<li><a href="/comic/2153/" target="_blank" title="海月姬">海月姬</a></li>
	<li><a href="/comic/3455/" target="_blank" title="黄昏少女X失忆幽灵">黄昏少女X失忆幽灵</a></li>
	<li><a href="/comic/2857/" target="_blank" title="红心王子">红心王子</a></li>
	<li><a href="/comic/504/" target="_blank" title="红Kure-Nai">红Kure-Nai</a></li>
	<li><a href="/comic/2724/" target="_blank" title="红发的白雪公主">红发的白雪公主</a></li>
	<li><a href="/comic/1067/" target="_blank" title="黑子的篮球">黑子的篮球</a></li>
</ul>
<div class="blank8"></div>
<div class="lineGray1"></div>
<h2 class="sbar"><span><a href="/all.html#i" title="更多"><em>更多</em></a></span>
<strong>字母 I - L</strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/2497/" target="_blank" title="IRIS ZERO">IRIS
	ZERO</a></li>
	<li><a href="/comic/1848/" target="_blank" title="ISUCA">ISUCA</a></li>
	<li><a href="/comic/1974/" target="_blank" title="I">I</a></li>
	<li><a href="/comic/4586/" target="_blank" title="Inferno">Inferno</a></li>
	<li><a href="/comic/4519/" target="_blank"
		title="Infinite Stratos">Infinite Stratos</a></li>
	<li><a href="/comic/3873/" target="_blank" title="IPPO">IPPO</a></li>
	<li><a href="/comic/3915/" target="_blank" title="in the rocker">in
	the rocker</a></li>
	<li><a href="/comic/4822/" target="_blank" title="Innocents少年十字军">Innocents少年十字军</a></li>
	<li><a href="/comic/1078/" target="_blank" title="ILEGENES黑耀的轨迹">ILEGENES黑耀的轨迹</a></li>
	<li><a href="/comic/1720/" target="_blank" title="Inferno地狱">Inferno地狱</a></li>
	<li><a href="/comic/140/" target="_blank" title="进击的巨人">进击的巨人</a></li>
	<li><a href="/comic/2948/" target="_blank" title="九龙城寨2">九龙城寨2</a></li>
	<li><a href="/comic/1129/" target="_blank" title="寂静岭">寂静岭</a></li>
	<li><a href="/comic/1150/" target="_blank" title="街霸4">街霸4</a></li>
	<li><a href="/comic/69/" target="_blank" title="结界师">结界师</a></li>
	<li><a href="/comic/1204/" target="_blank" title="寄生兽">寄生兽</a></li>
	<li><a href="/comic/2157/" target="_blank" title="九龙城寨">九龙城寨</a></li>
	<li><a href="/comic/355/" target="_blank" title="街霸3">街霸3</a></li>
	<li><a href="/comic/1334/" target="_blank" title="剑魂">剑魂</a></li>
	<li><a href="/comic/274/" target="_blank" title="JOJO奇妙冒险">JOJO奇妙冒险</a></li>
	<li><a href="/comic/675/" target="_blank" title="卡卡西外传">卡卡西外传</a></li>
	<li><a href="/comic/1120/" target="_blank" title="K-ON!">K-ON!</a></li>
	<li><a href="/comic/73/" target="_blank" title="魁！天兵高校">魁！天兵高校</a></li>
	<li><a href="/comic/1497/" target="_blank" title="KARNEVAL狂欢节">KARNEVAL狂欢节</a></li>
	<li><a href="/comic/3627/" target="_blank" title="堀与宫村">堀与宫村</a></li>
	<li><a href="/comic/991/" target="_blank" title="肯普法">肯普法</a></li>
	<li><a href="/comic/75/" target="_blank" title="恐怖宠物店">恐怖宠物店</a></li>
	<li><a href="/comic/3626/" target="_blank" title="K红之记忆">K红之记忆</a></li>
	<li><a href="/comic/1523/" target="_blank" title="空之轨迹">空之轨迹</a></li>
	<li><a href="/comic/2343/" target="_blank" title="K-ON！大学篇">K-ON！大学篇</a></li>
	<li><a href="/comic/77/" target="_blank" title="龙狼传">龙狼传</a></li>
	<li><a href="/comic/269/" target="_blank" title="浪客行">浪客行</a></li>
	<li><a href="/comic/1309/" target="_blank" title="篮球救世主">篮球救世主</a></li>
	<li><a href="/comic/79/" target="_blank" title="烙印战士">烙印战士</a></li>
	<li><a href="/comic/1415/" target="_blank" title="龙珠超次元乱战">龙珠超次元乱战</a></li>
	<li><a href="/comic/1426/" target="_blank" title="龙珠AF">龙珠AF</a></li>
	<li><a href="/comic/1388/" target="_blank" title="蓝色驱魔师">蓝色驱魔师</a></li>
	<li><a href="/comic/3951/" target="_blank" title="龙神">龙神</a></li>
	<li><a href="/comic/168/" target="_blank" title="蓝兰岛漂流记">蓝兰岛漂流记</a></li>
	<li><a href="/comic/275/" target="_blank" title="浪客剑心">浪客剑心</a></li>
</ul>
<div class="blank8"></div>
<div class="lineGray1"></div>
<h2 class="sbar"><span><a href="/all.html#m" title="更多"><em>更多</em></a></span>
<strong>字母 M - P </strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/1832/" target="_blank" title="魔笛MAGI">魔笛MAGI</a></li>
	<li><a href="/comic/584/" target="_blank" title="美食的俘虏">美食的俘虏</a></li>
	<li><a href="/comic/4035/" target="_blank" title="魅影陌客">魅影陌客</a></li>
	<li><a href="/comic/177/" target="_blank" title="名侦探柯南">名侦探柯南</a></li>
	<li><a href="/comic/1964/" target="_blank" title="魔界王子">魔界王子</a></li>
	<li><a href="/comic/479/" target="_blank" title="某科学的超电磁炮">某科学的超电磁炮</a></li>
	<li><a href="/comic/85/" target="_blank" title="魔法老师">魔法老师</a></li>
	<li><a href="/comic/2370/" target="_blank" title="冥王神话外传">冥王神话外传</a></li>
	<li><a href="/comic/3108/" target="_blank" title="魔法科高校的劣等生">魔法科高校的劣等生</a></li>
	<li><a href="/comic/3639/" target="_blank" title="冥王神话星座篇">冥王神话星座篇</a></li>
	<li><a href="/comic/169/" target="_blank" title="尼罗河女儿">尼罗河女儿</a></li>
	<li><a href="/comic/92/" target="_blank" title="NANA">NANA</a></li>
	<li><a href="/comic/1778/" target="_blank" title="逆转监督">逆转监督</a></li>
	<li><a href="/comic/2304/" target="_blank" title="男子高中生的日常">男子高中生的日常</a></li>
	<li><a href="/comic/4135/" target="_blank" title="那年那兔那些事儿">那年那兔那些事儿</a></li>
	<li><a href="/comic/2254/" target="_blank" title="NO.6">NO.6</a></li>
	<li><a href="/comic/1537/" target="_blank" title="女儿国传奇">女儿国传奇</a></li>
	<li><a href="/comic/630/" target="_blank" title="Nononono">Nononono</a></li>
	<li><a href="/comic/432/" target="_blank" title="南家三姊妹">南家三姊妹</a></li>
	<li><a href="/comic/3349/" target="_blank" title="女主角失格">女主角失格</a></li>
	<li><a href="/comic/4324/" target="_blank" title="奥创纪元">奥创纪元</a></li>
	<li><a href="/comic/4137/" target="_blank" title="Oh,My浪漫九尾狐">Oh,My浪漫九尾狐</a></li>
	<li><a href="/comic/4129/" target="_blank" title="奥特战士银河大战争">奥特战士银河大战争</a></li>
	<li><a href="/comic/2460/" target="_blank" title="奥特曼超斗士激传">奥特曼超斗士激传</a></li>
	<li><a href="/comic/3772/" target="_blank" title="OH MY GOD DAYS">OH
	MY GOD DAYS</a></li>
	<li><a href="/comic/3351/" target="_blank" title="Orange">Orange</a></li>
	<li><a href="/comic/1690/" target="_blank" title="奥林匹斯">奥林匹斯</a></li>
	<li><a href="/comic/2133/" target="_blank" title="偶像A">偶像A</a></li>
	<li><a href="/comic/3677/" target="_blank" title="奧茲仙境">奧茲仙境</a></li>
	<li><a href="/comic/1181/" target="_blank" title="ONLY YOU">ONLY
	YOU</a></li>
	<li><a href="/comic/107/" target="_blank" title="漂流教室（恐怖）">漂流教室（恐怖）</a></li>
	<li><a href="/comic/846/" target="_blank" title="贫乏神来了">贫乏神来了</a></li>
	<li><a href="/comic/948/" target="_blank" title="泡沫之夏">泡沫之夏</a></li>
	<li><a href="/comic/341/" target="_blank" title="PSYREN">PSYREN</a></li>
	<li><a href="/comic/3303/" target="_blank" title="排球">排球</a></li>
	<li><a href="/comic/4645/" target="_blank" title="破坏兽">破坏兽</a></li>
	<li><a href="/comic/4754/" target="_blank" title="PUPA">PUPA</a></li>
	<li><a href="/comic/441/" target="_blank" title="叛逆的鲁鲁修">叛逆的鲁鲁修</a></li>
	<li><a href="/comic/1253/" target="_blank" title="漂泊者">漂泊者</a></li>
	<li><a href="/comic/4403/" target="_blank" title="朋友以上恋人未满">朋友以上恋人未满</a></li>
</ul>
<div class="blank8"></div>
<div class="lineGray1"></div>
<h2 class="sbar"><span><a href="/all.html#q" title="更多"><em>更多</em></a></span>
<strong>字母 Q - V </strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/76/" target="_blank" title="全职猎人">全职猎人</a></li>
	<li><a href="/comic/3281/" target="_blank" title="拳皇98彩色完全版">拳皇98彩色完全版</a></li>
	<li><a href="/comic/187/" target="_blank" title="强殖装甲凯普">强殖装甲凯普</a></li>
	<li><a href="/comic/111/" target="_blank" title="犬夜叉">犬夜叉</a></li>
	<li><a href="/comic/200/" target="_blank" title="欺诈游戏">欺诈游戏</a></li>
	<li><a href="/comic/3280/" target="_blank" title="拳皇97彩色完全版">拳皇97彩色完全版</a></li>
	<li><a href="/comic/4242/" target="_blank" title="七原罪">七原罪</a></li>
	<li><a href="/comic/2247/" target="_blank" title="请叫我英雄">请叫我英雄</a></li>
	<li><a href="/comic/110/" target="_blank" title="棋魂">棋魂</a></li>
	<li><a href="/comic/214/" target="_blank" title="拳皇97">拳皇97</a></li>
	<li><a href="/comic/247/" target="_blank" title="热血江湖">热血江湖</a></li>
	<li><a href="/comic/1271/" target="_blank" title="热血高校">热血高校</a></li>
	<li><a href="/comic/1570/" target="_blank" title="热血高校3">热血高校3</a></li>
	<li><a href="/comic/3973/" target="_blank" title="人渣的本愿">人渣的本愿</a></li>
	<li><a href="/comic/2181/" target="_blank" title="热血高校前传">热血高校前传</a></li>
	<li><a href="/comic/1147/" target="_blank" title="刃牙3">刃牙3</a></li>
	<li><a href="/comic/335/" target="_blank" title="Rave圣石小子">Rave圣石小子</a></li>
	<li><a href="/comic/3178/" target="_blank" title="如果这叫做恋爱">如果这叫做恋爱</a></li>
	<li><a href="/comic/3661/" target="_blank" title="热血高校2">热血高校2</a></li>
	<li><a href="/comic/3220/" target="_blank" title="REALPG">REALPG</a></li>
	<li><a href="/comic/120/" target="_blank" title="死神">死神</a></li>
	<li><a href="/comic/250/" target="_blank" title="守护甜心">守护甜心</a></li>
	<li><a href="/comic/330/" target="_blank" title="四大名捕">四大名捕</a></li>
	<li><a href="/comic/3628/" target="_blank" title="石黑龙传">石黑龙传</a></li>
	<li><a href="/comic/1328/" target="_blank" title="少林寺第8铜人">少林寺第8铜人</a></li>
	<li><a href="/comic/676/" target="_blank" title="神掌龙剑飞">神掌龙剑飞</a></li>
	<li><a href="/comic/442/" target="_blank" title="神兵4">神兵4</a></li>
	<li><a href="/comic/183/" target="_blank" title="圣斗士-冥王神话">圣斗士-冥王神话</a></li>
	<li><a href="/comic/310/" target="_blank" title="神兵玄奇 I">神兵玄奇
	I</a></li>
	<li><a href="/comic/3658/" target="_blank" title="守望者前传">守望者前传</a></li>
	<li><a href="/comic/1433/" target="_blank" title="逃离伊甸园">逃离伊甸园</a></li>
	<li><a href="/comic/3386/" target="_blank" title="天子传奇8">天子传奇8</a></li>
	<li><a href="/comic/1915/" target="_blank" title="天子传奇7">天子传奇7</a></li>
	<li><a href="/comic/276/" target="_blank" title="天子传奇6">天子传奇6</a></li>
	<li><a href="/comic/282/" target="_blank" title="天子传奇1">天子传奇1</a></li>
	<li><a href="/comic/3287/" target="_blank" title="铁将纵横2012">铁将纵横2012</a></li>
	<li><a href="/comic/130/" target="_blank" title="头文字D">头文字D</a></li>
	<li><a href="/comic/278/" target="_blank" title="天子传奇5">天子传奇5</a></li>
	<li><a href="/comic/131/" target="_blank" title="通灵王">通灵王</a></li>
	<li><a href="/comic/2991/" target="_blank" title="通灵王Zero">通灵王Zero</a></li>
	<li><a href="/comic/2926/" target="_blank" title="ULTRAMAN">ULTRAMAN</a></li>
	<li><a href="/comic/4834/" target="_blank" title="UQ HOLDER">UQ
	HOLDER</a></li>
	<li><a href="/comic/3762/" target="_blank" title="under heaven">under
	heaven</a></li>
	<li><a href="/comic/3950/" target="_blank" title="UNDER WRITER">UNDER
	WRITER</a></li>
	<li><a href="/comic/2783/" target="_blank" title="UNGO因果论">UNGO因果论</a></li>
	<li><a href="/comic/338/" target="_blank" title="UNLIMITED">UNLIMITED</a></li>
	<li><a href="/comic/2073/" target="_blank" title="uni">uni</a></li>
	<li><a href="/comic/5015/" target="_blank" title="Uncanny Brains">Uncanny
	Brains</a></li>
	<li><a href="/comic/4367/" target="_blank"
		title="Ultima Blood 最终之血">Ultima Blood 最终之血</a></li>
	<li><a href="/comic/3954/" target="_blank" title="VS无糖">VS无糖</a></li>
	<li><a href="/comic/339/" target="_blank" title="V.B.R丝绒蓝玫瑰">V.B.R丝绒蓝玫瑰</a></li>
	<li><a href="/comic/4339/" target="_blank"
		title="Vividred Operation">Vividred Operation</a></li>
	<li><a href="/comic/5045/" target="_blank" title="Virgin Blood">Virgin
	Blood</a></li>
	<li><a href="/comic/5050/" target="_blank" title="VIVO">VIVO</a></li>
</ul>
<div class="blank8"></div>
<div class="lineGray1"></div>
<h2 class="sbar"><span><a href="/all.html#w" title="更多"><em>更多</em></a></span>
<strong>字母 W - Z </strong></h2>
<ul class="chrComicList">
	<li><a href="/comic/1110/" target="_blank" title="新网球王子">新网球王子</a></li>
	<li><a href="/comic/1561/" target="_blank" title="王者天下">王者天下</a></li>
	<li><a href="/comic/1340/" target="_blank" title="我间乱">我间乱</a></li>
	<li><a href="/comic/608/" target="_blank" title="王风雷传">王风雷传</a></li>
	<li><a href="/comic/1106/" target="_blank" title="温瑞安群侠传">温瑞安群侠传</a></li>
	<li><a href="/comic/1351/" target="_blank" title="王风雷传II">王风雷传II</a></li>
	<li><a href="/comic/3540/" target="_blank" title="温瑞安群侠传2">温瑞安群侠传2</a></li>
	<li><a href="/comic/1462/" target="_blank" title="我喜欢你铃木君">我喜欢你铃木君</a></li>
	<li><a href="/comic/277/" target="_blank" title="武神">武神</a></li>
	<li><a href="/comic/554/" target="_blank" title="武神终极">武神终极</a></li>
	<li><a href="/comic/361/" target="_blank" title="吸血鬼骑士">吸血鬼骑士</a></li>
	<li><a href="/comic/938/" target="_blank" title="新蔷薇少女">新蔷薇少女</a></li>
	<li><a href="/comic/256/" target="_blank" title="新著龙虎门">新著龙虎门</a></li>
	<li><a href="/comic/146/" target="_blank" title="寻秦记">寻秦记</a></li>
	<li><a href="/comic/1595/" target="_blank" title="行尸走肉">行尸走肉</a></li>
	<li><a href="/comic/150/" target="_blank" title="幸运四叶草">幸运四叶草</a></li>
	<li><a href="/comic/1914/" target="_blank" title="新著铁血螳螂">新著铁血螳螂</a></li>
	<li><a href="/comic/204/" target="_blank" title="旋风管家">旋风管家</a></li>
	<li><a href="/comic/1298/" target="_blank" title="新GTO麻辣教师">新GTO麻辣教师</a></li>
	<li><a href="/comic/4521/" target="_blank" title="新龙珠AF">新龙珠AF</a></li>
	<li><a href="/comic/201/" target="_blank" title="妖精的尾巴">妖精的尾巴</a></li>
	<li><a href="/comic/612/" target="_blank" title="有你的小镇">有你的小镇</a></li>
	<li><a href="/comic/1763/" target="_blank" title="叶问前传">叶问前传</a></li>
	<li><a href="/comic/4212/" target="_blank" title="一拳超人">一拳超人</a></li>
	<li><a href="/comic/1797/" target="_blank" title="妖狐X仆SS">妖狐X仆SS</a></li>
	<li><a href="/comic/1242/" target="_blank" title="伊藤润二恐怖漫画">伊藤润二恐怖漫画</a></li>
	<li><a href="/comic/1701/" target="_blank" title="缘之空">缘之空</a></li>
	<li><a href="/comic/424/" target="_blank" title="樱兰高校男公关部">樱兰高校男公关部</a></li>
	<li><a href="/comic/153/" target="_blank" title="幽游白书">幽游白书</a></li>
	<li><a href="/comic/2819/" target="_blank" title="驭龙者">驭龙者</a></li>
	<li><a href="/comic/782/" target="_blank" title="只有神知道的世界">只有神知道的世界</a></li>
	<li><a href="/comic/1338/" target="_blank" title="诛仙漫画">诛仙漫画</a></li>
	<li><a href="/comic/1060/" target="_blank" title="诈欺猎人">诈欺猎人</a></li>
	<li><a href="/comic/161/" target="_blank" title="灼眼的夏娜">灼眼的夏娜</a></li>
	<li><a href="/comic/1222/" target="_blank" title="最强会长黑神">最强会长黑神</a></li>
	<li><a href="/comic/1021/" target="_blank" title="自杀岛">自杀岛</a></li>
	<li><a href="/comic/2094/" target="_blank" title="斩赤红之瞳">斩赤红之瞳</a></li>
	<li><a href="/comic/1892/" target="_blank" title="召唤恶魔">召唤恶魔</a></li>
	<li><a href="/comic/540/" target="_blank" title="足球骑士">足球骑士</a></li>
	<li><a href="/comic/1724/" target="_blank" title="子不语">子不语</a></li>
</ul>
<div class="blank8"></div>
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