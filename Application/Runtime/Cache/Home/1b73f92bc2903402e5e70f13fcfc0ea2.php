<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" />
<title>注册</title>

</head>

<body>
		
		<div style="width:100%;height:400px;background-color:#39D69E;margin:20px auto;">
			<div style="width:50%;margin:100px auto;">
			<fieldset>
			<legend>用户注册</legend>
			<form id="registform" name="registform" method="post" action="/weibo/index.php/home/user/adduser">
			  
				<div style="padding-top:10px;">用户名：<input type="text" name="username"/></div>
				<div style="padding-top:10px;">密　码：<input type="text" name="password"/></div>
				<div style="padding-top:10px;">邮　箱：<input type="text" name="email"/></div>
				
				<div style="padding:10px 40px;" ><input type="submit" value="注册"/></div>
			 
			</form>
			</fieldset>
			</div>

		</div>

</body>
</html>