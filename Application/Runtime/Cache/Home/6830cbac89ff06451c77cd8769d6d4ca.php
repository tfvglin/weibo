<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>登录</title>

</head>

<body>
	<div >
		
	</div>
	<div style="width:1000px;margin:0 auto">
		<h1 style="text-align:center;">西电微博</h1>
		<div style="width:350px;height:200px;float:left;text-align:center;margin:50px 50px;">
			<img src="/weibo/Public/img/sign.png"/>
		</div>
		
		<div style="width:350px;height:200px;background-image:url('/weibo/Public/img/loginback.jpg');float:left;margin:50px 50px;background-size:cover;">
			<div style="width:280px;margin:10px auto;">
			<fieldset>
			<legend>用户登录</legend>
			<form id="loginform" name="loginform" method="post" action="/weibo/index.php/home/user/login">
			  
				<div class="banner" style="padding-top:10px;">用户名：<input type="text" name="username"/></div>
				<div class="banner" style="padding-top:10px;">密　码：<input type="text" name="password"/></div>
				<div style="margin:10px auto">
				<div style="display:inline;margin-left:65px;" ><input type="submit" value="登录"/></div>
				<div style="display:inline;margin-left:65px;"><button type="button" onclick="javascript:window.location.href='/weibo/index.php/home/user/regist'">注册</button></div>
				</div>
				<div style="clear:both"></div>
			 
			</form>
			</fieldset>
			</div>

		</div>
		<div style="clear:both"></div>
	</div>
	    <div style="width:1000px;background-color: #EEEEE0; color:#999999;margin:10px auto;text-align:center;">
     	<p>Copyright&copy; 2014 ,lsn, All Rights Reserved</p>
     	<p>Powerby linsen</p>
     </div>
</body>
</html>