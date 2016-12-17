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
			<form action="manage-result.html">
				<table class="form">
					<tr>
						<td class="field">商品名称：</td>
						<td><input type="text" class="text" name="productName" /></td>
					</tr>
					<tr>
						<td class="field">所属分类：</td>
						<td>
                            <select name="parentID" size="1" id="type">
								<option>请选择大类</option>
								<?php if(is_array($cate1)): foreach($cate1 as $key=>$v): ?><option value="<?php echo ($v['goods_class_id']); ?>"><?php echo ($v['class_name']); ?></option><?php endforeach; endif; ?>
							</select>
                            <select name="lable" size="1" id="lables">
                            </select>
							<script type="text/javascript">
								<!--//<![CDATA[
                                $('#type').click(function(){
                                            $(this).change(function(){
                                                var objectModel = {};
                                                var   value = $(this).val();
                                                var   type = $(this).attr('id');
                                                objectModel[type] =value;
                                                $.ajax({
                                                    cache:false,
                                                    type:"POST",
                                                    url:"/OnlineShop/manage.php/home/product/cate",
                                                    dataType:"json",
                                                    data:objectModel,
                                                    timeout:30000,
                                                    error:function(){
                                                        alert(site.web+"lable");
                                                    },
                                                    success:function(data){
                                                        $("#lables").empty();
                                                        var count = data.length;
                                                        var i = 0;
                                                        var b="";
                                                        for(i=0;i<count;i++){
                                                            b+="<option value='"+data[i].goods_class_id+"'>"+data[i].class_name+"</option>";
                                                        }
                                                        $("#lables").append(b);
                                                    }
                                                });
                                            });
                                        }
                                );
								//]]>-->
							</script>
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
						<td class="field">品牌：</td>
						<td><input type="text" class="text" name="productName" /></td>
					</tr>
					<tr>
						<td class="field">库存：</td>
						<td><input type="text" class="text tiny" name="stock" /></td>
					</tr>
					<tr>
						<td class="field">条码号：</td>
						<td><input type="text" class="text" name="productName" /></td>
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