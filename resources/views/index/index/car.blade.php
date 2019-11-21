@extends('layouts.shop')
@section('title', '洗钱组织')
@section('content')
     <header>
         <script src="/jquery-3.2.1.min.js"></script>
         <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="{{asset('/static/index/images/head.jpg')}}" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     <tr>
         <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" value="check1"/> 全选</a></td>
     </tr>
     @foreach($data as $k=>$v)
         <div class="dingdanlist">
             <table>
                 <tr goods_id="{{$v->goods_id}}">
                     <td width="4%"><input type="checkbox" name="1" class="check2"/></td>
                     <td class="dingimg" width="15%"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" /></td>
                     <td width="50%">
                         <h3>{{$v->goods_name}}</h3>
                         <time>下单时间：{{date("Y-m-d h:i:s",$v->add_time)}}</time>
                     </td>
                     <td align="right">
                         <button style="width:25px;" class="less">-</button>
                         <input type="text"   style="width:30px;text-align:center;" value="{{$v->buy_number}}" class="buy_number">
                         <button style="width:25px;" class="add">+</button>
                     </td>
                     <input type="hidden" class="goods_num" value="{{$v->goods_num}}">
                 </tr>
                 <tr>
                     <th colspan="4"><strong class="orange">¥{{$v->add_price*$v->buy_number}}</strong></th>
                 </tr>
                 <tr>
                     <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 删除</a></td>
                 </tr>
             </table>
         </div><!--dingdanlist/-->
     @endforeach
     <div class="height1"></div> ,
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphic////on glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥69.88</strong></td>
       <td width="40%"><a href="#" class="jiesuan" id="submit">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
     <script>

       $(document).on("click",'.click2',function(){
           alert(222)
       })



         /*点击全选*/
         $(document).on('click',".check1",function(){
             var _this=$(this);
             var checked=_this.prop('checked');
             $('.check2').prop('checked',checked);
         })
     </script>
    @endsection
