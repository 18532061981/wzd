<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="cate_name" value="{{$query['cate_name']??''}}" placeholder="请输入分类名称">
    <input type="submit" value="搜索">
</form>
        <table border="1">
            <tr>
                <td>分类id</td>
                <td>分类名称</td>
                <td>是否上架</td>
                <td>父类</td>
                <td>操作</td>
            </tr>
                @foreach($data as $k=>$v)
            <tr>
                <td>{{$v->cate_id}}</td>
                <td>{{$v->cate_name}}</td>
                <td>{{$v->cate_show==1?'上架':'不上架'}}</td>
                <td>{{$v->parent_id}}</td>
                <td>
                    <a href="{{url('cate/delete/'.$v->cate_id)}}">删除</a>
                    <a href="{{url('cate/upda/'.$v->cate_id)}}">修改</a>
                </td>
            </tr>
                @endforeach
        </table>
    {{$data->links()}}
</body>
</html>