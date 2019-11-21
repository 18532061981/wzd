<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cate;
use App\Model\Lj;
class LjController extends Controller
{
    //显示页面
    public function add(){
        $cateInfo=Cate::get();
        $data=$this->getcateInfo($cateInfo);
        return view('lj/add',['data'=>$data]);
    }
    //添加入库
    public function insert(){
        $lj = new Lj();
        $data = request()->except('_token');
        //        文件上传
        if(request()->hasFile('lj_img')){
            $data['lj_img'] = $this->upload('lj_img');
        }
//        $reg='/^[\u4e00-\u9fa5\w]{2,6}$/';
//        $reg="/^[u4e00-u9fa5\w]{2,6}$/";
        if(empty($data['lj_name'])){
            echo "<script>alert('文章标题不能为空,请输入..');location='/lj/add'</script>";
            die;
        }

       /* if(!preg_match("/^[\u4e00-\u9fa5\w] $/",$data['lj_name'])){
            echo "<script>alert('文章标题格式不正确,请重新输入');location='/lj/add'</script>";
            die;
        }*/

        if(empty($data['is_hot'])){
            echo "<script>alert('文章重要性不能为空,请输入..');location='/lj/add'</script>";
            die;
        }

        if(empty($data['is_show'])){
            echo "<script>alert('文章是否显示不能为空,请输入..');location='/lj/add'</script>";
            die;
        }

        if(empty($data['cate_id'])){
            echo "<script>alert('文章分类不能为空,请输入..');location='/lj/add'</script>";
            die;
        }

        $res = $lj -> insert($data);
        if($res){
            echo "<script>alert('添加成功');location='/lj/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/lj/add' </script>";
        }
    }

    //列表展示
    public function list(){
        $lj = new Lj;
        $lj_name = request()->lj_name;
        $cate_id = request()->cate_id;
//        dump($lj_name);
        $where=[];
        if($lj_name){
            $where[]=['lj_name','like',"%$lj_name%"];
        }
        if($cate_id){
            $where[]=['cate.cate_name','like',"%$cate_id%"];
        }
        $data = $lj->join('cate','lj.cate_id','=','cate.cate_id')->where($where)->paginate(2);

//        dd($data);
        $query=request()->all();
        return view('lj/list',['data'=>$data,'query'=>$query]);
    }
    //删除
    public function del($lj_id){
        $res = Lj::find($lj_id)->delete();
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        return $data;
    }
    //修改展示页面
    public function upda($lj_id){
        $lj = new Lj();
        $cateInfo=Cate::get();
        $data=$this->getcateInfo($cateInfo);

        $res = $lj->where('lj_id',$lj_id)->first();
        return view('lj/upda',['data'=>$data,'res'=>$res]);
    }
    //修改执行页面
    public function update($lj_id){
        $lj = new Lj();
        $data=request()->except('_token');
//        dd($post);
        if(request()->hasFile('lj_img')){
            $data['lj_img'] = $this->upload('lj_img');
        }
        $res = $lj->where('lj_id',$lj_id)->update($data);
        if($res){
            echo "<script>alert('修改成功');location='/lj/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/lj/list'</script>";
        }
    }

    //文件上传
    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return  $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
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
}
