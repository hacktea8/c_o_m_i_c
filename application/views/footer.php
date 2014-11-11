<div class="border1" style="width: 978px; margin: 8px auto 0;">
<h2 class="bar"><span>定期清理不符合要求的链接，未能通知，请见谅！链接要求：百度权重8以上，ALEXA综合排名5000名以内，并且PR≥6的优秀站点</span><strong>友情链接</strong></h2>
<div class="blank8"></div>
<ul class="friendLink">
<?php foreach($friendLink as $row){ ?>
<li><a title="<?php echo $row['title'];?>" href="<?php echo $row['link'];?>" target="_blank"><?php echo $row['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank8"></div>
</div>
<div class="blank4"></div>
<div style="text-align: center; line-height: 1.8em;">热门漫画：
<?php foreach($hotComic as $v){?>
<a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" target="_blank"><strong>
<font color="#FF0000"><?php echo $v['name'];?></font></strong></a>
<?php }?>
</div>
<div class="blank4"></div>
<div class="main" style=""><script language="javascript">show(2);</script></div>
<div class="footer">
<div class="main" style="line-height: 2.2em;"><?php echo $web_title;?>网站所有漫画均来自网友分享和上传，以便漫画爱好者研究漫画技巧和构图方式。若侵犯到您的权益，请立即<a
	class="red" target="_blank" href="/support/contact"><b>联系我们</b></a>删除。本站不负任何相关责任。
<div>
<script
	src="<?php echo $js_url;?>foot.js" language='JavaScript' charset='utf-8'></script><script
	src='<?php echo $js_url;?>icount.js' language='JavaScript' charset='utf-8'></script></div>
</div>
<div style="display:none;">
</div>
</body>
</html>
