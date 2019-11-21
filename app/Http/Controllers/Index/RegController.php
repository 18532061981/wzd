<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Login;

class RegController extends Controller
{
    //
    public function send(){
        $login = new Login();
        $login_email = request()->login_email;
      /*  $res = $login->where('login_email',$login_email)->first();
        if(isset($res)){
            if($res['activation']==1){
                echo 2;die;
            }
        }*/
//        $login_email = 'www3051037702@163.com';
//        dump($login_email);
        $code=rand(100000,999999);
        session(['code'=>$code,'login_email'=>$login_email]);
        $message="您正在注册洗钱组织会员,验证码为:".$code;
        $this->sendmail($login_email,$message);
    }

    public function sendmail($login_email,$message){
        \Mail::raw($message,function($message)use($login_email){
           //设置主题
            $message->subject("欢迎注册国际洗钱组织");
            //设置接待方
            $message->to($login_email);
        });
    }
    public function save(){
        $login = new Login();
        $data = request()->except(['code','login_pwds']);
//        dd($data);
        //$passwordHash = password_hash('123456', PASSWORD_BCRYPT);
//       $data=password_hash($data['login_pwd'],PASSWORD_BCRYPT);
//        $data['login_pwd']=md5($data['login_pwd']);
        $data['login_pwd']=md5($data['login_pwd']);
//        dd($data);
        $res = $login ->insert($data);
        if($res){
            echo "<script>alert('注册成功');location='/login'</script>";
        }else{
            echo "<script>alert('注册失败');location='/reg'</script>";
        }
    }
}
