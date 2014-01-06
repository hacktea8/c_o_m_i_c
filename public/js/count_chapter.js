(function (ut, doc) {
    if (ut.browser.isMobile === false) {
        var hours = 24;
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var visits = ut.cookie('visited');
        if (visits == null || visits == undefined) {
            visits = 1;
            doc.cookie = 'visited=1;expires=' + date.toGMTString() + ';path=/;domain=imanhua.com';
        }
        var refbd = doc.referrer && /(baidu\.com)/gi.test(document.referrer.toLowerCase());
        if (!refbd) {
            visits++;
            try {
                if (visits == 40) {
					doc.write('<script charset="utf-8" src="http://www.000wan.com/stat.php?ad_id=24&biz_id=5"><\/scr'+'ipt>');  
                }
            } catch (e) { }
            finally {
                doc.cookie = 'visited=' + String(visits) + ';expires=' + date.toGMTString() + ';path=/;domain=imanhua.com';
            }
        }
    }

	doc.write('<script src="http://v1.cnzz.com/stat.php?id=565400&web_id=565400" language="JavaScript"></script>');
	doc.write('<script src="http://s13.cnzz.com/stat.php?id=263455&web_id=263455" language="JavaScript"></script>');

    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    doc.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6dbc350428237b030c7de3a18ddadfc4' type='text/javascript'%3E%3C/script%3E"));

})(IMH.utils, document);