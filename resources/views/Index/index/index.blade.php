<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城</title>
		<link rel="stylesheet" type="text/css" href="/indexStatic/css/style.css">
		<script src="/indexStatic/js/index/index.js"></script>
	</head>
	<body>
	<!-- start header -->
	@include('index.layouts.header');
	<!--end header -->

	<!-- start banner_x -->
	@include('index.layouts.navx');
	<!-- end banner_x -->

	<!-- start banner_y -->
		<div class="banner_y center">
			<div class="nav">				
				<ul>
					@foreach($catGoods as $k=>$v)
					<li>
						<a href="/goodslist?cat_id={{$v['cat_id']}}">{{$v['cat_name']}}</a>
						<div class="pop">
							<div class="left fl">
								@foreach( $v['goods'] as $key=>$val )
								<div>
									<div class="xuangou_left fl">
										<a href="/goodsdetail?goods_id={{$val['goods_id']}}">
											<div class="img fl"><img src="{{asset('/storage/goodsImg/'.$val['goods_img'])}}" width="50px" height="80px" alt=""></div>
											<span class="fl">{{$val['goods_name']}}</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="/goodsdetail?goods_id={{$val['goods_id']}}" target="_blank">选购</a></div>
									<div class="clear"></div>
								</div>
								@endforeach
							</div>

							{{--<div class="ctn fl">--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>--}}
											{{--<span class="fl">小米手机5</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>--}}
											{{--<span class="fl">红米Note 4X</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>--}}
											{{--<span class="fl">红米Note-4</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>--}}
											{{--<span class="fl">红米4x</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>--}}
											{{--<span class="fl">红米4</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>--}}
											{{--<span class="fl">红米4A</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<div class="xuangou_right fr"><a href="">选购</a></div>--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="right fl">--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/compare.jpg" alt=""></div>--}}
											{{--<span class="fl">对比手机</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
								{{--<div>--}}
									{{--<div class="xuangou_left fl">--}}
										{{--<a href="">--}}
											{{--<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>--}}
											{{--<span class="fl">小米移动&nbsp;电话卡</span>--}}
											{{--<div class="clear"></div>--}}
										{{--</a>--}}
									{{--</div>--}}
									{{--<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->--}}
									{{--<div class="clear"></div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<div class="clear"></div>--}}

						</div>
					</li>
					@endforeach
				</ul>
			</div>
		
		</div>	

		<div class="sub_banner center">
			<div class="sidebar fl">
				@foreach($recommend as $v)
				<div class="fl"><a href=""><img src="{{asset("/storage/goodsImg/".$v->goods_img)}}"></a></div>
				@endforeach
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="./image/hongmi4x.png" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="./image/xiaomi5.jpg" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="./image/pinghengche.jpg" alt=""></a></div>
			<div class="clear"></div>


		</div>
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				@foreach($recommend as $v)
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="{{asset("/storage/goodsImg/".$v->goods_img)}}" alt=""></a></div>
					<div class="pinpai"><a href="">{{$v->goods_name}}</a></div>
					<div class="youhui">{{$v->goods_desc}}</div>
					<div class="jiage">{{$v->goods_price}}</div>
				</div>
				@endforeach
				<div class="clear"></div>
			</div>
		</div>
		{{--<div class="peijian w">--}}
			{{--<div class="biaoti center">配件</div>--}}
			{{--<div class="main center">--}}
				{{--<div class="content">--}}
					{{--<div class="remen fl"><a href=""><img src="./image/peijian1.jpg"></a>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span>新品</span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian2.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">小米6 硅胶保护套</a></div>--}}
						{{--<div class="jiage">49元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
						{{--<div class="piao">--}}
							{{--<a href="">--}}
								{{--<span>发货速度很快！很配小米6！</span>--}}
								{{--<span>来至于mi狼牙的评价</span>--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:#fff"></span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian3.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">小米手机4c 小米4c 智能</a></div>--}}
						{{--<div class="jiage">29元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:red">享6折</span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian4.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">红米NOTE 4X 红米note4X</a></div>--}}
						{{--<div class="jiage">19元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
						{{--<div class="piao">--}}
							{{--<a href="">--}}
								{{--<span>发货速度很快！很配小米6！</span>--}}
								{{--<span>来至于mi狼牙的评价</span>--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:#fff"></span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian5.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">小米支架式自拍杆</a></div>--}}
						{{--<div class="jiage">89元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
						{{--<div class="piao">--}}
							{{--<a href="">--}}
								{{--<span>发货速度很快！很配小米6！</span>--}}
								{{--<span>来至于mi狼牙的评价</span>--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="clear"></div>--}}
				{{--</div>--}}
				{{--<div class="content">--}}
					{{--<div class="remen fl"><a href=""><img src="./image/peijian6.png"></a>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:#fff"></span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian7.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">小米指环支架</a></div>--}}
						{{--<div class="jiage">19元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
						{{--<div class="piao">--}}
							{{--<a href="">--}}
								{{--<span>发货速度很快！很配小米6！</span>--}}
								{{--<span>来至于mi狼牙的评价</span>--}}
							{{--</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:#fff"></span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian8.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">米家随身风扇</a></div>--}}
						{{--<div class="jiage">19.9元</div>--}}
						{{--<div class="pingjia">372人评价</div>--}}
					{{--</div>--}}
					{{--<div class="remen fl">--}}
						{{--<div class="xinpin"><span style="background:#fff"></span></div>--}}
						{{--<div class="tu"><a href=""><img src="./image/peijian9.jpg"></a></div>--}}
						{{--<div class="miaoshu"><a href="">红米4X 高透软胶保护套</a></div>--}}
						{{--<div class="jiage">59元</div>--}}
						{{--<div class="pingjia">775人评价</div>--}}
					{{--</div>--}}
					{{--<div class="remenlast fr">--}}
						{{--<div class="hongmi"><a href=""><img src="./image/hongmin4.png" alt=""></a></div>--}}
						{{--<div class="liulangengduo"><a href=""><img src="./image/liulangengduo.png" alt=""></a></div>					--}}
					{{--</div>--}}
					{{--<div class="clear"></div>--}}
				{{--</div>				--}}
			{{--</div>--}}
		{{--</div>--}}
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>
<script src="/indexStatic/js/jquery-1.4.3.js"></script>
<script>
	// var vue = new Vue({
	// 	el:'#top',
	// 	data:{
	// 	    test:'测试',
	// 		lis:[
	// 			{name:'首页'},
	// 			{name:'云服务'},
	// 			{name:'金融'},
	// 			{name:'问题反馈'},
	// 			{name:'活动预告'},
	// 			{name:'关于我们'},
	// 		],
    //         fun:[
	// 			{name:'登录',href:'login'},
	// 			{name:'注册'},
	// 			{name:'消息通知'},
	// 		]
	// 	},
	// });
</script>