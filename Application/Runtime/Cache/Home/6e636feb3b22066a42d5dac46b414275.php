<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>11-SupportGroup</title>

</head>

<body>
<div style="width:80%;margin:0 auto">
	<div style="width:100%">
		<div style="float:right;text-align:right;padding-top:30px">
			<a href="/weibo/index.php/home/user/newblog">发布新的内容</a>
		</div>
		<div style="float:right;width:40%;padding-top:30px">
			<form   method="post" action="/weibo/index.php/Home/User/searchuser" style="width:250px;margin:0 100px;">
	  
				<input name="searchname" type="text" />
				<input type="submit" value="搜索"/>	
			</form>	
		</div>
		<div style="float:left;width:400px;text-align:center">
			<div style="position:relative;margin-right:100px;">
				<img src="/weibo/Public/img/school.jpg" width="50px" height="50px" style="display:inline"/>
				<div style="display:inline;position:absolute;bottom:10px;font-size:30px;">西电微博</div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	</form>   
		
		<div id="contentarea">
		 <div id="left" style="width:35%;height:600px;float:left;">
			<div id="lefta" style="width:80%;height:100px;margin:20px auto;background-color:#DFEDFC;">
				<div style="margin-left:10px;">
				<div style="padding-top:10px;"><?php echo (session('username')); ?>的主页
				
					<?php if($_SESSION['sex']== 0): ?><img src="/weibo/Public/img/woman.png" style="width:16px;height:16px;margin-left:20px;"/>
						<?php else: ?>
						<img src="/weibo/Public/img/man.png" style="width:16px;height:16px;margin-left:20px;"/><?php endif; ?>	
				
				</div>
				<div style="margin-top:10px;">登陆时间：<?php echo (session('logintime')); ?></div>
				<div style="margin-top:10px;"><a href="/weibo/index.php/Home/User/logout">退出<a></div>
				</div>
			</div>
			
			<div id="leftb" style="width:80%;height:100px;margin:20px auto;background-color:#DFEDFC;">
				<div style="margin-left:10px;">
					<div style="padding-top:10px;">关注人数：<?php echo (session('focusnum')); ?>　<a href="/weibo/index.php/Home/User/showfocus">查看详情</a></div>
					<div style="margin-top:10px;">粉丝人数：<?php echo (session('follownum')); ?>　<a href="/weibo/index.php/Home/User/showfollow">查看详情</a></div>
					<div style="margin-top:10px;">微博总数：<?php echo (session('blognum')); ?></div>
				</div>
			</div>
		 </div>
		 <div id="right" style="width:65%;height:700px;float:left;">
			<div style="width:100%;height:700px;background-color:#DFEDFC;margin:20px auto;overflow-y:auto;overflow-x:hidden;">
				<?php if(is_array($blog)): foreach($blog as $key=>$vo): ?><div>
					<div>
						<div style="display:inline;margin:5px 10px"><font style="font-weight:bold"><?php echo ($vo["username"]); ?></font>----<?php echo ($vo["time"]); ?></div>
						
						
						<?php if(($vo["userid"]) == $_SESSION['userid']): else: ?>
								<div style="display:inline;">	
									<a href="javascript:document.blogform<?php echo ($vo["ID"]); ?>.submit();">转发</a>
								</div>
								
								<form action="/weibo/index.php/Home/User/transmit" method="post" name="blogform<?php echo ($vo["ID"]); ?>">
									<input type="hidden" value="<?php echo ($vo["username"]); ?>" name="username"/>
									<input type="hidden" value="<?php echo ($vo["blog"]); ?>" name="blog"/>
									<input type="hidden" value="<?php echo ($vo["ps"]); ?>" name="ps"/>
								
									<?php if($vo["img"] == 0 ): ?><input type="hidden" value="" name="imgurl"/>
									<?php else: ?> 
									<input type="hidden" value="./Public/Uploads/<?php echo ($vo["userid"]); ?>/<?php echo ($vo["dateinfo"]); ?>/<?php echo ($vo["img"]); ?>" name="imgurl" />
									<input type="hidden" value="<?php echo ($vo["img"]); ?>" name="img" /><?php endif; ?>
								</form><?php endif; ?>
							<?php if($vo["isrepeat"] == 1): ?><div style="margin-left:10px"><?php echo ($vo["ps"]); ?></div>
							<?php else: endif; ?>
						
					</div>
					
					<div>
						<?php if($vo["img"] == 0 ): else: ?> 
							<img src="/weibo/Public/Uploads/<?php echo ($vo["userid"]); ?>/<?php echo ($vo["dateinfo"]); ?>/<?php echo ($vo["img"]); ?>"  style="max-height:300px; max-width:300px;margin:10px 20px;" /><?php endif; ?>
					</div>
					<div>
						
						<div style="width:90%;margin:10px auto;"><?php echo ($vo["blog"]); ?></div>
					</div>
				</div>
				<div style="width:100%;height:140px;margin:0 auto;position:relative;">
				
					<div style="font-family: Microsoft YaHei;color:#8B959E;font-weight:900">评论内容</div>
					<div style="background-color:#EAF3FC;border-style:solid;border-width:1px; width:95%;height:80px;overflow-y:auto;overflow-x:hidden;margin-left:10px;">
						<?php if(is_array($vo['comment'])): foreach($vo['comment'] as $key=>$comment): ?><div style="font-size:8px;margin-top:2px;">
				
								<div style="display:inline;color:#F95763;font-weight:700"><?php echo ($comment["username"]); ?>:</div><div style="display:inline"><?php echo ($comment["comment"]); ?></div>
							</div><?php endforeach; endif; ?>
					</div>
					
					<div style="display:inline;position:absolute;left:5px;bottom:0px;"><a href="/weibo/index.php/Home/User/like/blogid/<?php echo ($vo["ID"]); ?>"><img src="/weibo/Public/img/like.png"/></a></div>
					<div style="display:inline;position:absolute;left:40px;bottom:5px;">（<?php echo ($vo["like"]); ?>）</div>
					<div style="display:inline;position:absolute;left:100px;bottom:5px;">评论数 （<?php echo ($vo["comnum"]); ?>）</div>
					<div style="position:absolute;right:20px;bottom:5px;display:inline">
						<form method="post" action="/weibo/index.php/Home/User/addcomment" >
							<input type="hidden" name="blogid" value="<?php echo ($vo["ID"]); ?>" />
							<div style="">
								<input type="text" name="comment" style="margin-right:10px;width:200px;" /><input type="submit" value="评论" /> 
							</div>
						</form>
					</div>	
				
				</div>
				<hr/><?php endforeach; endif; ?>
			</div>
				
		 </div>
		 <div style="clear:both"></div>
	  </div>
	    <div style="width:1000px;background-color: #EEEEE0; color:#999999;margin:40px auto;text-align:center;">
     	<p>Copyright&copy; 2014 ,lsn, All Rights Reserved</p>
     	<p>Powerby linsen</p>
     </div>
	 
</div>
</body>
</html>