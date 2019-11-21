<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>分类修改</h2>
<hr>
    <form action="{{url('cate/update/'.$data->cate_id)}}" method="post">
        @csrf
        <table border="1">
            <tr>
                <td>分类名称</td>
                <td>
                    <input type="text" name="cate_name" placeholder="分类名称" value="{{$data->cate_name}}">
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    @if($data->cate_show==1)
                    <input type="radio" name="cate_show" value="1" checked>上架
                    <input type="radio" name="cate_show" value="2">不上架
                        @else
                        <input type="radio" name="cate_show" value="1">上架
                        <input type="radio" name="cate_show" value="2" checked>不上架
                     @endif
                </td>
            </tr>
            <tr>
                <td>父类</td>
                <td>
                    <select name="parent_id" value="{{$data->parent_id}}">
                        @foreach($cateInfo as $v)
                            @if($data->parent_id==$v->parent_id)
                                <option value="{{$v->cate_id}}" selected>{{str_repeat("----",$v['level'])}}{{$v->cate_name}}</option>
                            @else
                                <option value="{{$v->cate_id}}">{{str_repeat("----",$v['level'])}}{{$v->cate_name}}</option>
                            @endif
                        @endforeach
                    </select>
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