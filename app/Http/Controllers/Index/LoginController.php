<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Login;

class LoginController extends Controller
{
    //
    public function add(){
        $login = new Login();
        $data = request()->except('_token');
//        dd($data);
        $info = $login->first();
//        dd($info);
       if($data['login_pwd']!==$info['login_pwd']){
           echo "<script>alert('密码或账号错误');location='/login'</script>";
       }else{
           echo "<script>alert('登录成功');location='/'</script>";
       }


    }
}
