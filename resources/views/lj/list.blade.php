<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="lj_name" value="{{$query['lj_name']??''}}" placeholder="请输入文章标题">
    <input type="text" name="cate_id" value="{{$query['cate_id']??''}}" placeholder="请输入文章分类">
    <input type="submit" value="搜索">
</form>
        <script src="/static/admin/jquery-3.1.1.min.js"></script>
        <script src="/static/admin/layer-v3.1.1/layer/layer.js"></script>
<table border="1">
    <tr>
        <td>id</td>
        <td>文章标题</td>
        <td>文章分类</td>
        <td>文章重要性</td>
        <td>文章显示</td>
        <td>文章作者</td>
        <td>文章email</td>
        <td>关键字</td>
        <td>描述</td>
        <td>图片</td>
        <td>编辑</td>
    </tr>
    @foreach($data as $k=>$v)
    <tr lj_id="{{$v->lj_id}}}}">
        <td>{{$v->lj_id}}</td>
        <td>{{$v->lj_name}}</td>
        <td>{{$v->cate_name}}</td>
        <td>{{$v->is_hot==1?'普通':'置顶'}}</td>
        <td>{{$v->is_show==1?'显示':'不显示'}}</td>
        <td>{{$v->lj_author}}</td>
        <td>{{$v->lj_email}}</td>
        <td>{{$v->lj_kwds}}</td>
        <td>{{$v->lj_desc}}</td>
        <td>
            <img src="{{env('UPLOAD_URL')}}{{$v->lj_img}}" style="width: 80px;height: 70px">
        </td>
        <td>
            <a style="font-size: 15px;" type="submit" class="btn" id="del">删_除</a>|
            <a href="{{url('/lj/upda/'.$v->lj_id)}}">修改</a>
        </td>
    </tr>
     @endforeach
</table>
    {{$data->appends($query)->links()}}
</body>
</html>

<script>
    $(document).on("click","#del",function(){
        var lj_id = $(this).parents('tr').attr('lj_id');
        layer.confirm('您确定要删除我吗？', {   // 使用layer.js确认弹窗
            btn: ['确定', '取消'],
        }, function() {                        // 当确定时执行
            $.post("{{ url('lj/del') }}/" + lj_id, {    // 网址、数据、成功后操作
                "_token": "{{ csrf_token() }}",
                "_method": "delete"
            }, function(data) {
                if (data.status == 0) {
                    layer.msg(data.msg, { icon: 6});
                    location.href = "{{ url('lj/list') }}";
                } else {
                    layer.msg(data.msg, { icon: 5});
                }
            });
        }, function() {});
    });
</script>