<!DOCTYPE html>
<!--headTrap<body></body><head></head><html></html>-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">


    <script nonce="506989924" type="text/javascript">
        window.logs = {
            pagetime: {}
        };
        window.logs.pagetime['html_begin'] = (+new Date());
    </script>

    <script nonce="506989924" type="text/javascript">
        var biz = "MzAwOTUyMDA4Mg==" || "";
        var sn = "" || "" || "43474033593bdaea288c6c7bddad6190";
        var mid = "503370333" || "" || "503370333";
        var idx = "1" || "" || "1";
        window.__allowLoadResFromMp = true;

    </script>
    <script nonce="506989924" type="text/javascript">
        var page_begintime = +new Date, is_rumor = "", norumor = "";
        1 * is_rumor && !(1 * norumor) && biz && mid && (document.referrer && -1 != document.referrer.indexOf("mp.weixin.qq.com/mp/rumor") || (location.href = "http://mp.weixin.qq.com/mp/rumor?action=info&__biz=" + biz + "&mid=" + mid + "&idx=" + idx + "&sn=" + sn + "#wechat_redirect")),
            document.domain = "qq.com";
    </script>
    <script nonce="506989924" type="text/javascript">
        var MutationObserver = window.WebKitMutationObserver || window.MutationObserver || window.MozMutationObserver, isDangerSrc = function (t) {
            if (t) {
                var e = t.match(/http(?:s)?:\/\/([^\/]+?)(\/|$)/);
                if (e && !/qq\.com(\:8080)?$/.test(e[1]) && !/weishi\.com$/.test(e[1]))return !0;
            }
            return !1;
        }, ishttp = 0 == location.href.indexOf("http://");
        -1 == location.href.indexOf("safe=0") && ishttp && "function" == typeof MutationObserver && "mp.weixin.qq.com" == location.host && (window.__observer_data = {
            count: 0,
            exec_time: 0,
            list: []
        }, window.__observer = new MutationObserver(function (t) {
            window.__observer_data.count++;
            var e = new Date, r = [];
            t.forEach(function (t) {
                for (var e = t.addedNodes, o = 0; o < e.length; o++) {
                    var n = e[o];
                    if ("SCRIPT" === n.tagName) {
                        var i = n.src;
                        isDangerSrc(i) && (window.__observer_data.list.push(i), r.push(n)), !i && window.__nonce_str && n.getAttribute("nonce") != window.__nonce_str && (window.__observer_data.list.push("inlinescript_without_nonce"),
                            r.push(n));
                    }
                }
            });
            for (var o = 0; o < r.length; o++) {
                var n = r[o];
                n.parentNode && n.parentNode.removeChild(n);
            }
            window.__observer_data.exec_time += new Date - e;
        }), window.__observer.observe(document, {
            subtree: !0,
            childList: !0
        })), function () {
            if (-1 == location.href.indexOf("safe=0") && Math.random() < .01 && ishttp && HTMLScriptElement.prototype.__lookupSetter__ && "undefined" != typeof Object.defineProperty) {
                window.__danger_src = {
                    xmlhttprequest: [],
                    script_src: [],
                    script_setAttribute: []
                };
                var t = "$" + Math.random();
                HTMLScriptElement.prototype.__old_method_script_src = HTMLScriptElement.prototype.__lookupSetter__("src"),
                    HTMLScriptElement.prototype.__defineSetter__("src", function (t) {
                        t && isDangerSrc(t) && window.__danger_src.script_src.push(t), this.__old_method_script_src(t);
                    });
                var e = "element_setAttribute" + t;
                Object.defineProperty(Element.prototype, e, {
                    value: Element.prototype.setAttribute,
                    enumerable: !1
                }), Element.prototype.setAttribute = function (t, r) {
                    "SCRIPT" == this.tagName && "src" == t && isDangerSrc(r) && window.__danger_src.script_setAttribute.push(r),
                        this[e](t, r);
                };
            }
        }();
    </script>

    <link rel="dns-prefetch" href="//res.wx.qq.com">
    <link rel="dns-prefetch" href="//mmbiz.qpic.cn">
    <link rel="shortcut icon" type="image/x-icon"
          href="//res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/common/favicon22c41b.ico">
    <script nonce="506989924" type="text/javascript">
        String.prototype.html = function (encode) {
            var replace = ["&#39;", "'", "&quot;", '"', "&nbsp;", " ", "&gt;", ">", "&lt;", "<", "&amp;", "&", "&yen;", "¥"];
            if (encode) {
                replace.reverse();
            }
            for (var i = 0, str = this; i < replace.length; i += 2) {
                str = str.replace(new RegExp(replace[i], 'g'), replace[i + 1]);
            }
            return str;
        };

        window.isInWeixinApp = function () {
            return /MicroMessenger/.test(navigator.userAgent);
        };

        window.getQueryFromURL = function (url) {
            url = url || 'http://qq.com/s?a=b#rd';
            var tmp = url.split('?'),
                query = (tmp[1] || "").split('#')[0].split('&'),
                params = {};
            for (var i = 0; i < query.length; i++) {
                var arg = query[i].split('=');
                params[arg[0]] = arg[1];
            }
            if (params['pass_ticket']) {
                params['pass_ticket'] = encodeURIComponent(params['pass_ticket'].html(false).html(false).replace(/\s/g, "+"));
            }
            return params;
        };

        (function () {
            var params = getQueryFromURL(location.href);
            window.uin = params['uin'] || "" || '';
            window.key = params['key'] || "" || '';
            window.wxtoken = params['wxtoken'] || '';
            window.pass_ticket = params['pass_ticket'] || '';
        })();

        function wx_loaderror() {
            if (location.pathname === '/bizmall/reward') {
                new Image().src = '/mp/jsreport?key=96&content=reward_res_load_err&r=' + Math.random();
            }
        }

    </script>

    <title>农产品质量查询</title>

    <style>html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 1.6
        }

        body {
            -webkit-touch-callout: none;
            font-family: -apple-system-font, "Helvetica Neue", "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", sans-serif;
            background-color: #f3f3f3;
            line-height: inherit
        }

        body.rich_media_empty_extra {
            background-color: #fff
        }

        body.rich_media_empty_extra .rich_media_area_primary:before {
            display: none
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
            font-size: 16px
        }

        * {
            margin: 0;
            padding: 0
        }

        a {
            color: #607fa6;
            text-decoration: none
        }

        .rich_media_inner {
            font-size: 16px;
            word-wrap: break-word;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto
        }

        .rich_media_area_primary {
            position: relative;
            padding: 20px 15px 15px;
            background-color: #fff
        }

        .rich_media_area_primary:before {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 1px;
            border-top: 1px solid #e5e5e5;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5);
            top: auto;
            bottom: -2px
        }

        .rich_media_area_primary .original_img_wrp {
            display: inline-block;
            font-size: 0
        }

        .rich_media_area_primary .original_img_wrp .tips_global {
            display: block;
            margin-top: .5em;
            font-size: 14px;
            text-align: right;
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal
        }

        .rich_media_area_extra {
            padding: 0 15px 0
        }

        .rich_media_title {
            line-height: 1.4;
            font-weight: 400;
            font-size: 24px
        }

        .rich_media_meta_list {
            margin-bottom: 18px;
            line-height: 20px;
            font-size: 0
        }

        .rich_media_meta_list em {
            font-style: normal
        }

        .rich_media_meta {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
            margin-bottom: 10px;
            font-size: 16px
        }

        .meta_original_tag {
            display: inline-block;
            vertical-align: middle;
            padding: 1px .5em;
            border: 1px solid #9e9e9e;
            color: #8c8c8c;
            border-top-left-radius: 20% 50%;
            -moz-border-radius-topleft: 20% 50%;
            -webkit-border-top-left-radius: 20% 50%;
            border-top-right-radius: 20% 50%;
            -moz-border-radius-topright: 20% 50%;
            -webkit-border-top-right-radius: 20% 50%;
            border-bottom-left-radius: 20% 50%;
            -moz-border-radius-bottomleft: 20% 50%;
            -webkit-border-bottom-left-radius: 20% 50%;
            border-bottom-right-radius: 20% 50%;
            -moz-border-radius-bottomright: 20% 50%;
            -webkit-border-bottom-right-radius: 20% 50%;
            font-size: 15px;
            line-height: 1.1
        }

        .meta_enterprise_tag img {
            width: 30px;
            height: 30px !important;
            display: block;
            position: relative;
            margin-top: -3px;
            border: 0
        }

        .rich_media_meta_text {
            color: #8c8c8c
        }

        span.rich_media_meta_nickname {
            display: none
        }

        .rich_media_thumb_wrp {
            margin-bottom: 6px
        }

        .rich_media_thumb_wrp .original_img_wrp {
            display: block
        }

        .rich_media_thumb {
            display: block;
            width: 100%
        }

        .rich_media_content {
            overflow: hidden;
            color: #3e3e3e
        }

        .rich_media_content * {
            max-width: 100% !important;
            box-sizing: border-box !important;
            -webkit-box-sizing: border-box !important;
            word-wrap: break-word !important
        }

        .rich_media_content p {
            clear: both;
            min-height: 1em
        }

        .rich_media_content em {
            font-style: italic
        }

        .rich_media_content fieldset {
            min-width: 0
        }

        .rich_media_content .list-paddingleft-2 {
            padding-left: 30px
        }

        .rich_media_content blockquote {
            margin: 0;
            padding-left: 10px;
            border-left: 3px solid #dbdbdb
        }

        img {
            height: auto !important
        }

        @media screen and (device-aspect-ratio: 2/3), screen and (device-aspect-ratio: 40/71) {
            .meta_original_tag {
                padding-top: 0
            }
        }

        @media (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
            .mm_appmsg .rich_media_inner, .mm_appmsg .rich_media_meta, .mm_appmsg .discuss_list, .mm_appmsg .rich_media_extra, .mm_appmsg .title_tips .tips {
                font-size: 15px
            }

            .mm_appmsg .meta_original_tag {
                font-size: 15px
            }
        }

        @media (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) {
            .mm_appmsg .rich_media_title {
                font-size: 25px
            }
        }

        @media screen and (min-width: 1024px) {
            .rich_media {
                width: 740px;
                margin-left: auto;
                margin-right: auto
            }

            .rich_media_inner {
                padding: 20px
            }

            body {
                background-color: #fff
            }
        }

        @media screen and (min-width: 1025px) {
            body {
                font-family: "Helvetica Neue", Helvetica, "Hiragino Sans GB", "Microsoft YaHei", Arial, sans-serif
            }

            .rich_media {
                position: relative
            }

            .rich_media_inner {
                background-color: #fff;
                padding-bottom: 100px
            }
        }

        .radius_avatar {
            display: inline-block;
            background-color: #fff;
            padding: 3px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            overflow: hidden;
            vertical-align: middle
        }

        .radius_avatar img {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            background-color: #eee
        }

        .cell {
            padding: .8em 0;
            display: block;
            position: relative
        }

        .cell_hd, .cell_bd, .cell_ft {
            display: table-cell;
            vertical-align: middle;
            word-wrap: break-word;
            word-break: break-all;
            white-space: nowrap
        }

        .cell_primary {
            width: 2000px;
            white-space: normal
        }

        .flex_cell {
            padding: 10px 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }

        .flex_cell_primary {
            width: 100%;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            box-flex: 1;
            flex: 1
        }

        .original_tool_area {
            display: block;
            padding: .75em 1em 0;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            color: #3e3e3e;
            border: 1px solid #eaeaea;
            margin: 20px 0
        }

        .original_tool_area .tips_global {
            position: relative;
            padding-bottom: .5em;
            font-size: 15px
        }

        .original_tool_area .tips_global:after {
            content: " ";
            position: absolute;
            left: 0;
            bottom: 0;
            right: 0;
            height: 1px;
            border-bottom: 1px solid #dbdbdb;
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5)
        }

        .original_tool_area .radius_avatar {
            width: 27px;
            height: 27px;
            padding: 0;
            margin-right: .5em
        }

        .original_tool_area .radius_avatar img {
            height: 100% !important
        }

        .original_tool_area .flex_cell_bd {
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal
        }

        .original_tool_area .flex_cell_ft {
            font-size: 14px;
            color: #8c8c8c;
            padding-left: 1em;
            white-space: nowrap
        }

        .original_tool_area .icon_access:after {
            content: " ";
            display: inline-block;
            height: 8px;
            width: 8px;
            border-width: 1px 1px 0 0;
            border-color: #cbcad0;
            border-style: solid;
            transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            -ms-transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            -webkit-transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            position: relative;
            top: -2px;
            top: -1px
        }

        .weui_loading {
            width: 20px;
            height: 20px;
            display: inline-block;
            vertical-align: middle;
            -webkit-animation: weuiLoading 1s steps(12, end) infinite;
            animation: weuiLoading 1s steps(12, end) infinite;
            background: transparent url(data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iciIgd2lkdGg9JzEyMHB4JyBoZWlnaHQ9JzEyMHB4JyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj4KICAgIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSJub25lIiBjbGFzcz0iYmsiPjwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjRTlFOUU5JwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoMCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICA8L3JlY3Q+CiAgICA8cmVjdCB4PSc0Ni41JyB5PSc0MCcgd2lkdGg9JzcnIGhlaWdodD0nMjAnIHJ4PSc1JyByeT0nNScgZmlsbD0nIzk4OTY5NycKICAgICAgICAgIHRyYW5zZm9ybT0ncm90YXRlKDMwIDUwIDUwKSB0cmFuc2xhdGUoMCAtMzApJz4KICAgICAgICAgICAgICAgICByZXBlYXRDb3VudD0naW5kZWZpbml0ZScvPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyM5Qjk5OUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSg2MCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9J2luZGVmaW5pdGUnLz4KICAgIDwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjQTNBMUEyJwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoOTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNBQkE5QUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxMjAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCMkIyQjInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxNTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCQUI4QjknCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxODAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDMkMwQzEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyMTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDQkNCQ0InCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEMkQyRDInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEQURBREEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNFMkUyRTInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0Pgo8L3N2Zz4=) no-repeat;
            -webkit-background-size: 100%;
            background-size: 100%
        }

        @-webkit-keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        @keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        .gif_img_wrp {
            display: inline-block;
            font-size: 0;
            position: relative;
            font-weight: 400;
            font-style: normal;
            text-indent: 0;
            text-shadow: none 1px 1px rgba(0, 0, 0, 0.5)
        }

        .gif_img_wrp img {
            vertical-align: top
        }

        .gif_img_tips {
            background: rgba(0, 0, 0, 0.6) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr='#99000000', endcolorstr='#99000000');
            border-top-left-radius: 1.2em 50%;
            -moz-border-radius-topleft: 1.2em 50%;
            -webkit-border-top-left-radius: 1.2em 50%;
            border-top-right-radius: 1.2em 50%;
            -moz-border-radius-topright: 1.2em 50%;
            -webkit-border-top-right-radius: 1.2em 50%;
            border-bottom-left-radius: 1.2em 50%;
            -moz-border-radius-bottomleft: 1.2em 50%;
            -webkit-border-bottom-left-radius: 1.2em 50%;
            border-bottom-right-radius: 1.2em 50%;
            -moz-border-radius-bottomright: 1.2em 50%;
            -webkit-border-bottom-right-radius: 1.2em 50%;
            line-height: 2.3;
            font-size: 11px;
            color: #fff;
            text-align: center;
            position: absolute;
            bottom: 10px;
            left: 10px;
            min-width: 65px
        }

        .gif_img_tips.loading {
            min-width: 75px
        }

        .gif_img_tips i {
            vertical-align: middle;
            margin: -0.2em .73em 0 -2px
        }

        .gif_img_play_arrow {
            display: inline-block;
            width: 0;
            height: 0;
            border-width: 8px;
            border-style: dashed;
            border-color: transparent;
            border-right-width: 0;
            border-left-color: #fff;
            border-left-style: solid;
            border-width: 5px 0 5px 8px
        }

        .gif_img_loading {
            width: 14px;
            height: 14px
        }

        i.gif_img_loading {
            margin-left: -4px
        }

        .gif_bg_tips_wrp {
            position: relative;
            height: 0;
            line-height: 0;
            margin: 0;
            padding: 0
        }

        .gif_bg_tips_wrp .gif_img_tips_group {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 9999
        }

        .gif_bg_tips_wrp .gif_img_tips_group .gif_img_tips {
            top: 0;
            left: 0;
            bottom: auto
        }

        .rich_media_global_msg {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 1em 35px 1em 15px;
            z-index: 1;
            background-color: #c6e0f8;
            color: #8c8c8c;
            font-size: 13px
        }

        .rich_media_global_msg .icon_closed {
            position: absolute;
            right: 15px;
            top: 50%;
            margin-top: -5px;
            line-height: 300px;
            overflow: hidden;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            background: transparent url(/mmbizwap/zh_CN/htmledition/images/icon/appmsg/icon_appmsg_msg_closed_sprite.2x.png) no-repeat 0 0;
            width: 11px;
            height: 11px;
            vertical-align: middle;
            display: inline-block;
            -webkit-background-size: 100% auto;
            background-size: 100% auto
        }

        .rich_media_global_msg .icon_closed:active {
            background-position: 0 -17px
        }

        .preview_appmsg .rich_media_title {
            text-align: center;
        }

        @media screen and (min-width: 1024px) {
            .rich_media_global_msg {
                position: relative;
                margin: 0 20px
            }

            .preview_appmsg .rich_media_title {
                margin-top: 0
            }
        }
        .link-us {
            text-align: center;
        }
    </style>

    <!--[if lt IE 9]>
    <link onerror="wx_loaderror(this)" rel="stylesheet" type="text/css"
          href="//res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/page_mp_article_improve_pc2c9cd6.css">
    <![endif]-->

