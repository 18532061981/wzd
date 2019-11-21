<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>分类添加</h2>
<hr>
    <form action="{{url('cate/insert')}}" method="post">
        @csrf
        <table border="1">
            <tr>
                <td>分类名称</td>
                <td>
                    <input type="text" name="cate_name" placeholder="分类名称">
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    <input type="radio" name="cate_show" value="1" checked>上架
                    <input type="radio" name="cate_show" value="2">不上架
                </td>
            </tr>
            <tr>
                <td>父类</td>
                <td>
                    <select name="parent_id">
                        <option value="">--分类--</option>
                        @foreach($data as $v)
                            <option value="{{$v->cate_id}}">{{str_repeat('__',$v['level'])}}{{$v->cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>