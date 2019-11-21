<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>管理员id</td>
            <td>管理员名称</td>
            <td>操作</td>
        </tr>
            @foreach($data as $k=>$v)
        <tr>
            <td>{{$v->admin_id}}</td>
            <td>{{$v->admin_name}}</td>
            <td>
                <a href="{{url('admin/delete/'.$v->admin_id)}}">删除</a>
                <a href="{{url('admin/upda/'.$v->admin_id)}}">修改</a>
            </td>
        </tr>
            @endforeach
    </table>
    {{$data->links()}}
</body>
</html>