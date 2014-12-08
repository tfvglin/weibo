<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>11-SupportGroup</title>

</head>

<body>
<div style="width:80%;margin:0 auto">
	<div style="width:100%">
		<div style="float:right;text-align:right;">
			<a href="/weibo/index.php/home/user/newblog">发布新的内容</a>
		</div>
		<div style="float:right;width:40%;">
			<form   method="post" action="/weibo/index.php/Home/User/searchuser" style="width:250px;margin:0 100px;">
	  
				<input name="searchname" type="text" />
				<input type="submit" value="搜索"/>	
			</form>	
		</div>
		
		<div style="clear:both;"></div>
	</div>
	</form>   
		
		<div id="contentarea">
		 <div id="left" style="width:35%;height:600px;float:left;">
			<div id="lefta" style="width:80%;height:100px;margin:20px auto;background-color:#DFEDFC;">
				<div><?php echo (session('username')); ?>的主页</div>
				<div>登陆时间</div>
			</div>
			
			<div id="leftb" style="width:80%;height:100px;margin:20px auto;background-color:#DFEDFC;">
				<div>关注人数：</div>
				<div>粉丝人数：</div>
			</div>
		 </div>
		 <div id="right" style="width:65%;height:800px;float:left;">
			<div style="width:100%;height:800px;background-color:#DFEDFC;margin:20px auto;overflow-y:auto;overflow-x:hidden;">
				<?php if(is_array($blog)): foreach($blog as $key=>$vo): ?><div>
					<div><?php echo ($vo["time"]); ?></div>
					<div>
						<?php if($vo["img"] == 0 ): ?>无图
							<?php else: ?> 
							<img src="/weibo/Public/Uploads/<?php echo ($vo["userid"]); ?>/<?php echo ($vo["dateinfo"]); ?>/<?php echo ($vo["img"]); ?>"  width="200px"  height="200px" /><?php endif; ?>
					</div>
					<div>
						
						<div><?php echo ($vo["blog"]); ?></div>
					</div>
				</div>
				<div>
				评论内容
					<?php if(is_array($vo['comment'])): foreach($vo['comment'] as $key=>$comment): ?><div>
				
					<?php echo ($comment["username"]); ?>:<?php echo ($comment["comment"]); ?>
					</div><?php endforeach; endif; ?>
				<div>
					<form method="post" action="/weibo/index.php/Home/User/addcomment">
						<input type="hidden" name="blogid" value="<?php echo ($vo["ID"]); ?>" />
						<input type="text" name="comment" /><input type="submit" value="评论" /> 
					</form>
				</div>	
				</div>
				<hr/><?php endforeach; endif; ?>
			</div>
		 </div>
		 <div style="clear:both"></div>
	  </div>
	  <br class="clearboth" />
	 
</div>
</body>
</html>