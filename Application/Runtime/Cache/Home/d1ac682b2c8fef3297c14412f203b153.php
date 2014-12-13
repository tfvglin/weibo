<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" />
<title>发布新内容</title>

</head>

<body>
		
		<div style="width:1000px;height:400px;background-image:url('/weibo/Public/img/009.jpg');margin:20px auto;">
			<div style="width:500px;margin:0 auto;padding-top:40px">
			<fieldset>
			<legend>发布新内容</legend>
			
			  
			
				<!--<div style="padding-top:10px;">邮　箱：<input type="text" name="email"/></div>-->
				<form action="/weibo/index.php/Home/User/upload" enctype="multipart/form-data" method="post" >
					
					<div style="padding-top:10px;">上传图片：<input type="file" name="photo"/></div>
					<div style="padding-top:10px;">
						<div >文字内容：</div>
						<div ><textarea  name="blog" style="resize:none;width:420px;height:130px"></textarea></div>
					</div>
					<input type="submit" value="提交" style="margin-top:10px" >
				</form>
		
			</fieldset>
			</div>

		</div>
		  </div>
	    <div style="width:1000px;background-color: #EEEEE0; color:#999999;margin:40px auto;text-align:center;">
     	<p>Copyright&copy; 2014 ,lsn, All Rights Reserved</p>
     	<p>Powerby linsen</p>
     </div>

</body>
</html>