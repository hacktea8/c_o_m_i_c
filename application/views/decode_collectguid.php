<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>采集管理页面</title>
<style type="text/css">
.huashu{width:30%;border:2px solid blue;float:left;margin-right:10px;}
.showinfo{border:1px solid red;}
.onemh{width:30%;border:2px solid blue;float:left;margin-right:10px;}
.mhcate{width:30%;border:2px solid blue;float:left;margin-right:10px;}
div input[type=text]{border:1px solid red;}
.clear{height:2px;clear:both;}
.upcomic{width:30%;border:2px solid blue;float:left;margin-right:10px;}
.upcomicvol{width:30%;border:2px solid blue;float:left;margin-right:10px;}
</style>
</head>
<body>
<div>
<?php foreach($catelist as $cate){?>
  <strong><?php echo $cate['id'];?></strong><span><?php echo $cate['name'];?></span>
  <?php }?>
</div>
<div class="huashu">
  <div class="opt">话数ID<input type="text" id="huaid" value="" /><input type="button" id="huaexc" value="执行" />
  </div>
  <div class="showinfo"></div>
</div>
<div class="onemh">
  <div class="opt">漫画ID<input type="text" id="mhid" value="" /><br />
  分类ID<input type="text" id="cateid" value="" />
  <input type="button" id="mhexc" value="执行" />
  </div>
  <div class="showinfo"></div>
</div>
<div class="mhcate">
  <div class="opt">分类ID<input type="text" id="cid" value="" />
  <input type="button" id="cateexc" value="执行" />
  </div>
  <div class="showinfo"></div>
</div>
<div class="clear"></div>
<div class="upcomic">
  <div class="opt">
    更新漫画数量<input type="text" id="mhnum" value="" /><br />
    分类ID<input type="text" id="mhcate" value="" />
    <input type="button" id="upmhexc" value="执行" />
  </div>
  <div class="showinfo"></div>
</div>

<div class="upcomicvol">
  <div class="opt">
    更新漫画卷信息<input type="text" id="mhvolnum" value="" /><br />
    <input type="button" id="upmhvolexc" value="执行" />
  </div>
  <div class="showinfo"></div>
</div>
<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	//
	  $('#upmhvolexc').click(function(){
		  $('.upcomicvol .showinfo').html('');
			var num=$('#mhvolnum').val();
			if(!num){
				alert('有些字段没写?!');
				return false;
				}
			window.open("http://mh.hacktea8.com/decode/collectcomicvol/"+num);
			
		  });
	  
  $('#huaexc').click(function(){
		var num=$('#huanum').val();
		 $.getJSON("/decode/collectpage/"+num,function(result){
			    $.each(result, function(i, field){
			      $("div").append(field + " ");
			    });
		 });
	  });
//
  $('#mhexc').click(function(){
	  $('.onemh .showinfo').html('');
		var num=$('#mhid').val();
		var cateid=$('#cateid').val();
		if(!num||!cateid){
			alert('有些字段没写?!');
			return false;
			}
		 $.getJSON("/decode/collectcomic/"+num+'/'+cateid,function(result){
			 var info='';
			    $.each(result, function(i, field){
				  info+=i+':'+field+',';
			      
			    });
			    $('.onemh .showinfo').html(info);
		 });
	  });
  //
  $('#cateexc').click(function(){
	  $('.mhcate .showinfo').html('');
	  $(this).hide(500);
		var cateid=$('#cid').val();
		if(!cateid){
			alert('有些字段没写?!');
			return false;
			}
		 $.getJSON("/decode/catecomiclist/"+cateid,function(result){
			 var info='';
			 if(result=='1'){
				 
				 info='采集任务已完成!';
			 }else{
				info='发生未知错误!';
				 }
			 $('#cateexc').show(500);
			    $('.mhcate .showinfo').html(info);
		 });
	  });
  //
  $('#upmhexc').click(function(){
	  $('.upcomic .showinfo').html('');
	  $(this).hide(500);
		var mhnum=$('#mhnum').val();
		var cid=$('#mhcate').val();
		if(!cateid){
			alert('有些字段没写?!');
			return false;
			}
		 $.getJSON("/decode/updatecomic/"+mhnum+'/'+cid,function(result){
			 var info='';
			 if(result=='1'){
				 
				 info='采集任务已完成!';
			 }else{
				info='发生未知错误!';
				 }
			 $('#upmhexc').show(500);
			    $('.upcomic .showinfo').html(info);
		 });
	  });
});
</script>
</body>
</html>