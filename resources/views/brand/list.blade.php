<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="brand_name" value="{{$query['brand_name']??''}}" placeholder="请输入品牌名称关键字">
    <input type="text" name="brand_url" value="{{$query['brand_url']??''}}" placeholder="请输入品牌网址">
    <input type="submit" value="搜索">
</form>
<br>
<table border="1">
    <tr>
        <td>品牌id</td>
        <td>品牌名称</td>
        <td>品牌网址</td>
        <td>品牌logo</td>
        <td>是否上架</td>
        <td>操作</td>
    </tr>
        @foreach($data as $k=>$v)
    <tr>
        <td>
            {{$v->brand_id}}
        </td>
        <td>
            {{$v->brand_name}}
        </td>
        <td>
            {{$v->brand_url}}
        </td>
        <td>
            <img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" style="width: 80px;height: 70px">
        </td>
        <td>
            {{$v->is_show==1?'上架':'不上架'}}
        </td>
        <td>
            <a href="{{url('brand/delete/'.$v->brand_id)}}">删除</a>
            <a href="{{url('brand/upda/'.$v->brand_id)}}">修改</a>
        </td>
    </tr>
            @endforeach
</table>
    {{$data->appends($query)->links()}}
</body>
</html>