function $(objID){return document.getElementById(objID)};function openWindow(url,w,h){var iTop=(window.screen.availHeight-30-h)/2;var iLeft=(window.screen.availWidth-10-w)/2;window.open(url,'','height='+h+',,innerHeight='+h+',width='+w+',innerWidth='+w+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=no,resizeable=no,location=no,status=no');return false}function changeTab(a,b){var l=a-1;var o=$('tabList').getElementsByTagName('li');var p=$('comicList').getElementsByTagName('ul');for(var i=0;i<a;i++){p[i].style.display='none';o[i].className=(i==l)?'end':''}o[b].className=(l==b)?'end on':'on';p[b].style.display='block'}function getRequest(){var args=new Object();var query=location.search.substring(1);var pairs=query.split("&");for(var i=0;i<pairs.length;i++){var pos=pairs[i].indexOf('=');if(pos==-1)continue;var argname=pairs[i].substring(0,pos);var value=pairs[i].substring(pos+1);args[argname]=unescape(value)}return args}var Cookie=(function(){return{'create':function(name,value,days){var expires="";if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));expires="; expires="+date.toGMTString()}document.cookie=name+"="+value+expires+"; path=/"},'read':function(name){var nameEQ=name+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length)}return null},'erase':function(name){Cookie.create(name,"",-1)}}})();function createXMLHttp(){var ret=null;try{ret=new ActiveXObject('Msxml2.XMLHTTP')}catch(e){try{ret=new ActiveXObject('Microsoft.XMLHTTP')}catch(ee){ret=null}}if(!ret&&typeof XMLHttpRequest!='undefined'){ret=new XMLHttpRequest()}return ret}var objCover;function setCover(){document.write('<div id="coverDiv"><img id="coverPath" src="" style="display:none;" /><div id="coverTitle"></div></div>');var a=document.getElementsByTagName("A");for(var i=0;i<a.length;i++){if(a[i].getAttribute("rel")){a[i].onmouseover=function(e){objCover=this;showCover(e,this)};a[i].onmouseout=function(){objCover='';hideCover()}}}}function hideCover(){$('coverPath').style.display='none';$('coverPath').src='';$('coverDiv').style.display='none';document.onmousemove=null}function showCover(e,a){if(a!=objCover)return;var p=getMouse(e);$('coverDiv').style.left=p.x+"px";$('coverDiv').style.top=(p.y+16)+"px";document.onmouseout=function(){hideCover()};window.setTimeout(function(){if(objCover==a){$('coverPath').src=a.getAttribute('rel');$('coverTitle').innerHTML=a.innerText;$('coverPath').onload=function(){$('coverPath').style.display='';$('coverDiv').style.display=''}}},120)}function getMouse(e){return window.event?{x:event.clientX+document.documentElement.scrollLeft,y:event.clientY+document.documentElement.scrollTop}:{x:e.pageX+document.documentElement.scrollLeft,y:e.pageY+document.documentElement.scrollTop}}

function bookMark(){
 if(document.cookie=="") return;
 if(Cookie.read("addfav")=="addfavcookies") return;
  var ref= document.referrer;
  if(1){
   if(confirm(site_name+'，让你爱上漫画！收藏爱漫画，方便浏览最新漫画！')){
    window.external.addFavorite('http://'+site_url+'/?Fav', site_name+',在线漫画,为您提供最新、最好看的漫画');
   }else{
   }
  }
  Cookie.create('addfav','addfavcookies',365);
}
var local = document.location.href.toLowerCase();
if(local.indexOf("fav")>0) Cookie.create('addfav','addfavcookies',365);
window.setTimeout(bookMark,5000);
function toFav(){
 document.writeln("<a class='baiduFav' href=\"javascript:window.open(\'http:\/\/cang.baidu.com\/do\/add?it=\'+encodeURIComponent(document.title.substring(0,76))+\'&iu=\'+encodeURIComponent(location.href)+\'&fr=ien#nw=1\',\'_blank\',\'scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes\');void(0)\" title='添加到百度搜藏'><span>添加到百度搜藏</span><\/a>");
 document.writeln("<a class='qqFav' href=\"javascript:window.open(\'http:\/\/shuqian.qq.com\/post?title=\'+encodeURIComponent(document.title)+\'&uri=\'+encodeURIComponent(document.location.href)+\'&jumpback=2&noui=1\',\'favit\',\'width=960,height=600,left=50,top=50,toolbar=no,menubar=no,location=no,scrollbars=yes,status=yes,resizable=yes\');void(0)\" title='收藏到QQ书签'><span>收藏到QQ书签</span><\/a>");
}
function initClipBox(){
 document.write("<input class=\"clipInput\" value=\"" + location.href + "\" onclick=\"copyToClipBoard(this)\"></input>");
 document.write("<input class=\"clipBtn\" type=\"button\" value=\"复制\" onclick=\"copyToClipBoard(this)\" />");
}
function copyToClipBoard(el){
 el.select();
 var clipBoardContent = document.title +'\r\n'+ location.href +'';
 alert('复制成功,发给你的好友一起分享吧!');
 window.clipboardData.setData("Text",clipBoardContent);
}
function addToFavorite(){
 var title = document.title;
 window.external.AddFavorite(location.href,title);
}
function hotComic(){
 var arrLink = new Array();
 arrLink[0] = [54,"火影忍者"];
 arrLink[1] = [55,"海贼王"];
 arrLink[2] = [111,"犬夜叉"];
 arrLink[3] = [120,"死神"];
 arrLink[4] = [136,"网球王子"];
 arrLink[5] = [201,"妖精的尾巴"];
 arrLink[6] = [1338,"诛仙漫画"];
 arrLink[7] = [76,"猎人"];
 arrLink[8] = [46,"灌篮高手"];
 arrLink[9] = [205,"家庭教师"];
 arrLink[10] = [108,"七龙珠"];
 document.write("热门漫画：");
 for(var i=0;i<arrLink.length;i++){
  document.write("<a href=\"/index/comic/" + arrLink[i][0] + "\" alt=\"" + arrLink[i][1] + "\">" + arrLink[i][1] + "</a> ");
 }
}
function otherNav(){
 $('kw').value='请输入搜索内容';
}
var _ts=function(){var b=new Date,a=[];a.push(b.getFullYear());a.push(b.getMonth()+1);a.push(b.getDate());a.push(b.getHours());return a.join("")}();function money(){this.type="html";this.src="";this.href="";this.alt="";this.width="";this.height="";this.code="";this.enable=true;this.style=""}function createMoney(b,c){for(var a=0;a<c;a++)b[a]=new money}function show(a){if(!moneys[a])return;if(!moneys[a].enable)return;var d=moneys[a].type,c=moneys[a].src+"?v="+_ts,b="";switch(d){case"htm":case"html":b=moneys[a].code;break;case"iframe":b='<iframe scrolling="no" frameborder="0" width="'+moneys[a].width+'" height="'+moneys[a].height+'" src="'+c+'" ></iframe>';break;case"img":b='<a href="'+moneys[a].href+'" target="_blank"><img alt="'+moneys[a].alt+'" src="'+c+'" border="0" width="'+moneys[a].width+'" height="'+moneys[a].height+'" /></a>';break;default:b=""}document.write('<div id="money'+a+'" style="'+moneys[a].style+'">'+b+"</div>")};
var xmlHttp;var bShow=false;var iLen=0;var iIndex=0;var sKey="";function fnGetResult(){if($("kw").value==""){return}if($("kw").value==sKey){return}sKey=$("kw").value;xmlHttp=createXMLHttp();xmlHttp.onreadystatechange=fnHandle;xmlHttp.open("post","/searc/index/",true);xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');xmlHttp.send("s=1&key="+escape(sKey))}function fnHandle(){if(xmlHttp.readyState==4){if(xmlHttp.status==200){fnInitData(xmlHttp.responseText)}}}function fnInitData(data){iIndex=0;if(eval(data)=='undefined'){return false}var oData=eval(data);try{iLen=oData.length}catch(e){}if(iLen==0){$("suggest").style.display="none";bShow=false}else{var sRet="<ul>";for(var i=0;i<iLen;i++){sRet+="<li onclick=\"fnGoTo("+oData[i].id+")\" onmouseover=\"this.className=\'on\'\" onmouseout=\"this.className=''\">"+oData[i].status+oData[i].title+"</li>"}sRet+="</ul>";sRet+="<div><a href='javascript:void(0);' onclick='fnClose()'>×关闭</a></div>";$("suggest").innerHTML=sRet;$("suggest").style.display="block";bShow=true}}function fnGoTo(id){window.location.href="/comic/"+id}function fnKeyup(e){var iKey=(window.event)?e.keyCode:((e.which)?e.which:0);if(iKey==40||iKey==38){iIndex=(iKey==40)?((iIndex>=iLen)?0:++iIndex):((iIndex<=0)?iLen:--iIndex);fnToogle(iIndex)}else{window.setTimeout(fnGetResult,300)}}function searchSend(){if(iIndex>0){$("suggest").getElementsByTagName("li")[iIndex-1].onclick()}else{if($('kw').value==''){window.alert('请输入您要查找的漫画！');$('kw').focus();return false}window.location.href='/search/index/?key='+$("kw").value}}function fnKeydown(e){var iKey=(window.event)?e.keyCode:((e.which)?e.which:0);if(iKey==13){(iIndex>0)?$("suggest").getElementsByTagName("li")[iIndex-1].onclick():searchSend()}}function fnToogle(p){var oSuggest=$("suggest").getElementsByTagName("li");for(var i=0;i<iLen;i++){oSuggest[i].className=""}if(p>0){oSuggest[p-1].className="on";$('kw').value=oSuggest[p-1].getElementsByTagName("p")[0].innerText;}}function fnFocus(){if($('kw').value=='请输入搜索内容'){$('kw').style.color='#333333';$('kw').value='';}setTimeout(fnGetResult,500);if(bShow){$("suggest").style.display="block"}}function fnBlur(){setTimeout(fnClose,500)}function fnClose(){$("suggest").style.display="none"}

window.onerror = function(){return true;}

var isIE = window.navigator.userAgent.toLowerCase().indexOf("msie")>=1 ? 1 : 0;
if(!isIE){
 HTMLElement.prototype.__defineGetter__(    "innerText",
 function(){
  return this.textContent.replace(/(^\s*)|(\s*$)/g, "");
 }
 );
 HTMLElement.prototype.__defineSetter__(    "innerText",
 function(sText){
  this.textContent=sText;
 }
 );
}
function initGame(){
}
if( top.location != self.location){
 top.location = self.location
}
Array.prototype.S=String.fromCharCode(2);
Array.prototype.in_array=function(e){
 var r=new RegExp(this.S+e+this.S);
 return (r.test(this.S+this.join(this.S)+this.S));
};
if('comic' == _method){
 window.setTimeout(function(){
 $.get('/api/add_comic_pv/'+comicid+'/'+volid);
 }, 5000);
}
