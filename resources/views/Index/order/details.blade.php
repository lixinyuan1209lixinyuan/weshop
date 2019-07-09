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
	<!-- start banner_x -->
		{{--@include('index.layouts.navx');--}}
<!-- end banner_x -->
<!-- self_info -->
		@include('index.layouts.personleft')


	<div class="gwcxqbj" style="height: auto;">
		<div class="gwcxd center">
			<div class="top2 center">
				<div class="sub_top fl">
				</div>
				<div class="sub_top fl">商品名称</div>
				<div class="sub_top fl" >单价</div>
				<div class="clear"></div>
			</div>

			@foreach($data as  $v)
				<div class="content2 center">
					<div class="sub_content fl ">

					</div>
					<div class="sub_content fl">
						{{--@foreach($v->order as $val)--}}
						<img src="{{asset('/storage/goodsImg/'.$v->goods_img)}}" width="100px" height="100px">
							{{--@endforeach--}}
					</div>
					<div class="sub_content fl ft20" style="margin-left: 80px;">{{$v->goods_name}}</div>
					<div class="sub_content fl ft20" >{{$v->goods_price}}</div>

					<div class="clear"></div>
				</div>
			@endforeach

		</div>
		<form action="http://aliphpdemo.io/pagepay/pagepay.php" method="post">
		<div class="jiesuandan mt20 center">
			<div class="tishi fl ml20">
				<ul>
					<li>
						<div class="sub_content fl ft20" style="">
							选择优惠券:
							<select name="userDiscount" id="">
								<option value="0" class="select_discount" data-money="0">不使用优惠</option>
								@foreach($discount as $k => $v)
									<option class="select_discount" value="{{$v->id}}" data-money="{{$v->money}}">{{$v->name}} ￥{{$v->money}}</option>
								@endforeach
							</select>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="jiesuandan mt20 center">
			<div class="tishi fl ml20">
				<ul>
					<li>
						<div class="sub_content fl ft20" style="width: 137px;">{{$data[0]->status}}</div>
					</li>
					<li>|</li>
					<li style="width: 200px;">下单时间:{{date('Y-m-d H:i:s',$data[0]->o_addtime)}}</li>
					<div class="clear"></div>
				</ul>
			</div>
		</div>

		<div class="jiesuandan mt20 center">
				<div class="jiesuan fr">
					<div class="jiesuanjiage fl">合计（不含运费）：
						<span id="money" data-oldPrice="{{$data[0]->o_price}}">{{$data[0]->o_price}}元</span></div>
					@if($data[0]->o_status == 1)
						<div class="jsanniu fr">
							{{--必要参数--}}
							<input type="hidden" name="order_id" value="{{$data[0]->o_num}}">
							<input type="hidden" name="totalPrice" value="{{$data[0]->o_price}}">
							<input class="jsan" type="submit" name="jiesuan"  value="去支付"/>
						</div>
					@endif
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

		</form>

	</div>


<!-- self_info -->
		
		<footer class="mt20 center">
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>
<script src="/indexStatic/js/jquery-3.4.1.js"></script>
<script>

	//选择优惠券
	$(".select_discount").on('click',function () {
	    //用户的优惠券id
		let user_discount_id = $(this).val();
		//优惠券面值
		let discount_money = $(this).attr('data-money');
		//订单原价
        let oldMoney = parseInt($("#money").attr('data-oldPrice').replace(/[^0-9]/ig,""));

        if(discount_money == 0){
		    $("#money").text(oldMoney + '元');
		    $("input[name='totalPrice']").val(oldMoney);
		}else{
            let newMoney =  Number(oldMoney) - Number(discount_money);
            $("#money").text(newMoney + '元');
            $("input[name='totalPrice']").val(newMoney);
        }


    });

</script>