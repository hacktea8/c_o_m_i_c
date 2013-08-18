<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>解析加密数据</title>
<script type="text/javascript" src="/public/js/jquery.js"></script>
</head>
<body>
<textarea rows="10" cols="100" id='code' ></textarea>
<br />
<input type="text" value="" id="" />
<br />
<input type="button" id='auto' value="自动" /><input type="button" id="" value="解密" />
<script type="text/javascript">
function postUrl(){
	$.post('/decode/getcode/','burl='+cInfo.burl+'&files='+cInfo.files+'&finished='+cInfo.finished+
			'&bid='+cInfo.bid+'&bname='+cInfo.bname+'&cid='+cInfo.cid+'&cname='+cInfo.cname+
			'&length='+cInfo.length+'&code=11',function(datas){
        alert(datas);
		});
	}

function gotoUrl(){
    window.location.href='<?php //echo $url;?>';
		}

$(document).ready(function(){
	var d=document;
	var js, id = 'decodejs'; if (d.getElementById(id)) {return;}
	  js = d.createElement('script'); js.id = id;
	  js.innerHTML=eval($('#code').val());
	  d.getElementsByTagName('head')[0].appendChild(js);

	//  JSON.stringify(a);
	
	setTimeout('postUrl()',1000);
	
	<?php if(isset($time)){?>
	setTimeout('gotoUrl()',<?php echo $time*1000;?>);
	<?php }?>
});
</script>
</body>
</html>