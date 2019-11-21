<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<script src="/jquery.js"></script>
<h2>品牌添加</h2>

<form action="{{url('brand/insert')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1">
        <tr>
            <td>品牌名称</td>
            <td>
                <input type="text" name="brand_name" value="" placeholder="请输入..." id="brand_name">
                <b style="color: red">@php echo $errors->first('brand_name');@endphp</b>
            </td>
        </tr>
        <tr>
            <td>品牌网址</td>
            <td>
                <input type="text" name="brand_url" placeholder="请输入..." id="brand_url">
                <b style="color: red">@php echo $errors->first('brand_url');@endphp</b>

            </td>
        </tr>
        <tr>
            <td>品牌logo</td>
            <td>
                <input type="file" name="brand_logo">
            </td>
        </tr>
        <tr>
            <td>是否上架</td>
            <td>
                <input type="radio" value="1" name="is_show" checked>上架
                <input type="radio" value="2" name="is_show">不上架

            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="提交">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $('#brand_name').blur(function(){

        var  brand_name= $(this).val();
//        alert(text);
        var reg=/^[\u4e00-\u9fa5]{2,6}$/;
//        alert(reg.test(brand_name));
        if(!reg.test(brand_name)){
//            $(this).parent().addClass('has-error');
            $(this).next().text('品牌名称不符合规范');
            return false;

        }
        //alert('123');
        //唯一性验证
        $.ajax({
            method: "POST",
            url: "{{url('/brand/checklogin')}}}",
            data:{brand_name:brand_name}
        }).done(function(msg){
            alert("Data Saved" + msg );
        });
    });

    $('#brand_url').blur(function(){
        var brand_url = $(this).val();
//        alert(brand_url);
        var reg2=/^https?:\/\/?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
//        alert(reg.test(brand_url));
        $(this).next().text('品牌网址不符合规范');
        return false;
    });
</script>