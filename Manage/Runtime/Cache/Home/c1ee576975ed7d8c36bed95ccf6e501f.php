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
			<li><a href="index.html">首页</a></li>
			<li><a href="user.html">用户</a></li>
			<li class="current"><a href="product.html">商品</a></li>
			<li><a href="order.html">订单</a></li>
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
		<h2>添加商品</h2>
		<div class="manage">
			<form action="/OnlineShop/manage.php/Home/Product/addProduct" method="post">
				<table class="form">
					<tr>
						<td class="field">商品名称：</td>
						<td><input type="text" class="text" name="goodsName" /></td>
					</tr>
					<tr>
						<td class="field">所属分类：</td>
						<td>
							<script type="text/javascript" src="/OnlineShop/Public/scripts/jquery.js"></script>
							<script type="text/javascript" src="/OnlineShop/Public/scripts/region.js"></script>
                            <select name="province" id="province" onchange="loadRegion('province',1,'city','<?php echo U('Ajax/getRegion');?>');">
                                <option value=0>大类</option><?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["goods_class_id"]); ?>" ><?php echo ($vo["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <select name="city" id="city">
                                <option value="0">小类</option>
                            </select>
						</td>
					</tr>
					<tr>
						<td class="field">商品图片：</td>
						<td><input type="file" class="text" name="photo" /></td>
					</tr>
					<tr>
						<td class="field">商品价格：</td>
						<td><input type="text" class="text tiny" name="productPrice" /> 元</td>
					</tr>
					<tr>
						<td class="field">库存：</td>
						<td><input type="text" class="text tiny" name="stock" /></td>
					</tr>
					<tr>
						<td class="field">介绍：</td>
						<td><input type="text" class="text" name="introduction" /></td>
					</tr>
					<tr>
						<td></td>
						<td><label class="ui-blue"><input type="submit" name="submit" value="添加" /></label></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="footer">
	Copyright &copy; 2010 北大青鸟 All Rights Reserved. 京ICP证1000001号
</div>
</body>
</html>