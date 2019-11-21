<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<script src="/jquery.js"></script>
<form action="{{url('lj/insert')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1">
        <tr>
            <td>文章标题</td>
            <td>
                <input type="text" name="lj_name" value="" id="lj_name" placeholder="请输入...">
            </td>
        </tr>
        <tr>
            <td>文章分类</td>
            <td>
                <select name="cate_id" id="cate_id">
                    <option value="">--请选择--</option>
                    @foreach($data as $v)
                        <option value="{{$v->cate_id}}">{{str_repeat('__',$v['level'])}}{{$v->cate_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>文章重要性</td>
            <td>
                <input type="radio" name="is_hot" value="1" checked>普通
                <input type="radio" name="is_hot" value="2" >置顶
            </td>
        </tr>
        <tr>
            <td>是否显示</td>
            <td>
                <input type="radio" name="is_show" value="1" checked>显示
                <input type="radio" name="is_show" value="2" >不显示

            </td>
        </tr>
        <tr>
            <td>文章作者</td>
            <td>
                <input type="text" name="lj_author" placeholder="请输入...">
            </td>
        </tr>
        <tr>
            <td>文章email</td>
            <td>
                <input type="text" name="lj_email" placeholder="请输入...">
            </td>
        </tr>
        <tr>
            <td>关键字</td>
            <td>
                <input type="text" name="lj_kwds"  placeholder="请输入...">
            </td>
        </tr>
        <tr>
            <td>网页描述</td>
            <td>
                <textarea name="lj_desc" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>上传文件</td>
            <td>
                <input type="file" name="lj_img">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="确定">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $('#lj_name').blur(function(){
        var val = $(this).val();
        var reg=/^[\u4e00-\u9fa5\w]{2,6}$/;
        if(val==''){
            alert('文章标题不能为空');
            return false;
        }else if(!reg.test(val)){
            alert('品牌名称不符合规范');
            return false;
        }
    });

    $('#cate_id').blur(function(){
        var cate_id = $(this).val();
//        alert(cate_id);
        if(cate_id==''){
            alert('文章分类不能为空');
            return false;
        }
    });
</script>