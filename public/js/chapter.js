var moneys = [];
moneys[0] = {
    type: 'iframe',
    width: 980,
    height: 148,
    src: '/v2.4/moneys/games/top_all.html',
    enable: true
};


moneys[1] = {
    type: 'iframe',
    width: 980,
    height: 72,
    lazyload: true,
    src: '/v2.4/moneys/games/chapter_bottom.html',
    enable: true
};

moneys[2] = {
    type: 'iframe',
    width: 980,
    height: 72,
    lazyload: true,
    src: '/v2.4/moneys/games/chapter_bottom2.html',
    enable: true
};

moneys[3] = {
    type: 'html',
    code: '<a style="display:none!important" id="tanx-a-mm_10806882_844301_14486940"></a>',
    enable: true,
    lazyload: false,
	mobile: true
}

moneys[4] = {
    type: 'html',
    code: '<a style="display:none!important" id="tanx-a-mm_10806882_844301_14508932"></a>',
    enable: true,
    lazyload: false,
    mobile: true
};

IMH.adLoader.init(moneys);

tanx_s = document.createElement("script");
	tanx_s.type = "text/javascript";
	tanx_s.charset = "gbk";
	tanx_s.id = "tanx-s-mm_10806882_844301_14486940";
	tanx_s.async = true;
	tanx_s.src = "http://p.tanx.com/ex?i=mm_10806882_844301_14486940";
	tanx_h = document.getElementsByTagName("head")[0];
if(tanx_h){
	tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
}

tanx_s = document.createElement("script");
tanx_s.type = "text/javascript";
tanx_s.charset = "gbk";
tanx_s.id = "tanx-s-mm_10806882_844301_14508932";
tanx_s.async = true;
tanx_s.src = "http://p.tanx.com/ex?i=mm_10806882_844301_14508932";
tanx_h = document.getElementsByTagName("head")[0];
if (tanx_h) {
    tanx_h.insertBefore(tanx_s, tanx_h.firstChild);
}