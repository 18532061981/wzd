<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use DB;
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller
{
    //品牌添加页面
    public function add(){

        return view('brand/add');
    }
    //添加
    public function insert(){
        $post=request()->except('_token');
//        dump($post);
//        文件上传
        if(request()->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
        }
//        dd($post);
        $res=DB::table('brand')->insert($post);
//        dd($res);
        if($res){
            echo "<script>alert('添加成功');location='/brand/list' </script>";
        }else{
            echo "<script>alert('添加失败');location='/brand/add' </script>";

        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return  $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    //展示
    public function list(){
        $brand = new Brand();
//        dd($brand);
        $page= request()->page??1;
        $word = request()->word??'';

        echo 'data_'.$page.'_'.$query['word'];
        $data = Cache::get('data_'.$page.'_'.$query['word']);
//        dump($data);
        if(!$data){
            echo 'db=====';
            $brand_name=request()->brand_name;
            $brand_url=request()->brand_url;

//        dd($brand_name);
            $where=[];
            if($brand_name){
                $where[]=['brand_name','like',"%$brand_name%"];
            }
            if($brand_url){
                $where[]=['brand_url','like',"%$brand_url%"];
            }
            $data=$brand->where($where)->paginate(3);


            Cache::put('data_'.$page, $data,1);
        }



        $query=request()->all();
      return view('brand/list',['data'=>$data,'query'=>$query]);
    }

    //删除
    public function delete($brand_id){
//        dd($brand_id);
        $brand=new Brand();
        $res =$brand->where('brand_id',$brand_id)->delete();
        if($res){
            echo "<script>alert('删除成功');location='/brand/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/brand/list'</script>";
        }
    }

    //修改展示
    public function upda($brand_id){
        $brand = new Brand;
        $res = $brand->where('brand_id',$brand_id)->first();
//        dd($res);
        return view('brand/upda',['res'=>$res]);
    }

    public function update($brand_id){
//        dd($brand_id);
        $post=request()->except('_token');
//        dd($post);
        $brand=new Brand();
        $res=$brand->where('brand_id',$brand_id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location='/brand/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/brand/list'</script>";
        }
    }
    public function checkOnly(){
        $brand_name = request()->brand_name;
        echo $brand_name;
    }

}
