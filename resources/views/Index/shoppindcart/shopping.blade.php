<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>我的购物车-小米商城</title>
		<link rel="stylesheet" type="text/css" href="/indexStatic/css/style.css">
	</head>
	<body>
	<!-- start header -->
	<!--end header -->

<!-- start banner_x -->
		<div class="banner_x center">
			<a href="/" target="_self"><div class="logo fl"></div></a>
			
			<div class="wdgwc fl ml40">我的购物车</div>
			<div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
			<div class="dlzc fr">
				<ul>
					@if(!empty($thisUser))
						<li><a href="me" target="_blank">{{$thisUser['uname']}}</a></li>
					@else
						<li><a href="login" target="_self">登录</a></li>
					@endif
				</ul>
			</div>
			<div class="clear"></div>
		</div>

		<div class="xiantiao"></div>
		<div class="gwcxqbj" style="height: auto;">
			<div class="gwcxd center">
				<div class="top2 center">
					<div class="sub_top fl">
						<input type="checkbox" value="quanxuan" class="quanxuan" title="点击全选" />全选
					</div>
					<div class="sub_top fl">商品名称</div>
					<div class="sub_top fl">单价</div>
					<div class="sub_top fl">数量</div>
					<div class="sub_top fl">小计</div>
					<div class="sub_top fr">操作</div>
					<div class="clear"></div>
				</div>

				@foreach($carList as $k => $v)
				<div class="content2 center">
					<div class="sub_content fl ">
						<input type="checkbox" value="{{$v->carid}}" data-carid="{{$v->carid}}" data-goods_id="{{$v->goods_id}}" data-goods_price="{{$v->goods_price}}" class="quanxuan" title=""/>
					</div>
					<div class="sub_content fl">
						<img src="{{asset('/storage/goodsImg/'.$v->goods_img)}}" width="100px" height="100px">
					</div>
					<div class="sub_content fl ft20">{{$v->goods_name}}</div>
					<div class="sub_content fl ">{{$v->goods_price}}</div>
					<div class="sub_content fl">
						<input class="shuliang goods_num_{{$v->carid}}" type="number" value="{{$v->num}}" title="" step="1" min="1"  id="{{$v->carid}}" {{$v->carid=='#'?'disabled':''}}>
					</div>
					<div class="sub_content fl">{{$v->goods_price * $v->num}}</div>
					<div class="sub_content fl"><a href="javascript:;" class="del" id="{{$v->carid}}" title="删除">×</a></div>
					<div class="clear"></div>
				</div>
				@endforeach

			</div>

			<div class="jiesuandan mt20 center">
				<div class="tishi fl ml20">
					<ul>
						<li><a href="/">继续购物</a></li>
						<li>|</li>
						<li>共<span>{{$count}}</span>件商品，已选择<span id="num">0</span>件</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="jiesuan fr">
					<div class="jiesuanjiage fl">合计（不含运费）：<span id="money">0元</span></div>
					<div class="jsanniu fr">
						@if(empty($thisUser))
							<input class="jsan" type="button" name="loginNo" value="请登录再结算"/>
						@else
							<input class="jsan" type="button" name="jiesuan"  value="去结算"/>
						@endif
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>


	<!-- footer -->
	<footer class="center">
			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
	</footer>

	</body>
</html>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>

	//未登录
	$("input[name='loginNo']").on('click',function () {
		alert('请先登录');
    });

	//结算订单
	$("input[name='jiesuan']").on('click',function () {
	    var carid = [];
		var data = [];
		var tr_goods = $("input[type='checkbox']");

		if(tr_goods.length <= 1){
		    alert('您的购物车是空的，快去购物吧');return false;
		}

		//整理必要数据  购物车数据编号  购买的商品id及数量
		$.each(tr_goods,function (k,v) {
			if(k != 0){
				if($(v).prop('checked')){
				    carid.push($(v).attr('data-carid'));
				    data.push(
                        {
							'goods_id':$(v).attr('data-goods_id'),
							'goods_num':$(".goods_num_" + $(v).attr('data-carid')).val(),
							'goods_price':$(v).attr('data-goods_price'),
                        }
					);
				}
			}
        });

		if(carid.length <= 0){
		    alert('请勾选商品');return false;
		}

		$.get('/inputorder',{data:data,carid:carid},function (jsonMsg) {
			if(jsonMsg.errorCode == 200){
			    alert('提交成功');
			    location.href = "/order/list";
				console.log(jsonMsg.data);
			}else if(jsonMsg.errorCode == 501){
			    alert('请先登录');
			    location.href = '/login';
			}else{
                alert('提交订单失败,请重试');
			}
        })

    });



	$('.quanxuan').change(function () {
		if($(this).val() == 'quanxuan'){
			if($(this).prop('checked')){
				var checked = true;
			}else{
				var checked = false;
			}
			$('.quanxuan').each(function () {
				$(this).prop('checked',checked);
			})
		}
		changeprice();
	})
	$('.del').click(function () {
		var id = $(this).attr('id');
		var _this = $(this);
		$.ajax({
			url:'shopcar/cardel',
			type:'GET',
			dataType:'json',
			data:{id:id},
			success:function(msg){
				if(msg.msg == 1){
					_this.parent().parent().remove();
				}else{
					history.go(0);
				}
			}
		})

	})
	$('.shuliang').change(function () {
		var num = $(this).val();
		var id = $(this).attr('id');
		var _this = $(this);
		$.ajax({
			url:'shocar/carchange',
			type:'GET',
			dataType:'json',
			data:{id:id,num:num},
			success:function(msg){
				if(msg.msg == 1){
					_this.parent().next().text(_this.parent().prev().text() * num);
					changeprice();
				}else{
					history.go(0);
				}
			}
		})

	})
	function changeprice(){
		var money = 0;
		var num = 0;
		$('.quanxuan').each(function () {
			if($(this).val() != 'quanxuan'){
				if($(this).prop('checked')){
					money += parseFloat($(this).parent().next().next().next().next().next().text());
					num += parseInt($(this).parent().next().next().next().next().children().val());
				}
			}
		})
		$('#money').text(money+'元');
		$('#num').text(num)
	}
</script>