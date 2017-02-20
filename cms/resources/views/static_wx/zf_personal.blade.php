<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>欢迎登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-rim-auto-match" content="none"/>
    <meta name="HandheldFriendly" content="true"/>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/style.css')}}">
    <script src="{{url('static_wx/js/jquery-1.8.2.min.js')}}"></script>
    <script src="{{url('static_wx/js/comment.js')}}"></script>
    <script src="{{url('static_wx/js/house.js')}}"></script>
</head>
<body>
	<header class="main1">
		<a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/logo.png" class="logo"></a>
		<div class="top">
				<div class="city" style="background: none; text-indent: 0; top: 0;">
					<span>南昌
					<i><img src="{{url('static_wx/img')}}/xiala.png"></i></span>
				</div>
				<div class="select_city" style="display: none;">
					<!--<span class="ui-dropmenu-arrow" style="left: 25%; right: auto;"></span>-->
					<div class="select-return">
						<a href="javascript:vido(0);" class="return-btn">返回</a>选择城市
					</div>
					<h6>当前定位的城市</h6>
					<span class="fail">定位为：其他市,中环暂不支持~</span>
					<h6>所有城市</h6>
					<ul class="city-list">
					<li><a href="">长沙</a></li>
					<li><a href="">九江</a></li>
					<li><a href="">宜春</a></li>
					<li><a href="">乌鲁木齐</a></li>
					<li><a href="">太原</a></li>
					<li><a href="">保定</a></li>
					</ul>
				</div>
			</div>
		<a href="" class="me"><img src="{{url('static_wx/img')}}/me.png" width="20" height="30"></a>
	</header>
    <div class="member">
    	<a href="" class="touxiang"><img src="{{$touxiang}}" width="54" height="54"></a>
    	<a class="member-btn">{{$userinfo}}</a>
    </div>
    <ul class="decript-list">



        	

        	
        	<li>
        		<a href="#">租房历史</a>
        	</li>
            <li>
                <a href="#">支付记录</a>
            </li>

            <li>
                <a href="{{url('zf_personal_info')}}">个人中心</a>
            </li>
            <li>
                <a href="{{url('zf_update_pass')}}">修改密码</a>
            </li>
        	
        </ul>
</body>
</html>