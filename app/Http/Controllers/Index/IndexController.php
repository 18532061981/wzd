<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Car;

class IndexController extends Controller
{
    //首页展示
    public function index(){
        $goods = new Goods();
        $data = $goods ->paginate(4);
//        dd($data);

        return view('index.index.index',['data'=>$data]);
    }
    //全部商品展示
    public function prolist(){
        $data = Goods::get();
        return view('index.index.prolist',['data'=>$data]);

    }

    //详情页展示
    public function proinfo($goods_id){
      $goods = Goods::where('goods_id',$goods_id)->first();
        return view('index.index.proinfo',['goods'=>$goods]);
    }

    //加入购物车
    public function car_add(){
//        dd($goods_id);
        $data = request()->except('_token');
//        dd($data);
        $res =Car::insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }

    }
    //购物车展示
    public function car(){
        $data = Car::join('goods','goods.goods_id','=','car.goods_id')->get();

        return view('index.index.car',['data'=>$data]);
    }

    //支付页
    public function pay($car_id){
    dd($car_id);
        return view('index.index.pay');
    }

}