</head>
<body id="activity-detail" class="zh_CN mm_appmsg">

<script nonce="506989924" type="text/javascript">
    var write_sceen_time = (+new Date());
</script>

<div id="js_article" class="rich_media preview_appmsg">

    <div id="js_top_ad_area" class="top_banner">

    </div>


    <div class="rich_media_inner">
        <div id="page-content">
            <div id="img-content" class="rich_media_area_primary">
                <h2 class="rich_media_title" id="activity-name">
                    太仓万丰村农产品质量查询
                </h2>
                <div class="rich_media_content " id="js_content">
                    <section
                            style="margin: 27px 16px 0px; padding: 8px 16px; border-width: 1px; border-style: solid; border-color: rgb(204, 204, 204); box-shadow: rgb(165, 165, 165) 5px 5px 2px; font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(160, 160, 160); background-color: rgb(255, 255, 240);"
                            class="tn-Powered-by-XIUMI">
                        <section
                                style="margin-top: -1.2em; border-width: initial; border-style: none; border-color: initial;"
                                class="tn-Powered-by-XIUMI"><span
                                    style="display: inline-block; padding: 4px 8px; line-height: 1.4; box-shadow: rgb(165, 165, 165) 4px 4px 2px; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(255, 255, 255); background-color: rgb(142, 201, 101); border-color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI"><section
                                        class="tn-Powered-by-XIUMI">太仓万丰村农产品质量查询</section></span></section>
                        <section style="padding: 6px; font-size: 1em; line-height: 1.4; font-family: inherit;"
                                 class="tn-Powered-by-XIUMI">
                            <section class="tn-Powered-by-XIUMI">{{$cropInfo['crop_name']}}</section>
                            <section class="tn-Powered-by-XIUMI">{{$cropInfo['crop_describe']}}</section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <p></p>
                    <section
                            style="border-width: initial; border-style: none; border-color: initial;"
                            class="tn-Powered-by-XIUMI">
                        <section style="border-color: rgb(249, 110, 87);" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 45%; margin-top: 0.2em; border-width: 1px; border-style: dotted; border-color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="display: inline-block; float: right; width: 45%; margin-top: 0.2em; border-width: 1px; border-style: dotted; border-color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="width: 0.5em; height: 0.5em; background-color: rgb(249, 110, 87); margin: auto; transform: rotate(45deg);"
                                    class="tn-Powered-by-XIUMI"></section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;"
                             class="tn-Powered-by-XIUMI">
                        <section style="height: 0.1em; background-color: rgb(255, 255, 255);"
                                 class="tn-Powered-by-XIUMI"></section>
                        <section
                                style="margin-top: 0.3em; margin-bottom: 0.3em; height: 0.2em; background-color: rgb(255, 255, 255);"
                                class="tn-Powered-by-XIUMI"></section>
                        <section
                                style="border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); box-shadow: rgb(226, 226, 226) 0px 16px 1px -13px; line-height: 1.6; padding: 3px; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(255, 255, 255); background-color: rgb(249, 110, 87);"
                                class="tn-Powered-by-XIUMI"><span style="display: inline-block; font-family: inherit;"
                                                                  class="tn-Powered-by-XIUMI"><section
                                        class="tn-Powered-by-XIUMI">农产品生长周期</section></span></section>
                        <section style="font-size: 1.5em; color: rgb(249, 110, 87);" class="tn-Powered-by-XIUMI">↓↓↓
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">2</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI"><span style="color: rgb(249, 110, 87);"
                                                                                   class="tn-Powered-by-XIUMI">种子产品</span>
                                        </section>
                                        <section class="tn-Powered-by-XIUMI">某某种子</section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">3</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI"><span style="color: rgb(249, 110, 87);"
                                                                                   class="tn-Powered-by-XIUMI">浸泡时间</span>
                                        </section>
                                        <section class="tn-Powered-by-XIUMI"><span class="tn-Powered-by-XIUMI">2016年3月4日—2016年3月8日</span>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">4</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI"><span style="color: rgb(249, 110, 87);"
                                                                                   class="tn-Powered-by-XIUMI">播种时间</span>
                                        </section>
                                        <section class="tn-Powered-by-XIUMI">2016年4月4日—2016年4月8日</section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">5</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI"><span style="color: rgb(249, 110, 87);"
                                                                                   class="tn-Powered-by-XIUMI">收割时间</span>
                                        </section>
                                        <section class="tn-Powered-by-XIUMI">2016年11月1日—2016年11月10日</section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">6</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI"><span style="color: rgb(249, 110, 87);"
                                                                                   class="tn-Powered-by-XIUMI">加工时间</span>
                                        </section>
                                        <section class="tn-Powered-by-XIUMI">2016年12月1日—2016年12月10日</section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section style="border-width: 0px; border-style: initial; border-color: initial;height: 50px;"
                             class="tn-Powered-by-XIUMI">
                        <section style="width: 95%; margin-left: 5%;" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 1.5em; height: 1.5em; line-height: 1.5em; margin-top: 1em; margin-bottom: -2em; margin-left: -0.75em; border-width: 1px; border-style: solid; border-color: rgb(249, 110, 87); border-radius: 100%; background-color: rgb(255, 255, 255); font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">7</section>
                                </section>
                            </section>
                            <section class="tn-Powered-by-XIUMI">
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); height: 1.2em; border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI"></section>
                                <section
                                        style="border-left: 1px solid rgb(249, 110, 87); border-top-color: rgb(249, 110, 87); border-right-color: rgb(249, 110, 87); border-bottom-color: rgb(249, 110, 87);"
                                        class="tn-Powered-by-XIUMI">
                                    <section
                                            style="clear: both; margin-top: -0.4em; margin-left: 1.6em; padding-bottom: 0.2em; font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(160, 160, 160);"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI">结束</section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section
                            style="border-width: initial; border-style: none; border-color: initial; margin: 0.5em 0.3em;"
                            class="tn-Powered-by-XIUMI">
                        <section style="border-color: rgb(249, 110, 87);" class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; float: left; width: 45%; margin-top: 0.2em; border-width: 1px; border-style: dotted; border-color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="display: inline-block; float: right; width: 45%; margin-top: 0.2em; border-width: 1px; border-style: dotted; border-color: rgb(249, 110, 87);"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="width: 0.5em; height: 0.5em; background-color: rgb(249, 110, 87); margin: auto; transform: rotate(45deg);"
                                    class="tn-Powered-by-XIUMI"></section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section
                            style="border-width: 0px; border-style: initial; border-color: initial; text-align: center; font-size: 1em; vertical-align: middle;"
                            class="tn-Powered-by-XIUMI">
                        <section class="tn-Powered-by-XIUMI"
                                 style="font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(255, 255, 255); border-color: rgb(249, 110, 87);">
                            <section
                                    style="height: 0px; margin-right: 1em; margin-left: 1em; border-top: 1.5em solid rgb(249, 110, 87); border-bottom: 1.5em solid rgb(249, 110, 87); font-size: 1em; border-left: 1.5em solid transparent !important; border-right: 1.5em solid transparent !important;"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="height: 0px; margin: -2.75em 1.65em -2.3em; border-width: 1.3em; border-style: solid; border-color: rgb(255, 255, 255) transparent; font-size: 1em;"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="height: 0px; margin-right: 2.1em; margin-left: 2.1em; vertical-align: middle; border-top: 1.1em solid rgb(249, 110, 87); border-bottom: 1.1em solid rgb(249, 110, 87); font-size: 1em; border-left: 1.1em solid transparent !important; border-right: 1.1em solid transparent !important;"
                                    class="tn-Powered-by-XIUMI">
                                <section
                                        style="max-height: 1em; margin-top: -0.5em; line-height: 1; overflow: hidden; font-size: 1em; font-family: inherit;"
                                        class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">生长阶段的施药及施肥情况</section>
                                </section>
                            </section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <section
                            style="border-width: initial; border-style: none; border-color: initial; margin-top: 0.8em; margin-bottom: 0.3em;"
                            class="tn-Powered-by-XIUMI">
                        <section
                                style="font-size: 1em; font-family: inherit; text-decoration: inherit; color: rgb(255, 255, 255); border-color: rgb(142, 201, 101);"
                                class="tn-Powered-by-XIUMI">
                            <section
                                    style="display: inline-block; width: 7em; height: 7em; float: right; margin-right:
                                    0.5em; margin-top: 13px; background-position: 50% 50%; background-repeat: no-repeat;
                                    background-size: cover; background-image: url(http://pan.baidu.com/share/qrcode?w=300&h=300&url=http://pingjia.ngrok.cc/laravel-master/public/crop/scanBinCode/{{$cropInfo['id']}};);"
                                    class="tn-Powered-by-XIUMI"></section>
                            <section
                                    style="width: 100%; padding: 0.5em; background: rgb(142, 201, 101); font-size: 1em; font-family: inherit;"
                                    class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI">
                                    <section
                                            style="padding-top: 0.3em; padding-bottom: 0.3em; width: 55%; overflow: hidden; font-size: 1.2em; font-family: inherit; text-decoration: inherit;"
                                            class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI">内容描述</section>
                                    </section>
                                    <section style="line-height: 1.5em; width: 55%;" class="tn-Powered-by-XIUMI">
                                        <section class="tn-Powered-by-XIUMI">1、施药......</section>
                                    </section>
                                </section>
                                <section
                                        style="margin-top: 0.5em; font-size: 1em; font-family: inherit; text-decoration: inherit;"
                                        class="tn-Powered-by-XIUMI">
                                    <section class="tn-Powered-by-XIUMI">2、施肥...... <br class="tn-Powered-by-XIUMI"/></section>
                                    <section class="tn-Powered-by-XIUMI link-us">联系我们 <br class="tn-Powered-by-XIUMI"/></section>
                                </section>
                            </section>
                            <section
                                    style="width: 0px; margin-left: 20px; border-top: 5px solid rgb(142, 201, 101); border-left: 10px solid transparent !important; border-right: 10px solid transparent !important;"
                                    class="tn-Powered-by-XIUMI"></section>
                        </section>
                        <section style="width: 0px; height: 0px; clear: both;"></section>
                    </section>
                    <p></p>
                    <p><br/></p>
                </div>
            </div>
        </div>

    </div>
</div>

</body>

</html>