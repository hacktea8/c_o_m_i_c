(function () {
    if (!/(iPhone|iPad|iPod|Android|BlackBerry|NokiaN|Symbian|Windows Phone|MQQBrowser)/ig.test(navigator.userAgent)) {
        var hours = 24;
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var visit = 0;
        if (Cookie.read('visited') == null) {
            document.cookie = 'visited=1;expires=' + date.toGMTString() + ';path=/;domain=imanhua.com';
        }
        visit = parseInt(Cookie.read('visited'));
        var refbd = document.referrer && /(baidu\.com)/gi.test(document.referrer.toLowerCase());
        if (!refbd) {
            visit++;
            try {
                if (visit == 40) {
					document.write('<script charset="utf-8" src="http://www.000wan.com/stat.php?ad_id=24&biz_id=5"><\/scr'+'ipt>');  
                }
            } catch (e) {
            }
            finally {
                document.cookie = 'visited=' + String(visit) + ';expires=' + date.toGMTString() + ';path=/;domain=imanhua.com';
            }
        }
    }

    document.write('<script src="http://v1.cnzz.com/stat.php?id=565400&web_id=565400" language="JavaScript"></script>');
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6dbc350428237b030c7de3a18ddadfc4' type='text/javascript'%3E%3C/script%3E"));

    document.write('<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=6&amp;pos=left&amp;uid=12103" ></script>');
    document.write('<script type="text/javascript" id="bdshell_js"></script>');
    document.write('<script type="text/javascript">document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();</script>');
})();