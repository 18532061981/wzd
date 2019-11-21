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
        {{--@csrf--}}
     <form action="{{url('reg/save')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" name="login_email" id="login_email"/></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="code"/>
       <button type="button" class="btn btn-info" id="sendEmailCode">获取验证码</button>
       </div>
       <div class="lrList"><input type="password" placeholder="设置新密码（6-18位数字或字母）" name="login_pwd" id="login_pwd"/></div>
       <div class="lrList"><input type="password" placeholder="再次输入密码" name="login_pwds" id="login_pwds"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
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
        $(document).on('click','#sendEmailCode',function(){
            var login_email = $('#login_email').val();
         //   alert(login_email);
            var reg=/^[0-9a-z]+@[0-9a-z]+\.com$/i;
            if(login_email==''){
                alert('邮箱不能为空');
                return false;
            }else if(!reg.test(login_email)){
                alert('邮箱格式不正确');
                return false;
            }
            $.post(
                    "{{url('reg/send')}}",
                    {login_email:login_email,_token:"{{csrf_token()}}"},
                    function(res){
                        alert('发送成功');
                        return false;
                    }
            );
        });


        $(document).on('blur','#login_pwds',function(){
            var login_pwd = $('#login_pwd').val();
            var login_pwds = $('#login_pwds').val();
            if(login_pwd!==login_pwds){
                alert('确认密码与密码不一致');
                return false;
            }
//            alert(23135665);

        });
    </script>



@endsection

