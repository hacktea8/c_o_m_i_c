(function () {
    if (!/(iPhone|iPad|iPod|Android|BlackBerry|NokiaN|Symbian|Windows Phone|MQQBrowser)/ig.test(navigator.userAgent)) {
        var hours = 24;
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var visit = 0;
        if (Cookie.read('visited') == null) {
            document.cookie = 'visited=1;expires=' + date.toGMTString() + ';path=/;domain=hacktea8.com';
        }
        visit = parseInt(Cookie.read('visited'));
        var refbd = document.referrer && /(baidu\.com)/gi.test(document.referrer.toLowerCase());
        if (!refbd) {
            visit++;
            try {
                if (visit == 40) {
					document.write('');  
    
                }
            } catch (e) {
            }
            finally {
                document.cookie = 'visited=' + String(visit) + ';expires=' + date.toGMTString() + ';path=/;domain=hacktea8.com';
            }
        }
    }

    document.write('');
	document.write('');

})();