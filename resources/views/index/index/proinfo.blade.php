@extends('layouts.shop')
@section('title', '洗钱组织')
@section('content')
    <script src="/static/index/js/jquery.min.js"></script>
    <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
         <img src="{{env('UPLOAD_URL')}}{{$goods->goods_img}}" alt="">
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange" >{{$goods->goods_price}}</strong></th>
          <td>
              <input type="hidden" id="goods_id" value="{{$goods->goods_id}}">
              <input type="hidden" id="goods_price" value="{{$goods->goods_price}}">
              <input type="hidden" id="goods_num" value="{{$goods->goods_num}}">
              <input type="text" id="buy_number" class="spinnerExample" />
          </td>
      </tr>
      <tr>
       <td>
        <strong >{{$goods->goods_name}}</strong>
        <p class="hui" >{{$goods->goods_desc}}</p>
       </td>
       <td align="right">
        {{--<a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>--}}
           <a href="index.html"><span class="glyphicon glyphicon-home"></span></a><td><a href="javascript:void(0)" id="car_add">加入购物车</a></td>
       </td>
      </tr>
     </table>
     <script>
         $(document).on('click','#car_add',function(){
//             alert(123);
             var goods_price = $('#goods_price').val();
             var goods_num = $('#goods_num').val();
             var goods_id = $('#goods_id').val();
             var buy_number = $('#buy_number').val();
             $.post(
                     "{{url('index/car_add')}}",
                     {goods_id:goods_id,goods_num:goods_num,goods_price:goods_price,buy_number:buy_number,_token:"{{csrf_token()}}"},
                     function(res){
                        if(res==1){
                            location.href='{{url('index/car')}}';
                        }
                     }
             )

         });
     </script>

@endsection

