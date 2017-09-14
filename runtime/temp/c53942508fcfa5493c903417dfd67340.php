<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./themes/home/index/search.html";i:1504353478;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>山东管理学院联通选号系统</title>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/easyui.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/mobile.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/icon.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/example.css"/>
        <script type="text/javascript" src="__STYLE__/js/jquery.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.mobile.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.form.js"></script>
        <style>

    	</style>
    </head>
    <body>
	<div class="page input js_show">

	   <div class="page msg_success js_show">
	   
		    <div class="weui-msg">
				<form action="/index/index/update" method="post">
		        <div class="weui-msg__icon-area" style="font-size: 2em;">
		        	<?php echo $data['username']; ?>
		    	</div>
		        <div class="weui-msg__text-area">
		            <h2 class="weui-msg__title">您选择的号码为</h2>
		            <h1 class="weui-msg__desc" style="font-size: 2em;"><?php echo $data['phone']; ?></h1>
		        </div>
				
		        <div class="weui-msg__opr-area">
		            <p class="weui-btn-area">
						<!--<input type="hidden" name="phone" value="<?php echo $data['phone']; ?>">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
		                <button class="weui-btn weui-btn_primary" type="submit">确认号码</button>
		                <a href="/index/index/index" class="weui-btn weui-btn_default" >返回修改</a>-->
		            </p>
		        </div>
				</form>
		        <div class="weui-msg__extra-area">
		            <div class="weui-footer">
		                <p class="weui-footer__links">
		                    <a href="http://www.10010.com/" class="weui-footer__link">中国联通-山东管理学院</a>
		                </p>
		                <p class="weui-footer__text">Copyright © 2017</p>
		            </div>
		        </div>
		    </div>
			
		</div>
	
	</div>   
    </body>
</html>