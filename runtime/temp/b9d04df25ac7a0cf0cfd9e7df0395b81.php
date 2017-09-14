<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:30:"./themes/home/login/index.html";i:1504353478;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>登录--山东管理学院联通选号系统</title>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/easyui.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/mobile.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/icon.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/example.css"/>
        <script type="text/javascript" src="__STYLE__/js/jquery.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.mobile.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.form.js"></script>
    </head>
    <body>
        <div class="easyui-navpanel">
            <header>
                <div class="m-toolbar">
                    <span style="font-size:22px" class="m-title">山东管理学院联通选号系统</span>
                </div>
            </header>
            <div style="margin:40px auto;width:100px;height:100px;border-radius:100px;overflow:hidden">
                <img src="__STYLE__/images/login.png" style="margin:0;width:100%;height:100%;">
            </div>
            <form action="/index/login/login" method="post">
            <div  style="text-align:center">
                <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                        <div class="weui-cell__bd">
                            <input name="username" type="text" class="weui-input" placeholder="请输入姓名" >
                        </div>
                    </div>
                </div>
                <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                        <div class="weui-cell__bd">
                            <input name="sdmu" type="password" class="weui-input" placeholder="请输入sdmu账号" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-sp-area"  style="text-align:center;margin-top:30px">
                  <button id="LoginBtn" class="weui-btn weui-btn_primary"  style="width:95%">登陆</button>
            </div>
            </form>
        </div>
        <div class="weui-msg__extra-area">
            <div class="weui-footer">
                <p class="weui-footer__links">
                    <a href="http://www.10010.com/" class="weui-footer__link">中国联通-山东管理学院</a>
                </p>
                <p class="weui-footer__text">Copyright © 2017</p>
            </div>
        </div>
    </body>
</html>
