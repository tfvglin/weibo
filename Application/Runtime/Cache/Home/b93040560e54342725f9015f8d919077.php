<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" />
<title>查询列表</title>

</head>

<body>
		
		<div >
			<table  border="1" style="background-color:#D9F0F4;margin:0 auto;" >
				 <tr>
					<th>用户</th>
					<th>联系邮箱</th>
					<th>关注</th>
				 </tr>
				<?php if(is_array($userlist)): foreach($userlist as $key=>$vo): ?><tr>
					<td><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td>关注</td>
				</tr><?php endforeach; endif; ?>
			</table>
			<div style="margin:10px auto;text-align:center;">
				<a href="javascript:history.go(-1)">返回</a>	
			</div>
		</div>
		

</body>
</html>