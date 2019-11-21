@extends('layouts.shop')
@section('title', '洗钱组织')
@section('content')
 <script src="{{asset('/jquery-3.2.1.min.js')}}"></script>
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="{{asset('/static/index/images/head.jpg')}}" />
     </div><!--head-top/-->
     <form action="{{url('login/add')}}" method="get" class="reg-login">
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('reg')}}">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" name="login_email" id="login_email"/></div>
       <div class="lrList"><input type="password" placeholder="输入密码" name="login_pwd" id="login_pwd"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" class="btn" id="submit" value="立即登录" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     <div class="footNav">
      <dl>
       <a href="index.html">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="prolist.html">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="car.html">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="user.html">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>
     </div><!--footNav/-->
     <script>
      $(document).on('click','#submit',function(){
//          alert(123);
       var login_email = $('#login_email').val();
//       alert(login_email);
       if(login_email==''){
        alert('账号不能为空');
        return false;
       }

       var login_pwd = $('#login_pwd').val();
       if(login_pwd==''){
        alert('密码不能为空');
        return false;
       }
//       alert(13);

      });

     </script>
@endsection