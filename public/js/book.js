var moneys = new Array();
createMoney(moneys, 7);

moneys[0].enable = false;

moneys[1].enable = true;
moneys[1].type = "iframe";
moneys[1].src = "/v2/money/91wan/250x250.html";
moneys[1].width = "250";
moneys[1].height = "250";

moneys[2].enable = false;
moneys[2].type = "iframe";
moneys[2].src = "/v2/money/baidu/460x60.html";
moneys[2].width = "460";
moneys[2].height = "64";

moneys[3].enable = true;
moneys[3].type = "iframe";
moneys[3].src = "/v2.1/nmoneys/webgame/webgame_750x120.html";
moneys[3].width = "100%";
moneys[3].height = "134";
moneys[3].style = "width:752px; text-align:center;";

moneys[4].enable = true;
moneys[4].type = "iframe";
moneys[4].src = "/v2.1/nmoneys/dm456/dm456_r.html";
moneys[4].width = "218";
moneys[4].height = "320";
moneys[4].style = "width:218px; margin:0 auto;";


moneys[5].type = "iframe";
moneys[5].src = "/v2/money/91wan/200x350.html";
moneys[5].width = "200";
moneys[5].height = "350";
moneys[5].style = "text-align:center;padding:8px 0; width:210px; margin:0 auto;background-color:#F0F0F0;";

moneys[6].enable = false;
moneys[6].type = "iframe";
moneys[6].src = '/v2/money/baidu/960x600.html';
moneys[6].width = "960";
moneys[6].height = "70";


(function () {
  var ie = !!(window.attachEvent && !window.opera);
  var wk = /webkit\/(\d+)/i.test(navigator.userAgent) && (RegExp.$1 < 525);
  var fn = [];
  var run = function () { for (var i = 0; i < fn.length; i++) fn[i](); };
  var d = document;
  d.ready = function (f) {
    if (!ie && !wk && d.addEventListener)
      return d.addEventListener('DOMContentLoaded', f, false);
    if (fn.push(f) > 1) return;
    if (ie)
      (function () {
        try { d.documentElement.doScroll('left'); run(); }
        catch (err) { setTimeout(arguments.callee, 0); }
      })();
    else if (wk)
      var t = setInterval(function () {
        if (/^(loaded|complete)$/.test(d.readyState))
          clearInterval(t), run();
      }, 0);
  };
})();


document.ready(function () {
    var language = (navigator.language || navigator.userLanguage || navigator.browserLanguage).toLowerCase();
    if (/(zh-hk|ja)/gi.test(language)) {
        document.getElementById('subBookList').style.display = 'none';
    }
});