function openWindow(n, t, i) {
  var r = (window.screen.availHeight - 30 - i) / 2,
  u = (window.screen.availWidth - 10 - t) / 2;
  return window.open(n, "", "height=" + i + ",,innerHeight=" + i + ",width=" + t + ",innerWidth=" + t + ",top=" + r + ",left=" + u + ",toolbar=no,menubar=no,scrollbars=no,resizeable=no,location=no,status=no"),
  !1
} (function(n) {
  function i(n) {
    if (typeof n.data == "string") {
      var i = n.handler,
      t = n.data.toLowerCase().split(" "),
      r = ["text", "password", "number", "email", "url", "range", "date", "month", "week", "time", "datetime", "datetime-local", "search", "color"];
      n.handler = function(n) {
        var o, h;
        if (this === n.target || !(/textarea|select/i.test(n.target.nodeName) || jQuery.inArray(n.target.type, r) > -1)) {
          var f = n.type !== "keypress" && jQuery.hotkeys.specialKeys[n.which],
          s = String.fromCharCode(n.which).toLowerCase(),
          u = "",
          e = {};
          for (n.altKey && f !== "alt" && (u += "alt+"), n.ctrlKey && f !== "ctrl" && (u += "ctrl+"), n.metaKey && !n.ctrlKey && f !== "meta" && (u += "meta+"), n.shiftKey && f !== "shift" && (u += "shift+"), f ? e[u + f] = !0 : (e[u + s] = !0, e[u + jQuery.hotkeys.shiftNums[s]] = !0, u === "shift+" && (e[jQuery.hotkeys.shiftNums[s]] = !0)), o = 0, h = t.length; o < h; o++) if (e[t[o]]) return i.apply(this, arguments)
        }
      }
    }
  }
  var t = n.browser.version == "6.0";
  n.fn.center = function(i) {
    var r = n.extend({
      position: "absolute",
      zIndex: 1e3,
      top: "50%",
      left: "50%"
    },
    i || {}),
    u = n("html"),
    f = !1;
    return r.position === "absolute" && (f = !0),
    this.each(function() {
      var i = n(this),
      o = i.parent(),
      h = o.is("body"),
      c = h ? "fixed": r.position,
      e,
      s;
      r.left == "50%" && (r.marginLeft = -i.outerWidth() / 2),
      r.top == "50%" && (r.marginTop = -i.outerHeight() / 2),
      f != !0 || h || o.css("position") !== "static" || o.css("position", "relative"),
      i.css(r).css("position", c),
      t && c === "fixed" && (u.css("backgroundAttachment") !== "fixed" && n("body").css("backgroundAttachment") !== "fixed" && u.css({
        zoom: 1,
        backgroundImage: "url(about:blank)",
        backgroundAttachment: "fixed"
      }), e = i[0].style, s = parseInt((u.height() - i.outerHeight()) / 2, 10), e.marginTop = 0, e.top = s + "px", e.position = "absolute", e.removeExpression("top"), e.setExpression("top", "eval(document.documentElement.scrollTop+" + s + ")"))
    })
  },
  n.fn.bgiframe = function(i) {
    function r(n) {
      return n && n.constructor === Number ? n + "px": n
    }
    if (!t) return this;
    i = n.extend({
      top: "auto",
      left: "auto",
      width: "auto",
      height: "auto",
      opacity: !0,
      src: "javascript:false;"
    },
    i);
    var u = n('<iframe class="bgiframe" frameborder="0" tabindex="-1" src="' + s.src + '" style="display:block;position:absolute;z-index:-1;" />');
    return this.each(function() {
      var t = n(this),
      i = t.children("iframe.bgiframe"),
      f = i.length === 0 ? u.clone() : i;
      f.css({
        top: s.top == "auto" ? (parseInt(t.css("borderTopWidth"), 10) || 0) * -1 + "px": r(s.top),
        left: s.left == "auto" ? (parseInt(t.css("borderLeftWidth"), 10) || 0) * -1 + "px": r(s.left),
        width: s.width == "auto" ? this.offsetWidth + "px": r(s.width),
        height: s.height == "auto" ? this.offsetHeight + "px": r(s.height),
        opacity: s.opacity === !0 ? 0 : undefined
      }),
      i.length === 0 && t.prepend(f)
    })
  },
  n.fn.mask = function() {},
  n.hotkeys = {
    version: "0.8",
    specialKeys: {
      8 : "backspace",
      9 : "tab",
      13 : "return",
      16 : "shift",
      17 : "ctrl",
      18 : "alt",
      19 : "pause",
      20 : "capslock",
      27 : "esc",
      32 : "space",
      33 : "pageup",
      34 : "pagedown",
      35 : "end",
      36 : "home",
      37 : "left",
      38 : "up",
      39 : "right",
      40 : "down",
      45 : "insert",
      46 : "del",
      96 : "0",
      97 : "1",
      98 : "2",
      99 : "3",
      100 : "4",
      101 : "5",
      102 : "6",
      103 : "7",
      104 : "8",
      105 : "9",
      106 : "*",
      107 : "+",
      109 : "-",
      110 : ".",
      111 : "/",
      112 : "f1",
      113 : "f2",
      114 : "f3",
      115 : "f4",
      116 : "f5",
      117 : "f6",
      118 : "f7",
      119 : "f8",
      120 : "f9",
      121 : "f10",
      122 : "f11",
      123 : "f12",
      144 : "numlock",
      145 : "scroll",
      191 : "/",
      224 : "meta"
    },
    shiftNums: {
      "`": "~",
      "1": "!",
      "2": "@",
      "3": "#",
      "4": "$",
      "5": "%",
      "6": "^",
      "7": "&",
      "8": "*",
      "9": "(",
      "0": ")",
      "-": "_",
      "=": "+",
      ";": ": ",
      "'": '"',
      ",": "<",
      ".": ">",
      "/": "?",
      "\\": "|"
    }
  },
  n.each(["keydown", "keyup", "keypress"],
  function() {
    n.event.special[this] = {
      add: i
    }
  })
})(jQuery);
var IMH = window.IMH || {};
IMH = {
  ver: "1.0.4",
  update: "2013-11-07",
  ns: function(n) {
    var t, i, r;
    if (!n || !n.length) return null;
    for (t = IMH, n = n.split("."), i = n[0] == "IMH" ? 1 : 0, r = n.length; i < r; i++) t[n[i]] = t[n[i]] || {},
    t = t[n[i]];
    return t
  },
  doc: window.document,
  ua: window.navigator.userAgent.toLowerCase(),
  head: window.document.getElementsByTagName("head")[0] || window.document.documentElement,
  KEY: {
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40,
    DEL: 46,
    TAB: 9,
    RETURN: 13,
    ESC: 27,
    PAGEUP: 33,
    PAGEDOWN: 34,
    BACKSPACE: 8
  }
},
function(n) {
  n.throttle = function(n, t) {
    var r = 200,
    i;
    return function() {
      var u = this,
      f = arguments;
      i && clearTimeout(i),
      i = setTimeout(function() {
        n.apply(u, f)
      },
      t || r)
    }
  },
  n.getQuery = function(n) {
    var t = RegExp("[?&]" + n + "=([^&]*)").exec(window.location.search);
    return t ? decodeURIComponent(t[1].replace(/\+/g, " ")) : ""
  },
  n.type = function() {
    function n(n) {
      return function(t) {
        return Object.prototype.toString.call(t) === "[object " + n + "]"
      }
    }
    return {
      isObject: n("Object"),
      isString: n("String"),
      isNumber: n("Number"),
      isFunction: n("Function"),
      isDate: n("Date"),
      isArray: Array.isArray || n("Array")
    }
  } (),
  n.browser = function() {
    return {
      isMobile: /Android|webOS|iPhone|iPod|iPad|BlackBerry|SymbianOS/i.test(navigator.userAgent),
      isIE: !!window.ActiveXObject,
      isIE6: !!window.ActiveXObject && !window.XMLHttpRequest
    }
  } (),
  n.addToFav = function(n, t) {
    var i = IMH.ua.indexOf("mac") != -1 ? "Command/Cmd": "CTRL";
    try {
      document.all ? window.external.addFavorite(t, n) : window.sidebar ? window.sidebar.addPanel(n, t, "") : alert("您的浏览器不支持自动加入收藏，您可以尝试通过快捷键" + i + " + D 加入到收藏夹!")
    } catch(r) {
      alert("您的浏览器不支持自动加入收藏，您可以尝试通过快捷键" + i + " + D 加入到收藏夹!")
    }
  },
  n.cookie = function(n, t, i) {
    var f, r, e, o, u, s;
    if (typeof t != "undefined") {
      i = i || {},
      t === null && (t = "", i.expires = -1),
      f = "",
      i.expires && (typeof i.expires == "number" || i.expires.toUTCString) && (typeof i.expires == "number" ? (r = new Date, r.setTime(r.getTime() + i.expires * 864e5)) : r = i.expires, f = "; expires=" + r.toUTCString());
      var h = i.path ? "; path=" + i.path: "",
      c = i.domain ? "; domain=" + i.domain: "",
      l = i.secure ? "; secure": "";
      document.cookie = [n, "=", encodeURIComponent(t), f, h, c, l].join("")
    } else {
      if (e = null, document.cookie && document.cookie != "") for (o = document.cookie.split(";"), u = 0; u < o.length; u++) if (s = jQuery.trim(o[u]), s.substring(0, n.length + 1) == n + "=") {
        e = decodeURIComponent(s.substring(n.length + 1));
        break
      }
      return e
    }
  },
  n.event = {
    getEvent: function(n) {
      return n || window.event
    },
    getTarget: function(n) {
      return n.target || n.srcElement
    },
    stopPropagation: function(n) {
      n.stopPropagation ? n.stopPropagation() : n.cancelBubble = !0
    },
    preventDefault: function(n) {
      n.preventDefault ? n.preventDefault() : n.returnValue = !0
    },
    stopEvent: function(n) {
      this.stopPropagation(n),
      this.preventDefault(n)
    }
  },
  n.pageTop = function() {
    var n = document,
    t = /iPad|iPhone/i.test(navigator.userAgent.toLowerCase()) == !0 ? window.pageYOffset: Math.max(n.documentElement.scrollTop, n.body.scrollTop);
    return n.documentElement.clientHeight + t
  },
  n.backToTop = function(t, i, r) {
    function f() {
      $(document).scrollTop() > i ? u.fadeIn(r) : u.fadeOut(r)
    }
    i = i || 0,
    r = r || 100;
    var u = $(t);
    u.click(function() {
      $("html, body").animate({
        scrollTop: 0
      },
      r)
    }),
    f(),
    $(window).bind("scroll resize", n.throttle(f, 200))
  }
} (IMH.ns("utils")),
function(n) {
  pVars.page = function() {
    var t = n.getQuery("p");
    return t = t <= 0 ? 1 : t >= cInfo.len ? cInfo.len: t,
    parseInt(t, 10)
  } (),
  pVars.dblClick = function() {
    try {
      var t = n.cookie("dblck");
      return (t == null || t == "") && (n.cookie("dblck", 1, {
        expires: 365,
        path: "/"
      }), t = 1),
      t
    } catch(i) {
      return 1
    }
  } (),
  pVars.curServ = function() {
    var t, i;
    try {
      return t = n.cookie("imgHost"),
      t == null || t == "" ? (i = Math.floor(Math.random() * pVars.priServ), n.cookie("imgHost", i, {
        expires: 365,
        path: "/"
      }), t = i) : t = parseInt(t, 10),
      t > pVars.servsLen ? pVars.defServ: t <= 0 ? 0 : t
    } catch(r) {
      return n.cookie("imgHost", "", {
        expires: -365,
        path: "/"
      }),
      pVars.defServ
    }
  } (),
  pVars.skin = function() {
    try {
      var t = n.cookie("skin");
      return t == null || t == "" ? n.cookie("skin", pVars.skin, {
        expires: 365,
        path: "/"
      }) : t = parseInt(t, 10),
      t > 6 ? pVars.skin: t <= 0 ? 0 : t
    } catch(i) {
      return n.cookie("skin", pVars.skin, {
        expires: 365,
        path: "/"
      }),
      pVars.skin
    }
  } (),
  $("#pageSelect").val(pVars.page),
  $("#pageCurrent").html(pVars.page),
  pVars.dblClick != 1 && $("#mouseAct").addClass("mouse-click")
} (IMH.utils),
function(n, t, i) {
  n.Suggest = function(n) {
    function l() {
      if (t >= 0) window.location.href = site_url+"/index/comic/" + i("#show" + t).attr("rel") + "/";
      else {
        var n = i.trim(e.val());
        if (n == r.tips.placeholder || n == "") return e.focus(),
        window.alert(r.tips.alert),
        !1;
        window.location.href = site_url+"/search/index/" + escape(n)
      }
    }
    function y(n, t) {
      var r = [],
      u,
      i;
      for (u in n) i = n[u],
      r.push('<li id="show' + u + '" rel="' + i.id + '" title="' + i.title + '" onclick="location.href=\''+site_url+'/index/comic/' + i.id + "/'\">"),
      r.push(i.status),
      r.push('<a href="'+site_url+'/index/comic/' + i.id + '">' + i.title.replace(new RegExp("(" + t + ")", "gi"), "<strong>$1<\/strong>") + "<\/a> <i>[" + i.author.replace(new RegExp("(" + t + ")", "gi"), "<strong>$1<\/strong>") + "]<\/i>"),
      r.push("<\/li>");
      return r.join("")
    }
    function p(n) {
      o[n] ? a(o[n], n) : i.ajax({
        type: "POST",
        url: r.url,
        data: "s=1&key=" + escape(n),
        dataType: "json",
        success: function(t) {
          a(t, n)
        }
      })
    }
    function a(n, r) {
      t = -1,
      u.html("<ul>" + y(n, r) + "<\/ul>"),
      n.length > 0 ? u.show() : u.hide();
      var e = u.find("li");
      f = e.length,
      o[r] = n,
      o.length > 10 && o.pop(),
      e.mouseenter(function() {
        e.removeClass("selected"),
        i(this).addClass("selected")
      })
    }
    function c() {
      if (t < -1 ? t = f - 1 : t >= f && (t = -1), u.find("li").removeClass("selected"), t == -1) e.val(h);
      else {
        var n = i("#show" + t);
        i(n).addClass("selected"),
        i(e).val(i(n).attr("title"))
      }
    }
    function v() {
      s && clearTimeout(s),
      s = window.setTimeout(function() {
        var n = i.trim(e.val());
        h != n && (h = n, n != "" ? p(n) : (t = -1, f = 0, u.html("").hide()))
      },
      r.delay)
    }
    this.keyId = n.keyword || "txtKey",
    this.btnId = n.button || "btnSend",
    this.showId = n.result || "suggest",
    this.delay = n.delay || 200,
    this.tips = {
      alert: n.alert || "请输入要你要搜索的漫画",
      placeholder: n.placeholder || "可输入漫画或作者名称或拼音"
    },
    this.url = n.url || site_url+"/search/index/";
    var r = this,
    t = -1,
    f = 0,
    s, o = [],
    h = "",
    e = i("#" + r.keyId),
    w = i("#" + r.btnId),
    u = i("#" + r.showId);
    this.init = function() {
      e.val(r.tips.placeholder).css("color", "#ccc").focus(function() {
        i(this).val() === r.tips.placeholder && i(this).val("").css("color", "#333")
      }).blur(function() {
        i(this).val() === "" && i(this).val(r.tips.placeholder).css("color", "#ccc")
      }),
      i("#" + r.keyId).keyup(function(n) {
        var i, e;
        if (n.stopPropagation(), i = n.keyCode, i == IMH.KEY.RETURN) l();
        else if (e = document.getElementById(r.showId).style.display != "none", e) switch (i) {
        case IMH.KEY.ESC:
          t != -1 ? (t = -1, c()) : u.hide();
          break;
        case IMH.KEY.UP:
          t--,
          c();
          break;
        case IMH.KEY.DOWN:
          t++,
          c();
          break;
        default:
          v()
        } else switch (i) {
        case IMH.KEY.DOWN:
        case IMH.KEY.UP:
          f > 0 && u.show();
          break;
        default:
          v()
        }
      }).blur(function() {
        setTimeout(function() {
          u.hide()
        },
        300)
      }).focus(function() {
        f > 0 && u.show()
      }),
      i("#" + r.btnId).click(function() {
        l()
      })
    }
  },
  n.message = function() {
    var n = !1;
    return {
      append: function() {
        n = !0;
        var r = '<div id="imh-msg-box" class="imh-msg-box"><div id="imh-msg-cont" class="imh-msg-cont"><\/div><\/div>';
        t.browser.isIE6 && (r = '<div id="imh-msg-box" class="imh-msg-box"><iframe frameborder="0" class="imh-msg-iframe"><\/iframe><div id="imh-msg-cont" class="imh-msg-cont"><\/div><\/div>'),
        i("body").append(r)
      },
      show: function(t, r) {
        n === !1 && (this.append(), i("#imh-msg-box").show().center()),
        i("#imh-msg-box").show(),
        i("#imh-msg-cont").html("<span>" + t + "<\/span>" + t),
        r = r || 0,
        r > 0 && setTimeout(function() {
          i("#imh-msg-box").fadeOut()
        },
        r)
      },
      hide: function(n, t) {
        n = n || "",
        t = t || 0,
        n != "" && i("#imh-msg-cont").html("<span>" + n + "<\/span>" + n),
        t > 0 ? setTimeout(function() {
          i("#imh-msg-box").fadeOut()
        },
        t) : i("#imh-msg-box").fadeOut()
      }
    }
  } (),
  n.chapter = function() {
    function f(n) {
      i.getJSON(t.url + "?cb=?", {
        bid: cInfo.bid,
        cid: cInfo.cid
      },
      n)
    }
    function e(i, u) {
      i = i || 2e3,
      u = u || t.tip_failed,
      r && clearTimeout(r),
      r = setTimeout(function() {
        n.message.hide(u, i)
      },
      t.timeout)
    }
    function u(i) {
      e(2e3),
      n.message.show(i === 1 ? t.tip_next: t.tip_prev),
      f(function(u) {
        r && clearTimeout(r),
        1 == 1 ? i === 1 ? cInfo.n == 0 ? n.message.hide(cInfo.finished == 0 ? t.tip_last: t.tip_end, 2e3) : location.href = site_url+"/index/vol/" + cInfo.bid + "/" + cInfo.n + "/1": cInfo.p == 0 ? n.message.hide(t.tip_first, 2e3) : location.href = site_url+"/index/vol/" + cInfo.bid + "/" + cInfo.p + "/1": n.message.hide(t.tip_failed, 2e3)
      })
    }
    var t = {
      url: site_url+"/pages/chapter",
      timeout: 5e3,
      tip_next: "正在进入下一章节，请稍候....",
      tip_prev: "正在返回上一章节，请稍候....",
      tip_last: "这是本作品最新一章，敬请关注下次更新。",
      tip_end: "漫画已完结，这是本作品最后一章了。",
      tip_first: "这是本作品第一章，没有上一章哦。",
      tip_failed: "抱歉，章节获取失败，请稍后重试。"
    },
    r;
    return {
      next: function() {
        cInfo.n == 0 ? n.message.hide(cInfo.finished == 0 ? t.tip_last: t.tip_end, 2e3) : location.href = site_url+"/index/vol/" + cInfo.bid + "/" + cInfo.n + "/1"
      },
      prev: function() {
        cInfo.p == 0 ? n.message.hide(t.tip_first, 2e3) : location.href = site_url+"/index/vol/" + cInfo.bid + "/" + cInfo.p + "/1"
      }
    }
  } (),
  n.history = function() {
    function r(n) {
      var i = n * 1e3,
      r = new Date(i),
      o = new Date,
      s = Date.parse(o.toDateString()),
      e = o.getTime(),
      h = 36e5,
      u = 0,
      f = function(n) {
        return n < 10 ? "0" + n: n
      },
      t = [];
      if (s > i) {
        u = Math.ceil((s - i) / 864e5);
        switch (u) {
        case 1:
          t.push("昨天 ");
          break;
        case 2:
          t.push("前天 ");
          break;
        default:
          t.push(f(r.getMonth() + 1), "月", f(r.getDate()), "日")
        }
        t.push(f(r.getHours()) + ":" + f(r.getMinutes()))
      } else e - i < 6e4 ? (u = Math.ceil((e - i) / 1e3), t.push(u, "秒前")) : (u = Math.ceil((e - i) / h), u == 1 ? t.push(Math.floor((e - i) % h / 6e4), "分钟前") : t.push("今天 ", f(r.getHours()), ":", f(r.getMinutes())));
      return t.join("")
    }
    var n = {
      maxLen: 20,
      len: 0,
      cname: "read",
      cvalue: [],
      got: !1,
      init: !1
    };
    return {
      get: function() {
        if (n.got === !1) {
          var i = t.cookie(n.cname);
          i != null && i != "" && (n.cvalue = i.split("$"), n.len = n.cvalue.length),
          n.got = !0
        }
      },
      add: function(i) {
        var u, r, f;
        if (this.get(), n.len > 0) {
          for (u = -1, r = 0; r < n.len; r++) if (("|" + n.cvalue[r]).indexOf("|" + i.b + "|") == 0) {
            u = r;
            break
          }
          u != -1 && n.cvalue.splice(u, 1),
          n.len >= n.maxLen && n.cvalue.splice(0, n.len - n.maxLen + 1)
        }
        f = parseInt((new Date).getTime() / 1e3),
        n.cvalue.push([i.b, i.bi, i.c, i.ci, i.p, f].join("|")),
        n.len = n.cvalue.length,
        t.cookie(n.cname, n.cvalue.join("$"), {
          expires: 365,
          path: "/"
        })
      },
      remove: function(r, u) {
        if (n.cvalue.splice(r, 1), n.len--, n.len <= 0 ? t.cookie(n.cname, null, {
          expires: -365,
          path: "/"
        }) : t.cookie(n.cname, n.cvalue.join("$"), {
          expires: 365,
          path: "/"
        }), i(u).parent().hide(200), n.len <= 0) {
          i("#hList").html('<div class="hNone">暂时没有观看记录!<\/div>');
          return
        }
        n.len <= 5 && i(".hList").removeClass("hListMax")
      },
      clear: function() {
        t.cookie(n.cname, "", {
          expires: -365,
          path: "/"
        }),
        n.len = 0,
        n.cvalue = [],
        i("#hList").html('<div class="hNone">暂时没有观看记录!<\/div>')
      },
      init: function() {
        var t = this;
        i("#history").hover(function() {
          i(this).addClass("more-hover"),
          n.init == !1 && t.format()
        },
        function() {
          i(this).removeClass("more-hover")
        })
      },
      format: function() {
        var u, f, t, o, e;
        if (this.get(), n.init = !0, u = [], n.len > 0) for (f = n.len - 1; f >= 0; f--) t = n.cvalue[f].split("|"),
        u.push('<li><a class="hDelete fr" title="删除" rel="' + f + '"><span>删除<\/span><\/a>'),
        u.push('<a class="book" href="/comic/' + t[1] + '/">' + t[0] + '<\/a> <em>/<\/em> <a href="/comic/' + t[1] + "/list_" + t[3] + '.html" class="red">' + t[2] + "<\/a>"),
        u.push('<div><span class="fr" style="line-height:1.6em;"><a href="/comic/' + t[1] + "/list_" + t[3] + ".html?p=" + t[4] + '">继续观看<\/a><\/span><span class="hTime">上次于 ' + r(t[5]) + " 观看<\/span><\/div><\/li>");
        o = this,
        e = n.len,
        e == 0 ? i("#hList").html('<div class="hNone">暂时没有观看记录!<\/div>') : (i("#hList").html('<div class="hList"><ul>' + u.join("") + "<\/ul><\/div>"), i(".hList li").hover(function() {
          i(this).addClass("hHover")
        },
        function() {
          i(this).removeClass("hHover")
        }), i("#hList .hDelete").click(function() {
          o.remove(i(this).attr("rel"), this)
        }), e > 6 && i(".hList").addClass("hListMax"))
      }
    }
  } (),
  n.page = {
    next: function() {
      var t = pVars.page + 1;
      t > cInfo.len ? n.chapter.next() : location.href = cInfo.burl + "?p=" + t,
      window.event.returnValue = !1
    },
    prev: function() {
      var t = pVars.page - 1;
      t <= 0 ? n.chapter.prev() : location.href = cInfo.burl + "?p=" + t,
      window.event.returnValue = !1
    },
    pager: function(n) {
      function s() {
        var t = Math.ceil(n.nde / 2),
        i = n.pc - n.nde,
        r = n.cp > t ? Math.max(Math.min(n.cp - t, i), 0) : 0,
        u = n.cp > t ? Math.min(n.cp + t, n.pc) : Math.min(n.nde, n.pc);
        return [r, u]
      }
      var e, o, t;
      n = i.extend({
        cp: 0,
        pc: 0,
        nde: 7,
        nee: 2
      },
      n || {});
      var r = [],
      f = function(t) {
        t = t < 0 ? 0 : t < n.pc ? t: n.pc - 1,
        t === n.cp ? r.push('<span class="current">' + (t + 1) + "<\/span>") : r.push('<a href="' + cInfo.burl + "?p=" + (t + 1) + '">' + (t + 1) + "<\/a>")
      },
      u = s();
      if (r.push('<a class="prevC btn-red prev" href="javascript:;">上一章<\/a>'), n.cp === 0 ? r.push('<span class="disabled">上一页<\/span>') : r.push('<a class="prevP btn-red prev" href="javascript:;">上一页<\/a>'), u[0] > 0) {
        for (e = Math.min(n.nee, u[0]), t = 0; t < e; t++) f(t);
        n.nee < u[0] && r.push("<span>...<\/span>")
      }
      for (t = u[0]; t < u[1]; t++) f(t);
      if (u[1] < n.pc) for (n.pc - n.nee > u[1] && r.push("<span>...<\/span>"), o = Math.max(n.pc - n.nee, u[1]), t = o; t < n.pc; t++) f(t);
      return n.cp === n.pc - 1 ? r.push('<span class="disabled">下一页<\/span>') : r.push('<a class="nextP btn-red next" href="javascript:;">下一页<\/a>'),
      r.push('<a class="nextC btn-red next" href="javascript:;">下一章<\/a>'),
      r.join("")
    }
  },
  n.img = function() {
    function o(n) {
      if (n = n || !1, n === !1) f.push(r);
      else {
        var t = Math.floor(Math.random() * pVars.priServ);
        if (("," + f.toString() + ",").indexOf("," + t + ",") == -1) f.push(t),
        r = t;
        else if (f.length >= pVars.priServ) r = pVars.priServ;
        else return o(!0)
      }
      return pVars.servs[r].host
    }
    function a(n) {
      t.cookie("imgHost", String(n), {
        expires: 365,
        path: "/"
      }),
      location.reload()
    }
    function v() {
      var t = [],
      n,
      f,
      u;
      for (t.push("<ul>"), n = 0, f = pVars.servs.length; n < f; n++) u = n === r ? ['class="current"', "√"] : ["", ""],
      t.push("<li " + u[0] + ">" + u[1] + pVars.servs[n].name + "<\/li>");
      t.push("<\/ul>"),
      i("#hostList").html(t.join("")).find("li").live("click",
      function() {
        a(i(this).index())
      })
    }
    function y(n, t, r) {
      for (var f, u = t; u <= t + n; u++) {
        if (u >= cInfo.len) break;
        f = encodeURI(cInfo.files[u - 1]),
        i("<img />")[0].src = f
      }
    }
    function h(n, t) {
      var f = "http://" + o(!0) + e + t,
      r = new Image;
      r.onload = function() {
        r = r.onerror = null,
        i(n).attr("src", f)
      },
      r.onerror = function() {
        u++,
        r = r.onload = null,
        u <= pVars.priServ ? h(n, t) : (s.hide(), i("#mainLeft").append(pVars.IMG_ERR_MSG))
      },
      r.src = f
    }
    function c(n) {
      var r = document.documentElement.clientWidth <= 1200,
      t = !1;
      i(n).bind("mousedown",
      function(n) {
        var f, e, u = i(document),
        o = function(n) {
          return u.scrollTop(u.scrollTop() + e - n.pageY),
          r && u.scrollLeft(u.scrollLeft() + f - n.pageX),
          !1
        };
        return i(this).css("cursor", "move"),
        r && (f = n.pageX),
        e = n.pageY,
        i(this).bind("mousemove", o),
        t = !0,
        !1
      }).bind("mouseup mouseleave",
      function() {
        t && (i(this).css("cursor", "pointer").unbind("mousemove"), t = !1)
      })
    }
    function p(n) {
      i(n).css("cursor", "pointer").unbind("mousedown mousemove mouseup mouseleave")
    }
    function l(t, r) {
      r == 1 ? (i(t).unbind("mouseup").dblclick(n.page.next), c(t)) : (p(t), i(t).unbind("dblclick").bind("mouseup",
      function(t) {
        var i = t.button || t.which;
        return i == 1 && n.page.next(),
        (i == 2 || i == 3) && n.page.prev(),
        !1
      }))
    }
    function w(r) {
      var f = o(),
      a = encodeURI(cInfo.files[pVars.page - 1]),
      v = a;
      i("#mainLeft").append('<img src="' + v + '" id="comic" />'),
      i(r).bind("load",
      function() {
        u === 0 && y(1, pVars.page, f),
        s.hide()
      }).bind("error",
      function() {
        u++,
        h(r, a)
      }),
      t.browser.isMobile || pVars.dblClick != 1 ? l(r, 0) : (i(r).dblclick(n.page.next).css("cursor", "pointer"), c(r))
    }
    var u = 0,
    f = [],
    r = pVars.curServ,
    e = "",
    s = i("#imgLoad,#imgLoadMask");
    return {
      init: function() {
        w("#comic"),
        v()
      },
      setAct: function(n) {
        l(i("#comic"), n)
      }
    }
  } (),
  n.skin = function(n) {
    function u(t) {
      t === !0 ? (i(n).eq(pVars.skin).addClass("skin-on"), i("#title").addClass("title-" + r[pVars.skin])) : (i(n).eq(pVars.skin).removeClass("skin-on"), i("#title").removeClass("title-" + r[pVars.skin]))
    }
    function e() {
      i("html,body").css("background-color", f[pVars.skin]),
      i("#title").addClass("title-" + r[pVars.skin])
    }
    var f = ["#ffffff", "#000000", "#40acfe", "#b8dc59", "#fb54c6", "#fb8629", "#b739fa"],
    r = ["white", "black", "blue", "green", "pink", "orange", "purple"];
    typeof f[pVars.skin] != undefined && (e(), u(!0)),
    i(n).each(function(n) {
      i(this).click(function() {
        u(!1),
        pVars.skin = n,
        t.cookie("skin", n, {
          expires: 365,
          path: "/"
        }),
        u(!0),
        e()
      })
    })
  },
  n.bdShare = function(n) {
    var t = [];
    t.push('<div id="bdshare" class="bdshare_t bds_tools_32  get-codes-bdshare">'),
    t.push('<a class="bds_qzone"><\/a>'),
    t.push('<a class="bds_tsina"><\/a>'),
    t.push('<a class="bds_tqq"><\/a>'),
    t.push('<a class="bds_renren"><\/a>'),
    t.push('<a class="bds_tqf"><\/a>'),
    t.push('<a class="bds_sqq"><\/a>'),
    t.push('<a class="bds_mshare"><\/a>'),
    t.push('<span class="bds_more"><\/span>'),
    t.push("<\/div>"),
    i(n).html(t.join(""))
  },
  n.foldAct = function() {
    var n;
    /*!t.browser.isMobile&&t.cookie("visited")<=10&&i("#foldAct").hide(),*/
    i("#foldAct").click(function() {
      return i(this).hasClass("pickup") ? (i(this).attr("title", "收起更多").text("收起更多").removeClass("pickup"), i("#mainRight").show(), i("#mainLeft").width(n)) : (n || (n = i("#mainLeft").width()), i(this).attr("title", "展开更多").text("展开更多").addClass("pickup"), i("#mainRight").hide(), i("#mainLeft").width(962)),
      !1
    }),
    t.browser.isMobile && i("#foldAct").click()
  }
} (IMH.ns("core"), IMH.utils, jQuery),
function(n, t, i) {
  function u(n) {
    var t = n.src + "?v=" + r;
    switch (n.type) {
    case "iframe":
      return "<iframe scrolling='no' frameborder='0' width='" + n.width + "' height='" + n.height + "' src='" + t + "'><\/iframe>";
    case "htm":
    case "html":
      return n.code;
    case "img":
      return "<a href='" + this.href + "' target='_blank'><img alt='" + n.alt + "' src='" + t + "' border='0' width='" + n.width + "' height='" + n.height + "' /><\/a>";
    default:
      return ""
    }
  }
  function f(n, r) {
    if (r.lazyload = r.lazyload || !1, r.lazyload == !0) {
      var f = !1,
      e = function() {
        if (f == !1) {
          var e = t.pageTop() + 100;
          i(n).offset().top <= e && f == !1 && (i(n).html(u(r)), f = !0)
        }
      };
      e(),
      i(window).bind("scroll resize", t.throttle(e, 200))
    } else i(n).html(u(r))
  }
  var r = r ||
  function() {
    var t = new Date,
    n = [];
    return n.push(t.getFullYear()),
    n.push(t.getMonth() + 1),
    n.push(t.getDate()),
    n.push(t.getHours()),
    n.join("")
  } ();
  n.init = function(r) {
    for (var s = r.length || 0,
    u, o, e = 0; e < s; e++) u = r[e],
    u.mobile = u.mobile || !1,
    o = i("#imh-" + e),
    undefined === typeof u || u == null || u.enable == !1 || t.browser.isMobile && u.mobile == !1 ? i(o).hide() : f(o, u);
    n.loadUpdate()
  },
  n.loadUpdate = function() {
    var n = !1,
    t = function() {
      var t = IMH.utils.pageTop() + 30;
      i("#uptList").offset().top <= t && n == !1 && (i.get("", {
        ts: r
      },
      function(n) {
        i("#uptList").html("<ul>" + n + "<\/ul>")
      }), n = !0)
    };
    t(),
    i(window).bind("scroll resize", IMH.utils.throttle(t, 200))
  }
} (IMH.ns("adLoader"), IMH.utils, jQuery),
function(n, t, i) {
  n("#sub-nav").hover(function() {
    n(this).find("div").show()
  },
  function() {
    n(this).find("div").hide()
  }),
  i.history.init(),
  i.img.init(),
  new i.Suggest({
    keyword: "txtKey",
    button: "btnSend",
    result: "sList"
  }).init(),
  i.skin("#skinList li"),
  n("#pagination").html(i.page.pager({
    cp: pVars.page - 1,
    pc: cInfo.len
  }));
  n(".nextP").on("click",
  function() {
    return i.page.next(),
    !1
  });
  n(".prevP").on("click",
  function() {
    return i.page.prev(),
    !1
  });
  n(".nextC").on("click",
  function() {
    i.chapter.next()
  });
  n(".prevC").on("click",
  function() {
    i.chapter.prev()
  });
  i.bdShare("#share");
  n("#mouseAct").on("click",
  function() {
    var r = 1,
    u;
    n(this).hasClass("mouse-click") ? (r = 1, n(this).removeClass("mouse-click")) : (r = 0, n(this).addClass("mouse-click")),
    t.cookie("dblck", r, {
      expires: 365,
      path: "/"
    }),
    i.img.setAct(r),
    u = r == 1 ? "进入“鼠标双击翻页”模式，允许拖动图片。": "进入“鼠标单击翻页”模式，不能拖动图片。",
    i.message.show(u, 2600)
  });
  i.foldAct(),
  t.browser.isMobile ? (n("#tips").hide(), n("#sidebar").hide()) : (n(document).bind("keydown", "left", i.page.prev).bind("keydown", "right", i.page.next).bind("keydown", "z", i.chapter.prev).bind("keydown", "x", i.chapter.next), n("#sidebar a").hover(function() {
    n(this).animate({
      width: "106px"
    },
    100)
  },
  function() {
    n(this).animate({
      width: "32px"
    },
    100)
  }), n("#toFav").click(function() {
    var i = n("#title h1").text() + " - " + n("#title h2").text() + " - "+site_name,
    r = location.href;
    t.addToFav(i, r)
  }), n("#toFeedback").click(function() {
    openWindow(site_url+"/support/jubao/?r=" + escape(location.href) + "&s=" + pVars.curServ, 560, 580)
  }), t.backToTop("#toTop", 100))
} (jQuery, IMH.utils, IMH.core),
$(document).ready(function() {
  $("#bd_160x600").appendTo("#optimus").show(),
  setTimeout(function() {
    IMH.core.history.add({
      b: cInfo.bname,
      bi: cInfo.bid,
      c: cInfo.cname,
      ci: cInfo.cid,
      p: pVars.page
    })
  },
  1e3),
  pVars.page == 1 && $.get(site_url+"/api/user/count/", {
    bookId: cInfo.bid,
    chapterId: cInfo.cid
  })
}),
document.oncontextmenu = function() {
  return ! 1
},
window.onerror = function() {
  return ! 0
};
window.setTimeout(function(){
 $.get('/api/add_comic_pv/'+comicid+'/'+volid);
}, 5000);
