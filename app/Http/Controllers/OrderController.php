<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/6/20
 * Time: 14:30
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Model\Goods;
class OrderController extends Controller
{

    public function orderShow(Request $request)
    {
        $data = $request->session()->get('thisUser');
        if(!empty($data))
        {
            $res = DB::table('order')->join('status','order.o_status','=','s_id')->where('uid','=',$data['uid'])->select()->get();
            return view('index.order.order')->with(['data'=>$res]);
        }else{

            return view('index.login.login',['thisUser'=>$data]);
        }


    }

    //订单支付成功 -> 处理订单和优惠券状态
    public function handleAliPay()
    {
        $data = \request()->input();
        if(empty($data)){
            return;
        }

//        var_dump($data);die();

        //用户id
        $u_id = \request()->session()->get('thisUser')['data']['uid'];
        //订单id
        $order_id = $data['out_trade_no'];
        //优惠券信息
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        $discount_id = $redis->get($order_id);
        //实际支付价格
        $actual_price = $data['total_amount'];

        DB::beginTransaction();

        DB::table('user_discount')
            ->where('id','=',$discount_id)
            ->where('u_id','=',$u_id)
            ->update(['status' => 2]);

        DB::table('order')
            ->where([
                'uid' => $u_id,
                'o_num' => $order_id,
            ])
            ->update([
                'o_status' => 2,
                'actual_price' => $actual_price
            ]);

        DB::commit();

    }

    public function list(){

<<<<<<< HEAD
=======
        $this->handleAliPay();

>>>>>>> jiaxinchen-master
        $res = \request()->session()->get('thisUser');
        $uid = \request()->session()->get('thisUser')['data']['uid'];
        $data = DB::table('order')

            ->where('uid',$uid)
            ->select('o_id','o_price','o_status')
            ->get();

        foreach ($data as $v){
            $order = DB::table('ordergoods')->where('order_id',$v->o_id)->select('goods_id')->get();
            $v->order = $order;
            foreach ($v->order as $v){
                $child = DB::table('goods')->where('goods_id',$v->goods_id)->select('goods_img')->first();
                $v->goods_img = $child->goods_img;
            }
        }
        return view('index.order.list',['data'=>$data,'thisUser'=>$res['data']]);
    }

    public function details(){

        $res = \request()->session()->get('thisUser');
        $o_id = \request()->input('o_id');

        //订单信息
        $data = DB::table('order')
            ->leftJoin('ordergoods',function($join){
                $join->on('order.o_id','=','ordergoods.order_id');
            })
            ->leftJoin('status',function($join){
                $join->on('order.o_status','=','status.s_id');
            })
            ->leftJoin('goods',function($join){
                $join->on('ordergoods.goods_id','=','goods.goods_id');
            })
            ->where(
                [
                    'o_id'=>$o_id,
                    'uid'=>$res['data']['uid']
                ]
            )
            ->select(DB::raw('
                   weshop_order.o_id,
                   weshop_order.o_status,
                   weshop_order.o_price,
                   weshop_order.o_addtime,
                   weshop_order.o_num,
                   
                   weshop_status.status,
                   
                   weshop_ordergoods.goods_id,
                   
                   weshop_goods.goods_name,
                   weshop_goods.goods_img,
                   weshop_goods.goods_price
            '))
            ->get();
//        var_dump($data);die();

        //查询优惠券信息
        $discount = DB::table('user_discount')
            ->where('u_id','=',$res['data']['uid'])
            ->where('user_discount.status','=',1)

            ->leftJoin('discount',function ($query){
                $query->on('user_discount.discount_id','=','discount.id');
            })

            ->select(DB::raw('
                weshop_user_discount.id,
                weshop_user_discount.discount_id,
                weshop_discount.money,
                weshop_discount.name
            '))
            ->where('discount.end','>',time())
            ->get();
//        var_dump($discount);die();

        return view('index.order.details',[
            'data'=>$data,'thisUser'=>$res['data'],
            'discount' => $discount,
        ]);
    }

    public function inputorder()
    {
        if(\request()->ajax()){
            $u_id = \request()->session()->get('thisUser')['data']['uid'];

            //接收提交的订单中包含的购物车数据id
            //接收提交订单中包含商品的id和数量
            $carid = \request()->get('carid');
            $data = \request()->get('data');

            DB::beginTransaction();

            /**
             * 添加订单->计算必要字段值
             *          订单编号 num
             *          商品总数 total
             *          总价格    price
             *          添加时间 addtime
             *          用户id     uid
             */
            $num = 'Ord' . time() . 'U' . $u_id;
            $total = array_sum(array_column($data,'goods_num'));
            $price = array_sum(array_column($data,'goods_price'));

            $res = DB::table('order')->insert([
                'o_num' => $num,
                'o_total' => $total,
                'o_price' => $price,
                'o_addtime' => time(),
                'uid' => $u_id,
            ]);
            if(!$res){
                DB::rollBack();
                return response()->json([
                    'errorCode' => 201,
                    'errorMsg' => '提交失败',
                    'data' => [],
                ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }

            $orderLastId = DB::getPdo()->lastInsertId();

            /**
             * 添加订单商品 ->计算必要字段值
             *             订单id  order_id
             *             商品id  goods_id
             *             商品数量 goods_num
             */
            foreach ($data as $k => $v){
                $data[$k]['order_id'] = $orderLastId;
            }

            $res = DB::table('ordergoods')->insert($data);
            if(!$res){
                DB::rollBack();
                return response()->json([
                    'errorCode' => 202,
                    'errorMsg' => '提交失败',
                    'data' => []
                ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }

            /**
             * 更新购物车 数据状态
             */
            $res = DB::table('shoppingcar')
                ->whereIn('carid',$carid)
                ->update([
                    'status' => 2
                ]);

            if(!$res){
                DB::rollBack();
                return response()->json([
                    'errorCode' => 203,
                    'errorMsg' => '提交失败',
                    'data' => []
                ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }else{
                DB::commit();
                return response()->json([
                    'errorCode' => 200,
                    'errorMsg' => '提交成功',
                    'data' => ['order_id' => $orderLastId]
                ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }


        }
    }

}