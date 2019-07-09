<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米6立即购买-小米商城</title>
		<link rel="stylesheet" type="text/css" href="/indexStatic/css/style.css">
	</head>
	<body>
	<!-- start header -->
		@include('index.layouts.header')
	<!--end header -->

	<!-- start banner_x -->
		{{--@include('index.layouts.navx');--}}
	<!-- end banner_x -->

	
	<!-- xiangqing -->
	<form action="post" method="">
	{{--<div class="xiangqing">--}}
		{{--<div class="neirong w">--}}
			{{--<div class="xiaomi6 fl">小米6</div>--}}
			{{--<nav class="fr">--}}
				{{--<li><a href="">概述</a></li>--}}
				{{--<li>|</li>--}}
				{{--<li><a href="">变焦双摄</a></li>--}}
				{{--<li>|</li>--}}
				{{--<li><a href="">设计</a></li>--}}
				{{--<li>|</li>--}}
				{{--<li><a href="">参数</a></li>--}}
				{{--<li>|</li>--}}
				{{--<li><a href="">F码通道</a></li>--}}
				{{--<li>|</li>--}}
				{{--<li><a href="">用户评价</a></li>--}}
				{{--<div class="clear"></div>--}}
			{{--</nav>--}}
			{{--<div class="clear"></div>--}}
		{{--</div>	--}}
	{{--</div>--}}
	
	<div class="jieshao mt20 w" style="height: auto;">
		<div class="left fl" style="text-align: center;padding-top: 80px;">
			<img src="{{asset("/storage/goodsImg/".$goodsDetail->goods_img)}}" style="width: 400px;height: 400px;">
		</div>
		<div class="right fr">
			<div class="h3 ml20 mt20">{{$goodsDetail->goods_name}}</div>
			<div class="jianjie mr40 ml20 mt10">{{$goodsDetail->goods_desc}}</div>
			<div class="jiage ml20 mt10">{{$goodsDetail->goods_price}}元</div>
			<div class="ft20 ml20 mt20">选择版本</div>
			<div class="xzbb ml20 mt10" style="margin-bottom: 30px;">
				<div class="banben fl" style="width: 580px;">
					<a>
						<span>{{$goodsDetail->goods_desc}}</span>
						<span>{{$goodsDetail->goods_price}}</span>
					</a>
				</div>
				{{--<div class="banben fr">--}}
					{{--<a>--}}
						{{--<span>全网通版 6GB+128GB</span>--}}
						{{--<span>2899元</span>--}}
					{{--</a>--}}
				{{--</div>--}}
				<div class="clear"></div>
			</div>
			{{--<div class="ft20 ml20 mt20">选择颜色</div>--}}
			{{--<div class="xzbb ml20 mt10">--}}
				{{--<div class="banben">--}}
					{{--<a>--}}
						{{--<span class="yuandian"></span>--}}
						{{--<span class="yanse">亮黑色</span>--}}
					{{--</a>--}}
				{{--</div>--}}
				{{----}}
			{{--</div>--}}
			{{--<div class="xqxq mt20 ml20">--}}
				{{--<div class="top1 mt10">--}}
					{{--<div class="left1 fl">小米6 全网通版 6GB内存 64GB 亮黑色</div>--}}
					{{--<div class="right1 fr">2499.00元</div>--}}
					{{--<div class="clear"></div>--}}
				{{--</div>--}}
				{{--<div class="bot mt20 ft20 ftbc">总计：2499元</div>--}}
			{{--</div>--}}
			<div class="xiadan ml20 mt20">
					{{--<input class="jrgwc"  type="button" name="jrgwc" value="立即选购" />--}}
					<input class="jrgwc" type="button" name="addshopcar" value="加入购物车" data-goods_id="{{$goodsDetail->goods_id}}"/>
					<input class="jrgwc" type="button" name="shoucang" data-goods_id="{{$goodsDetail->goods_id}}" data-goods_img="{{$goodsDetail->goods_img}}" value="收藏此商品" style="margin-top: 30px;" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	</form>
	<!-- footer -->
	<footer class="mt20 center">
			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>

		</footer>

	</body>
</html>
<script src="/indexStatic/js/jquery-3.4.1.js"></script>
<script>

	//加入购物车
	$("input[name='addshopcar']").on('click',function () {
		let goods_id = $(this).attr('data-goods_id');
		$.get('/addshopcar',{goods_id:goods_id},function (jsonMsg) {
				alert(jsonMsg.errorMsg);
        });
    });

	//收藏
	$("input[name='shoucang']").on('click',function () {
		let goods_id = $(this).attr('data-goods_id');
		let goods_img = $(this).attr('data-goods_img');
		// $.get("collection",)
		$.ajax({
			url:'addcollect',
			data:{goods_id:goods_id, goods_img:goods_img},
			type:'get',
			dataType:'json',
			success:function(e){
			    alert(e.msg);
			}
		})


    });

</script>