<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
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
    <script src="{{url('static_wx/js/jquery.flexslider-min.js')}}"></script>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6LgOMCDWb7FOHEtg9YKDQldEhP1kYS9N"></script>
	</head>
	<body>
		<header class="main1">
		<a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/logo.png" class="logo"></a>
		<div class="top">
				<div class="city" style="background: none; text-indent: 0; top: 0;">
					<span>北京
					<i><img src="{{url('static_wx/img')}}/xiala.png"></i></span>
				</div>
				<div class="select_city" style="display: none;">
					<!--<span class="ui-dropmenu-arrow" style="left: 25%; right: auto;"></span>-->
					<div class="select-return">
						<a href="javascript:;" class="return-btn">返回</a>选择城市
					</div>
					<h6>当前定位的城市</h6>
					<span class="fail">定位为：其他市,{{url('static_wx/img')}}/暂不支持~</span>
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
	<nav class="nav1">
		<a href="" class="home" style="margin-left: 0.938rem;">爱屋网</a>
		<a href=""  class="home">租房</a>
		<a href="">北京租房</a>
	</nav>
	<!--图片轮换-->
	<div class="block_home_slider">
                        	<div id="home_slider" class="flexslider">
                            	<ul class="slides">
                                	<li>
                                    	<div class="slide">
                                            <img src="{{url('static_wx/img')}}/pic_home_slider_1.jpg" alt="" />

                                        </div>
                                    </li>

                                    <li>
                                    	<div class="slide">
                                            <img src="{{url('static_wx/img')}}/pic_home_slider_2.jpg" alt="" />
                                            <!--<div class="caption">
                                                <p class="title">国内金准营销服务中心</p>
                                                <p>90天让您的网站升级100倍。国内金准营销服务中心.国内金准营销服务中心国内金准营销服务中心国内金准营销服务中心国内金准营销服务中心</p>
                                            </div>-->
                                        </div>
                                    </li>

                                    <li>
                                    	<div class="slide">
                                            <img src="{{url('static_wx/img')}}/pic_home_slider_3.jpg" alt="" />
                                        </div>
                                    </li>

                                    <li>
                                        <div class="slide">
                                            <img src="{{url('static_wx/img')}}/pic_home_slider_4.jpg" alt="" />

                                        </div>
                                    </li>


                                </ul>
                            </div>
                            <div class="num-pic">1/5</div>
                            <script type="text/javascript">
								$(function () {
									$('#home_slider').flexslider({
										animation : 'slide',
										controlNav : true,
										directionNav : true,
										animationLoop : true,
										slideshow : false,
										useCSS : false
									});

								});
							</script>
                        </div>
                       <!--图片轮换-->
        <div class="house-detai">
        	<a href="" class="detail-title">如果要观望,我建议你看完这个房子后再观望,一定不会让您失望！</a>
        	<a href="" class="detai-attention">
        		<i class="attention-ico"></i>
        		<p>关注</p>
        	</a>
        </div>
        <div class="detail-list">
        	<div class="detai-price">
        		<p>售价</p>
        		<p><span>{{$list->r_price}}</span></p>
        	</div>
        	<div class="detai-price">
        		<p>户型</p>
        		<p><span>{{$list->r_type}}</span></p>
        	</div>
        	<div class="detai-price">
        		<p>面积</p>
        		<p><span>{{$list->r_area}}</span></p>
        	</div>
        </div>
        <ul class="decript-list">
        	<li>
        		<span class="color" style="float: left;">特点：</span>
        		<div class="house-tag1" style=" ">
        			<i class="yaoshi">有钥匙</i>
        			<i class="xuequ">学区房</i>
        			<i class="dujia">独家</i>
        			<i class="new">满两年</i>
        		</div>
        	</li>
        	<li>
        		<span class="color">单价：</span>{{$list->r_price}}
        	</li>
        	<li>
        		<span class="sy"><span class="color">类型</span>：{{$list->r_form}}</span>
        		<span class="sy"><span class="color">面积：</span>{{$list->r_area}}</span>
        	</li>
        	<li>
        		<span class="sy"><span class="color">楼层：</span>18</span>
        		<span class="sy"><span class="color">朝向：</span>西</span>
        	</li>
        	<li>
        		<span class="color">装修：</span>{{$list->r_fixture}}
        	</li>
        	<li>
        		<span class="color">地址：</span>{{$list->r_district}}
        	</li>
        </ul>
        <ul class="detail-agent">
        	<li>
        	  <a class="detail-agent-title">经纪人房评</a>
        	  <div class="detail-commetent">
        	  	欢迎点击我的房源，我在{{url('static_wx/img')}}/地产工作8年以上，对每个小区户型了如指掌，能给您介绍更好房源和性价比更高房源，节省您看房时间，尽快帮您找到温馨的家，谢谢来电话。...
        	  </div>
        	</li>
        	<li>
        	  <a href="" class="detail-agent-title">更多房评<i class="link"></i></a>
        	</li>
        	<li>
        	  <a href="" class="detail-agent-title">位置及周边<i class="link"></i></a>
        	  <div class="detail-commetent">
        	  	<p>地址：北京市海淀区</p>
        	  	<iframe style="width: 100%; height: 160px; border: 0; " src="{{url('map')}}"></iframe>
        	  </div>
        	</li>
        	<li>
        	  <a href="" class="detail-agent-title">看过此房的客户还看过<i class="link"></i></a>
        	  <ul class="see-house">
        	  	<li>
        	  		<a href="">
        	  		  <img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        	  		  <p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		      <p class="house-address"><a href="">世纪中央城-丰和中大道</a></p>
        		      <p class="house-type" style="color: #343434;">3室2厅 105平米 </p>
        		      <p><img src="{{url('static_wx/img')}}/jingpin.png" width="35" height="17"/>
        		      	<!--<img src="{{url('static_wx/img')}}/dujia.png" width="35" height="17"/>-->
        		      	<img src="{{url('static_wx/img')}}/suishi.png" width="55" height="17"/>
        		      <span style="color: #ff5a60; font-size: 12px;">126<span style="font-size: 10px;">万</span></span>
        		      </p>
        	  		</a>
        	  		<div class="salse"></div>
        	  	</li>
        	  	<li>
        	  		<a href="">
        	  		  <img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        	  		  <p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		      <p class="house-address"><a href="">世纪中央城-丰和中大道</a></p>
        		      <p class="house-type" style="color: #343434;">3室2厅 105平米 </p>
        		      <p><img src="{{url('static_wx/img')}}/jingpin.png" width="35" height="17"/>
        		      	<!--<img src="{{url('static_wx/img')}}/dujia.png" width="35" height="17"/>-->
        		      	<img src="{{url('static_wx/img')}}/suishi.png" width="55" height="17"/>
        		      <span style="color: #ff5a60; font-size: 12px;">126<span style="font-size: 10px;">万</span></span>
        		      </p>
        	  		</a>
        	  		<div class="salse"></div>
        	  	</li>
        	  	<li>
        	  		<a href="">
        	  		  <img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        	  		  <p class="house-title">阳光房 大客厅 落地窗  急售</p>
        		      <p class="house-address"><a href="">世纪中央城-丰和中大道</a></p>
        		      <p class="house-type" style="color: #343434;">3室2厅 105平米 </p>
        		      <p><img src="{{url('static_wx/img')}}/jingpin.png" width="35" height="17"/>
        		      	<!--<img src="{{url('static_wx/img')}}/dujia.png" width="35" height="17"/>-->
        		      	<img src="{{url('static_wx/img')}}/suishi.png" width="55" height="17"/>
        		      <span style="color: #ff5a60; font-size: 12px;">126<span style="font-size: 10px;">万</span></span>
        		      </p>
        	  		</a>
        	  		<div class="salse"></div>
        	  	</li>
        	  </ul>
        	</li>
        </ul>
        <div style=" height: 5.5rem; "></div>
        <div class="agent-foot">
        	<img class="agent-photo" src="{{url('static_wx/img')}}/test1.jpg"/>
        	<p class="name">{{$fd_info->r_name}}</p>
        	<p class="tele">{{$fd_info->r_tel}}</p>
        	<div class="shop">
                <a href="tel:{{$fd_info->r_tel}}">
        			<span><img src="{{url('static_wx/img')}}/tele.png" width="18" height="20"/></span>
        			<P>致电</P>
        		</a>
                <a href="sms:{{$fd_info->r_tel}}">
        			<span><img src="{{url('static_wx/img')}}/duanxin.png" width="25" height="20"/></span>
        			<P>短信</P>
        		</a>
        		<a href="">
        			<span><img src="{{url('static_wx/img')}}/shop.png" width="78" height="34"/></span>
        		</a>
        	</div>
        </div>
	</body>




</html>
