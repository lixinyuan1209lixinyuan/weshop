<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城-个人中心</title>
		<link rel="stylesheet" type="text/css" href="/indexStatic/css/style.css">

	</head>
	<body>
	<!-- start header -->
		@include('index.layouts.header');
	<!--end header -->

<!-- self_info -->
		@include('index.layouts.personleft')



			<div class="gwcxqbj" style="height: auto;">
				<div class="gwcxd center" >
					<div class="top2 center" >
			<div class="gwcxd center" >
				<div class="top2 center"  >
					<div class="sub_top fl" style="width: 220px;">商品名称</div>
					<div class="sub_top fl">总价</div>
					<div class="sub_top fl">操作</div>
					<div class="clear"></div>
				</div>

				@foreach($data as  $v)
					<div class="content2 center" style="text-align: center;" >


                        <div class="sub_content fl" style="width: auto;width: 220px;" >
                        @foreach($v->order as $val)
                                <img src="{{asset('/storage/goodsImg/'.$val->goods_img)}}" width="100px" height="100px" style="float: left;margin-left: 1px;margin-top: 10px;">
                            @endforeach
                        </div>
						<div class="sub_content fl" style="margin-left: 100px;">{{$v->o_price}}</div>

							<div >
								<div class="">
                                    <a href="details?o_id={{$v->o_id}}"><input style="width: 100px;height: 50px;background-color: red;font-size: 20px;margin-top: 35px;" type="button"  value="去结算"/></a>
                                    {{--<a href="details?o_id={{$v->o_id}}"><input style="width: 100px;height: 50px;background-color: #38ff2c;font-size: 20px;margin-top: 35px;margin-left: 5px;" type="button" value="查看详情"/></a>--}}
                                </div>
							</div>
					</div>
				@endforeach

			            </div>
			        </div>
                </div>
			</div>

		<div class="clear"></div>
		</div>
	</div>
<!-- self_info -->
		
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>