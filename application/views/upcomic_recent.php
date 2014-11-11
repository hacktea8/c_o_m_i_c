<div class="main">
  
  <div class="main">
   
  </div>
  
</div>
<div class="main">
  <div style="border:1px solid #999;">
    <h2 class="bar">
      <strong class="position">
        <span id="fav">
          <script language="javascript">
            toFav();
          </script>
          <a class="baiduFav" href="javascript:window.open('http://cang.baidu.com/do/add?it='+encodeURIComponent(document.title.substring(0,76))+'&iu='+encodeURIComponent(location.href)+'&fr=ien#nw=1','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes');void(0)"
          title="添加到百度搜藏">
            <span>
              添加到百度搜藏
            </span>
          </a>
          <a class="qqFav" href="javascript:window.open('http://shuqian.qq.com/post?title='+encodeURIComponent(document.title)+'&uri='+encodeURIComponent(document.location.href)+'&jumpback=2&noui=1','favit','width=960,height=600,left=50,top=50,toolbar=no,menubar=no,location=no,scrollbars=yes,status=yes,resizable=yes');void(0)"
          title="收藏到QQ书签">
            <span>
              收藏到QQ书签
            </span>
          </a>
        </span>
        您当前的位置 ：
        <em>
          <a href="/">
            <?php echo $web_title;?>首页
          </a>
          &gt;&gt;
          <a href="/recent.html">
            最新更新的漫画
          </a>
        </em>
      </strong>
    </h2>
    <div class="blank8">
    </div>
    <div class="updateList">
<?php foreach($list as $vk => $vv){?>
      <ul>
 <?php foreach($vv as $k => $v){?>
        <li>
          <span class="red">
           <?php echo date('Y/md',$v['rtime']);?>
          </span>
          <em>
          <?php echo $vk*50 + $k+1;?>
          </em>
          <a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>">
          <?php echo $v['name'];?>
          </a>
          [
          <a class="red" href="<?php echo $v['volurl'];?>" title="<?php echo $v['volname'];?>">
           <?php echo $v['volname'];?>
          </a>
          ]
          <acronym>
          <?php echo $v['author'];?>
          </acronym>
        </li>
 <?php }?>
      </ul>
 <?php if(0 != $vk%2){?>
      <div class="dot-line"></div>
 <?php }?>
<?php }?>
    </div>
    <div class="blank8">
    </div>
  </div>
</div>
<div class="blank4"></div>
<div class="main">
  
  <div id="money1" style="">
    
  </div>
</div>
<div class="blank4"></div>
