<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>登录</title>

</head>

<body>
	<div>
		<div style="width:40%;height:400px;float:left;text-align:center;background-color:#abcdef">
			<h3>我的微博</h3>
		</div>
		
		<div style="width:40%;height:400px;background-color:#39D69E;float:left;">
			<div style="width:50%;margin:100px auto;">
			<form id="loginform" name="loginform" method="post" action="/weibo/index.php/home/user/login">
			  
				<div class="banner" style="padding-top:10px;">用户名：<input type="text" name="username"/></div>
				<div class="banner" style="padding-top:10px;">密　码：<input type="text" name="password"/></div>
				<div style="float:left;padding:10px 40px;" ><input type="submit" value="登录"/></div>
				<div style="float:left;padding:10px 20px;"><button type="button" onclick="javascript:window.location.href='/weibo/index.php/home/user/regist'">注册</button></div>
				<div style="clear:both"></div>
			 
			</form>
			</div>

		</div>
		<div style="clear:both"></div>
	</div>
</body>
</html>