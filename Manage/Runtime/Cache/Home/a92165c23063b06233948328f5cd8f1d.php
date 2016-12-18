<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理 - 易买网</title>
    <link type="text/css" rel="stylesheet" href="/OnlineShop/Public/css/style.css" />
    <script type="text/javascript" src="/OnlineShop/Public/scripts/function-manage.js"></script>
</head>
<body>
<div id="header" class="wrap">
	<div id="logo"><img src="/OnlineShop/Public/images/logo.gif" /></div>
	<div class="help"><a href="../index.html">返回前台页面</a></div>
	<div class="navbar">
		<ul class="clearfix">
			<li><a href="/OnlineShop/manage.php/Home/Index/index">首页</a></li>
			<li class="current"><a href="/OnlineShop/manage.php/Home/User/showUser">用户</a></li>
			<li><a href="/OnlineShop/manage.php/Home/Product/showProduct">商品</a></li>
			<li><a href="/OnlineShop/manage.php/Home/Order/showOrder">订单</a></li>
			<li><a href="guestbook.html">留言</a></li>
			<li><a href="news.html">新闻</a></li>
		</ul>
	</div>
</div>
<div id="childNav">
	<div class="welcome wrap">
		管理员pillys您好，今天是2012-12-21，欢迎回到管理后台。
	</div>
</div>
<div id="position" class="wrap">
	您现在的位置：<a href="index.html">易买网</a> &gt; 管理后台
</div>
<div id="main" class="wrap">
	<div id="menu-mng" class="lefter">
		<div class="box">
    <dl>
        <dt>用户管理</dt>
        <dd><em><a href="/OnlineShop/manage.php/Home/User/showAdd">新增</a></em><a href="/OnlineShop/manage.php/Home/User/showUser">用户管理</a></dd>
        <dt>商品信息</dt>
        <dd><em><a href="/OnlineShop/manage.php/Home/Product/showProductClassAdd">新增</a></em><a href="/OnlineShop/manage.php/Home/Product/showProductClass">分类管理</a></dd>
        <dd><em><a href="/OnlineShop/manage.php/Home/Product/showAddProduct">新增</a></em><a href="product.html">商品管理</a></dd>
        <dt>订单管理</dt>
        <dd><a href="order.html">订单管理</a></dd>
        <dt>留言管理</dt>
        <dd><a href="guestbook.html">留言管理</a></dd>
        <dt>新闻管理</dt>
        <dd><em><a href="news-add.html">新增</a></em><a href="news.html">新闻管理</a></dd>
    </dl>
</div>
	</div>
	<div class="main">
		<h2>用户管理</h2>
		<div class="manage">
			<table class="list">
				<tr>
					<th>ID</th>
					<th>姓名</th>
					<th>性别</th>
					<th>Email</th>
					<th>手机</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
					 <td class="first w4 c"><?php echo ($user['user_id']); ?></td>
					 <td class="w1 c"><?php echo ($user['user_realname']); ?></td>
					 <td class="w2 c"><?php echo ($user['user_sex']); ?></td>
					 <td><?php echo ($user['user_email']); ?></td>
					 <td class="w4 c"><?php echo ($user['user_tel']); ?></td>
					 <td class="w1 c"><a href="/OnlineShop/manage.php/Home/User/showModify/user_id/<?php echo ($user['user_id']); ?>">修改</a> <a href="/OnlineShop/manage.php/Home/User/deleteUser/user_id/<?php echo ($user['user_id']); ?>?confirm=javascript:Delete()">删除</a></td>
				    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="footer">
	Copyright &copy; 2010 北大青鸟 All Rights Reserved. 京ICP证1000001号
</div>
</body>
</html>