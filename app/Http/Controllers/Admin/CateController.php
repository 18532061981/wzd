<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Model\Cate;

class CateController extends Controller
{
    //添加
    public function add(){
        $cateInfo=Cate::get();
        $data=$this->getcateInfo($cateInfo);
        return view('cate/add',['data'=>$data]);
    }

    /**无限极分类 */
    public function getcateInfo($cateInfo,$parent_id=0,$level=1){
        static $info = [];
        foreach($cateInfo as $k=>$v){
            if($v['parent_id']==$parent_id){
                $v['level']=$level;
                $info[]=$v;
                $this->getcateInfo($cateInfo,$v['cate_id'],$level+1);
            }
        }
        return $info;
    }

    //添加入库
    public function insert(){
        $cate = new Cate();
        $data=request()->except('_token');
//        dd($data);
        $res=$cate->insert($data);
//        dd($res);
        if($res){
            echo "<script>alert('添加成功');location='/cate/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/cate/add' </script>";
        }
    }
    //列表展示
    public function list(){
        $cate = new Cate();
        $cate_name = request()->cate_name;
//        dump($cate_name);
        $where=[];
        if($cate_name){
            $where[]=['cate_name','like',"%$cate_name%"];
        }
        $data=$cate->where($where)->paginate(4);
        $query = request()->all();
        return view('cate/list',['data'=>$data,'query'=>$query]);
    }
    //删除
    public function delete($cate_id){
//        dd($cate_id);
        $cate = new Cate();
        $res = $cate->where('cate_id',$cate_id)->delete();
        if($res){
            echo "<script>alert('删除成功');location='/cate/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/cate/list'</script>";
        }
    }
    //修改页面
    public function upda($cate_id){
        $cate = new Cate;
        $cateInfo=$cate::get();
        $data=$cate->where('cate_id',$cate_id)->first();
        return view('cate/upda',['data'=>$data,'cateInfo'=>$cateInfo]);
    }

    //修改执行页面
    public function update($cate_id){
//        dd($cate_id);
        $post = request()->except('_token');
//        dd($post);
        $cate = new Cate();
        $res = $cate->where('cate_id',$cate_id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location='/cate/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/cate/list'</script>";
        }
    }

}
