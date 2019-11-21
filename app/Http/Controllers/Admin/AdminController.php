<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin;

class AdminController extends Controller
{
    //添加页面
    public function add(){
        return view('admin/add');
    }


    //添加入库
    public function insert(){
     $admin = new Admin();
    $post=request()->except('_token');
//        dd($post);
    $res = $admin->create($post);
        if($res){
            echo "<script>alert('添加成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/admin/add'</script>";
        }
    }

    //列表展示
    public function list(){
        $admin = new Admin();
        $data=$admin->paginate(2);

    return view('admin/list',['data'=>$data]);
    }

    //删除
    public function delete($admin_id){
//        dd($admin_id);
        $admin = new Admin();
        $res=$admin->where('admin_id',$admin_id)->delete();
        if($res){
            echo "<script>alert('删除成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/admin/list'</script>";
        }
    }
    //修改展示页面
    public function upda($admin_id){
//        dd($admin_id);
        $admin = new Admin();
        $data = $admin->where('admin_id',$admin_id)->first();
        return view('admin/upda',['data'=>$data]);
    }

    //修改执行页码
    public function update($admin_id){
//        dd($admin_id);
        $post=request()->except('_token');
//        dd($post);
        $admin = new Admin();
        $res=$admin->where('admin_id',$admin_id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/admin/list'</script>";
        }
    }

}
