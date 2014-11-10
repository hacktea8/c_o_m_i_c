var pVars = pVars || {
    'servs': [
        { 'name': '电信①', 'host': 'i1.hacktea8.com/showpic.php?key=' },
        { 'name': '电信②', 'host': 'img.hacktea8.com/showpic.php?key=' },
        { 'name': '电信③', 'host': 'img.hacktea8.com/showpic.php?key=' },
        { 'name': '广东电信', 'host': 'img.hacktea8.com/showpic.php?key=' },
        { 'name': '江苏电信', 'host': 'img.hacktea8.com/showpic.php?key=' },
        { 'name': '联通', 'host': 'img.hacktea8.com/showpic.php?key=' }
    ],
	'servsLen': 6,
    'root': 'http://mh.emubt.com',
    'page': 1,
    'curServ': 0,
    'defServ': 0,
    'priServ': 3,
    'curFile': '',
	'dblClick': 1,
    'skin': 0,
    'IMG_ERR_MSG': '<div class="img-err-msg"><h3>:( 非常抱歉，图片载入失败了。</h3><ol><li>请尝试按键盘F5按键或<a href="javascript:;" onclick="location.reload();">点击此处</a>刷新本页面。</li><li>请尝试点击右侧的服务器节点切换到速度更快的服务器。</li></ol></div>'
};


(function () {
    var language = (navigator.language || navigator.userLanguage || navigator.browserLanguage).toLowerCase();
    if (/(zh-hk|ja)/gi.test(language)) {
        location.href = '/';
    }
})();
