<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*品牌*/
Route::prefix('brand')->group(function(){
    Route::any('add','Admin\BrandController@add')->middleware('checklogin');//添加页面
    Route::any('insert','Admin\BrandController@insert');//添加入库
    Route::any('list','Admin\BrandController@list');//列表展示
    Route::any('delete/{id}','Admin\BrandController@delete');//删除
    Route::any('upda/{id}','Admin\BrandController@upda');//修改展示页面
    Route::any('update/{id}','Admin\BrandController@update');//修改执行
    Route::any('checkOnly','Admin\BrandController@checkOnly');//验证唯一性
});


/*商品*/
Route::prefix('goods')->group(function(){
    Route::any('add','Admin\GoodsController@add');//添加页面
});

/*分类*/
Route::prefix('cate')->group(function(){
    Route::any('add','Admin\CateController@add');//添加页面
    Route::any('insert','Admin\CateController@insert');//添加入库
    Route::any('list','Admin\CateController@list');//列表展示
    Route::any('delete/{id}','Admin\CateController@delete');//删除
    Route::any('upda/{id}','Admin\CateController@upda');//修改展示页面
    Route::any('update/{id}','Admin\CateController@update');//修改执行
});

/*管理员*/
Route::prefix('admin')->group(function(){
    Route::any('add','Admin\AdminController@add');//添加页面
    Route::any('insert','Admin\AdminController@insert');//添加入库
    Route::any('list','Admin\AdminController@list');//列表展示
    Route::any('delete/{id}','Admin\AdminController@delete');//删除
    Route::any('upda/{id}','Admin\AdminController@upda');//修改展示页面
    Route::any('update/{id}','Admin\AdminController@update');//修改执行
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*链接*/
Route::prefix('lj')->middleware('CheckToken')->group(function(){
    Route::any('add','Admin\LjController@add');//添加页面
    Route::any('insert','Admin\LjController@insert');//添加入库
    Route::any('list','Admin\LjController@list');//列表展示
    Route::any('del/{id}','Admin\LjController@del');//删除
    Route::any('upda/{id}','Admin\LjController@upda');//修改展示页面
    Route::any('update/{id}','Admin\LjController@update');//修改执行
});


    Route::any('/','Index\IndexController@index');//主页
    Route::view('/login','index.login.login');//登录
    Route::view('/reg','index.login.reg');//注册


//注册
Route::prefix('reg')->group(function(){
    Route::any('/send','Index\RegController@send');//发送验证码
    Route::any('/save','Index\RegController@save');//添加入库
});
//登录
Route::prefix('login')->group(function(){
   Route::any('/add','Index\LoginController@add');//登录
});

//主页
Route::prefix('index')->group(function(){
    Route::any('proinfo/{id}','Index\IndexController@proinfo');//详情页
    Route::any('car_add','Index\IndexController@car_add');//加入购物车
    Route::any('car','Index\IndexController@car');//购物车页
    Route::any('prolist','Index\IndexController@prolist');//全部商品展示
    Route::any('pay/{id}','Index\IndexController@pay');//确认订单页
});


Route::prefix('ass')->group(function(){
    Route::any('ass','Admin\SbController@ass');//详情页
});

