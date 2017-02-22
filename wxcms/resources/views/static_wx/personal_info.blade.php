<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <title>个人信息</title>
    <script src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
    <link href="{{url('static_wx/css/personal_info.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>

<header>
    房东个人信息
</header>

<table width="100%">
    <tr>

        <td colspan="2" align="center" height="55;"><img src="http://localhost/aiwujiwu/6group/cms/public/static_wx/img/member.png"></td>
    </tr>
    <tr>
        <td align="right">用户名:</td>
        <td align="left">
            <input type="" value="{{$fd_info->r_name}}" id="user">

        </td>
    </tr>
    <tr>
        <td align="right">电话:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_tel}}" id="tel"></td>
    </tr>
    <tr>
        <td align="right">邮箱:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_email}}" id="email"></td>
    </tr>
    <tr>
        <td align="right">注册时间:</td>
        <td align="left"><?php echo date('Y-m-d H:i:s',$fd_info->r_time)?></td>
    </tr>
    <tr>
        <td align="right">性别:</td>
        <td align="left">

            <select name="" id="sex">

                    <option value="1"  @if ($fd_info->r_sex==1) selected  @else @endif>男</option>

                    <option value="2" @if ($fd_info->r_sex==2) selected  @else @endif>女</option>



            </select>




        </td>
    </tr>
    <tr>
        <td align="right">年龄:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_age}}" id="age"></td>
    </tr>

    <tr class="acss_1">
        <td align="center" colspan="2">
            <a id="acss_left">修  改</a>

            <a href="{{url('fd_personal')}}">返  回</a>
        </td>
    </tr>

</table>

</body>

<script>
    $("#acss_left").click(function(){
        var token = "{{csrf_token()}}";
        var r_name = $("#user").val(); //用户名
        var r_tel = $("#tel").val();  //电话
        var r_email = $("#email").val();  //邮箱
        var r_sex = $("#sex").val();  //年龄 1.男 2.女


        $.ajax({
            type: "POST",
            url: "{{url('personal_info')}}",
            data: {_token:token,r_name:r_name,r_tel:r_tel,r_email:r_email,r_sex:r_sex},
            success: function(msg){
                alert( msg );
            }
        });

    })
</script>
</html>