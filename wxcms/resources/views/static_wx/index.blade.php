<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>爱乌及屋</title>
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
		<link href="{{url('static_wx/css/style.css')}}" rel="stylesheet" type="text/css" />
		<script src="{{url('static_wx/js/jquery-1.8.2.min.js')}}"></script>
		<script src="{{url('static_wx/js/comment.js')}}"></script>
		
		 <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6LgOMCDWb7FOHEtg9YKDQldEhP1kYS9N">


<script type='text/javascript'>

function getLocation()
{
if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(showMap, handleError, {enableHighAccuracy:true, maximumAge:1000});
}else{
alert("您的浏览器不支持使用HTML 5来获取地理位置服务");
}
}

function showMap(value)
{
var longitude = value.coords.longitude;
var latitude = value.coords.latitude;
var map = new BMap.Map('map');
var point = new BMap.Point(115.864528, 28.687675);    // 创建点坐标
map.centerAndZoom(point, 15);
var marker = new BMap.Marker(new BMap.Point(115.864528,28.687675));  // 创建标注
map.addOverlay(marker);              // 将标注添加到地图中
}

function handleError(value)
{
switch(value.code){
case 11:
alert('位置服务被拒绝');
break;
case 2:
alert('暂时获取不到位置信息');
break;
case 3:
alert('获取信息超时');
break;
case 4:
alert('未知错误');
break;
}
}

function init()
{
getLocation();
}

window.onload = init;
</script>
	</head>
	<body>
		<header id="header">
			<div class="top">
				<div class="city">
					<span><font class='add_city'>北京</font>
					<i><img src="{{url('static_wx/img')}}/xiala.png"/></i></span>
				</div>
				<div class="select_city" style="display: none;">
					<!--<span class="ui-dropmenu-arrow" style="left: 25%; right: auto;"></span>-->
					<div class="select-return">
						<a href="javascript:;" class="return-btn">返回</a>选择城市
					</div>
					<h6>当前定位的城市</h6>
					<span class="fail">定位为：<font class='add_city'>北京</font></span>
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
			<div class="text"></div>
			<div class="search">
				<input class="search-input" type="text" placeholder="输入小区或商圈名开始找房" />
				<a href="{{url('rentlist')}}" class="search-icon"><img src="{{url('static_wx/img')}}/search.png"/></a>
			</div>
		</header>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="nav">
  <tr>
    <td><a href="{{url('rentlist')}}"><i><img src="{{url('static_wx/img')}}/house.png"></i><span>二手房<br/>海量房源任你挑</span></a></td>
    <td><a href="{{url('rentlist')}}"><i><img src="{{url('static_wx/img')}}/rent.png"></i><span>租房<br/>租房生活新理念</span></a></td>
  </tr>
  <tr>
    <td style="border-bottom: 0;"><a href="{{url('landlord')}}"><i><img src="{{url('static_wx/img')}}/agent.png"></i><span>房东<br/>直通房东，找房无忧</span></a></td>
    <td style="border-bottom: 0;"><a href="enter.html" style="margin-left: -0.875rem;"><i><img src="{{url('static_wx/img')}}/new.png"></i><span>走进我们<br/>了解爱乌及屋</span></a></td>
  </tr>
</table>
<div class="main">
	<ul class="list">
		<li class="jsq"><a href="{{url('fd_login')}}">我是房东</a></li>
		<li class="fjsq"><a href="{{url('rentlist')}}">我要租房</a></li>
	</ul>
</div>
        <div class="hot-house">猜你喜欢</div>
        <ul class="house-list">
        	<li>
        		<a href="{{url('housedetail')}}">
        		<img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        		<p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		<p class="house-type">2室2厅  89m²  南北</p>
        		<p class="house-address">山东路</p>
        		<p class="house-tag">
        			<span class="yaoshi">有钥匙</span>
        			<span class="xuequ">学区房</span>
        			<!--<span class="new">地铁房</span>-->
        			<span class="dujia">独家</span>
        		</p>
        		<span class="h-price" title="93">93万</span>
        		</a>
        	</li>
        	<li>
        		<a href="{{url('housedetail')}}">
        		<img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        		<p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		<p class="house-type">2室2厅  89m²  南北</p>
        		<p class="house-address">山东路</p>
        		<p class="house-tag">
        			<span class="yaoshi">有钥匙</span>
        			<span class="xuequ">学区房</span>
        			<!--<span class="new">地铁房</span>-->
        			<span class="dujia">独家</span>
        		</p>
        		<span class="h-price" title="93">93万</span>
        		</a>
        	</li>
        	<li>
        		<a href="{{url('housedetail')}}">
        		<img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        		<p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		<p class="house-type">2室2厅  89m²  南北</p>
        		<p class="house-address">山东路</p>
        		<p class="house-tag">
        			<span class="yaoshi">有钥匙</span>
        			<span class="xuequ">学区房</span>
        			<!--<span class="new">地铁房</span>-->
        			<span class="dujia">独家</span>
        		</p>
        		<span class="h-price" title="93">93万</span>
        		</a>
        	</li>
        </ul>
    <div style="height:50px; width:100%;"></div>
    <ul class="foot">
    	<li><a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/home.png" /><p>首页</p></a></li>
    	<li><a href="{{url('housedetail')}}"><img src="{{url('static_wx/img')}}/ershoufang.png" /><p>二手房</p></a></li>
    	<li><a href="{{url('rentlist')}}"><img src="{{url('static_wx/img')}}/renting.png" /><p>租房</p></a></li>
    	<li><a href="{{url('zf')}}"><img src="{{url('static_wx/img')}}/menber.png" /><p>我</p></a></li>
    </ul>
    <div id="allmap" style="display:none"></div>   
	</body>

<script>
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,12);

	function myFun(result){
		var cityName = result.name;
		map.setCenter(cityName);
		$(".add_city").html(cityName);
		
	}
	var myCity = new BMap.LocalCity();
	myCity.get(myFun);

   
</script>
</html>
