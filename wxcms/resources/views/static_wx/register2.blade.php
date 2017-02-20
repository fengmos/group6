<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="height=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <title></title>
    <link rel="stylesheet" href="{{url('static_wx/css/common.css')}}"/>
    <link rel="stylesheet" href="{{url('static_wx/css/register.css')}}"/>
</head>
<body>
<div class="register">
    <div class="regTop">
        <span>用户注册</span>
        <a class="back" href="{{url('fd_login')}}">&lt;&nbsp;返回</a>
    </div>
    <div class="content">
        <div class="point">
            <span>注册成功后，手机号也可为登录账号。</span>
        </div>
        <form action="regis" method="post" onsubmit="return checksubmit()">
            <select name="job" id="job">
                <option value="1">房东</option>
                <option value="2">租户</option>
            </select>
            <select>
                <option value="0">性别</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
            <div class="message">

                <input type="email" name='email' placeholder="用户名"  required/>
                <input type="email" name='email' placeholder="姓名"  required/>

                <input type="email" name='email'placeholder="年龄"  required/>
                <input type="email" name='email'placeholder="邮箱"  required/>
                <input type="tel" placeholder="输入手机号" pattern="[0-9]{11}" name="mobile_phone" required/>
                <input type="password" placeholder="请输入6-25位密码" name="password" pattern="[0-9A-Za-z]{6,25}" required/>
                <input type="password" placeholder="请再次输入密码" name="rpassword" pattern="[0-9A-Za-z]{6,25}" required/>
                 <input type="text" placeholder="输入验证码" pattern="[0-9]{6}" class="yz" required/>
                {{--  <select name="job">
                      <option value="0">选择角色</option>
                      <option value="1">房东</option>
                      <option value="2">租户</option>
                  </select>--}}

                 <a class="code" id="btn"  required>免费获取验证码</a>
            </div>
            <span class="zz"></span>
            <div class="agree">
                <input name='ty'type="checkbox"/><span>&nbsp;同意&nbsp;</span><a href="">《注册协议》</a>
            </div>
            <button class="submit" type="submit">注册</button>
        </form>
    </div>
</div>
</body>
</html>
<script src="./js.js"></script>
<script>
    $(function(){
        //验证手机号码的正确性
        $(".code").click(function(){
            var mobile_phone=$("input[name='mobile_phone']").val();
            if(!(/^1[34578]\d{9}$/.test(mobile_phone))){
                alert("手机号码有误，请重填");
                /*$(".zz").html("手机号码有误，请重填");*/
                return false;
            }else
            {
                //发送手机号
                $.ajax({
                    type:'post',
                    url:"{{url('registers')}}",
                    data:{
                        mobile_phone:mobile_phone
                    },
                    success:function(data){
                        if(data==1)
                        {
                            alert('发送成功');
                        }
                        return true;
                    }
                });
            }
        });
        //验证验证码是否一致
        $('.yz').blur(function(){
            var zhi=$(this).val();
            //发送给后台做判断
            $.ajax({
                type:'post',
                url:"{{url('contrast')}}",
                data:{
                    zhi:zhi
                },
                success:function(data){
                    if(data==1)
                    {
                        alert("验证码正确");
                        return true;
                    }else
                    {
                        alert("请重新发送");
                        return false;
                    }
                }
            });
        });
        //验证邮箱的唯一性
        $("input[name='email']").blur(function(){
            var job=$('#job option:selected') .val();//选中的值
            var email=$(this).val();
            $.ajax({
                type:"post",
                url:"sole",
                data:{
                    email:email,
                    job:job
                },
                success:function(data){
                    if(data==1)
                    {
                      /*  $(".email").html("该邮箱已经存在");*/
                        alert("该邮箱已经存在");
                    }
                }
            });
        });
    });
    function checksubmit(){
        if($("input[name='ty']:checked").val()==null)
        {
            alert("请签署同意协议");
            return false;
        }else
        {
            return true;
        }
    }
</script>
