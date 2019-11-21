<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>品牌修改</h2>

<form action="{{url('brand/update/'.$res->brand_id)}}" method="post">

    @csrf
    <table border="1">
        <tr>
            <td>品牌名称</td>
            <td>
                <input type="text" name="brand_name" value="{{$res->brand_name}}">
            </td>
        </tr>
        <tr>
            <td>品牌网址</td>
            <td>
                <input type="text" name="brand_url" value="{{$res->brand_url}}">
            </td>
        </tr>
        <tr>
            <td>品牌logo</td>
            <td>

                <input type="file" name="brand_logo" value="{{$res->brand_logo}}"><br>
                <img src="{{env('UPLOAD_URL')}}{{$res->brand_logo}}" style="width: 80px;height: 70px">
            </td>
        </tr>
        <tr>
            <td>是否上架</td>
            <td>
                @if($res->is_show==1)
                    <input type="radio" value="1" name="is_show" checked>上架
                    <input type="radio" value="2" name="is_show">不上架
                @else
                    <input type="radio" value="1" name="is_show">上架
                    <input type="radio" value="2" name="is_show" checked>不上架
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="修改">
            </td>
        </tr>
    </table>
</form>
</body>
</html>