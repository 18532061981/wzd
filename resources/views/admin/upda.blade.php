<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('admin/update/'.$data->admin_id)}}" method="post">
    @csrf
    <table border="1">

        <tr>
            <td>账号</td>
            <td>
                <input type="text" name="admin_name" value="{{$data->admin_name}}">
            </td>
        </tr>
        <tr>
            <td>密码</td>
            <td>
                <input type="password" name="admin_pwd" value="{{$data->admin_pwd}}">
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