{__NOLAYOUT__}<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>跳转提示</title>
        <link rel ="stylesheet" type="text/css" href="__STYLE__/css/easyui.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/mobile.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/icon.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/example.css"/>
        <script type="text/javascript" src="__STYLE__/js/jquery.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.mobile.js"></script>
    </head>
    <body>
        <div class="page msg_success js_show">
            <div class="weui-msg">
                <div class="weui-msg__opr-area">
                    <p class="weui-btn-area">
			        <?php switch ($code) {?>
			            <?php case 1:?>
			            <i class="weui-btn weui-btn weui-btn_primary"></i>
            			<h2 class="weui-msg__title"><?php echo(strip_tags($msg));?></h2> 
			            <?php break;?>
			            <?php case 0:?>
			            <i class="weui-icon-warn weui-icon_msg"></i>
			            <h2 class="weui-msg__title"><?php echo(strip_tags($msg));?></h2>
			            <?php break;?>
			        <?php } ?>  
                    </p>
                    <p class="weui-btn-area">
		                <a id="href" href="<?php echo($url);?>" class="weui-btn weui-btn_primary">等待时间： <b id="wait"><?php echo($wait);?></a>
		            
		            </p>

                </div>
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
	    <script type="text/javascript">
	        (function(){
	            var wait = document.getElementById('wait'),
	                href = document.getElementById('href').href;
	            var interval = setInterval(function(){
	                var time = --wait.innerHTML;
	                if(time <= 0) {
	                    location.href = href;
	                    clearInterval(interval);
	                };
	            }, 1000);
	        })();
	    </script>
    </body>
</html>
