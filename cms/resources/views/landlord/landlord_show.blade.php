
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 首页幻灯广告 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
       {{--顶部公共页面--}}
    @include('common/top')
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft">
       {{--左侧公共页面--}}
    @include('common/nav_left')
</div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>房东管理</strong> </div>   <div class="mainBox imgModule">
            <h3>房东管理</h3>
            <h3><a href="landlord_add" class="actionBtn">房东商户</a></h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th>房东列表</th>
                </tr>
                <tr>

                    <td valign="top">
                        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                            <tr>
                                <td width="100">商户名称</td>
                                <td></td>
                                <td width="50" align="center">排序</td>
                                <td width="80" align="center">操作</td>
                            </tr>
                            <tr>
                                <td><a href="http://www.weiqing.com/data/slide/20130514acunau.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514acunau_thumb.jpg" width="100" /></a></td>
                                <td>广告图片01</td>
                                <td align="center">1</td>
                                <td align="center"><a href="editshow.html?id=1">编辑</a> | <a href="delshow.htmlid=1">删除</a></td>
                            </tr>
                            <tr>
                                <td><a href="http://www.weiqing.com/data/slide/20130514rjzqdt.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514rjzqdt_thumb.jpg" width="100" /></a></td>
                                <td>广告图片02</td>
                                <td align="center">2</td>
                                <td align="center"><a href="editshow.html?id=2">编辑</a> | <a href="delshow.htmlid=2">删除</a></td>
                            </tr>
                            <tr>
                                <td><a href="http://www.weiqing.com/data/slide/20130514xxsctt.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514xxsctt_thumb.jpg" width="100" /></a></td>
                                <td>广告图片03</td>
                                <td align="center">3</td>
                                <td align="center"><a href="editshow.html?id=3">编辑</a> | <a href="delshow.htmlid=3">删除</a></td>
                            </tr>
                            <tr>
                                <td><a href="http://www.weiqing.com/data/slide/20130523hiqafl.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130523hiqafl_thumb.jpg" width="100" /></a></td>
                                <td>广告图片04</td>
                                <td align="center">4</td>
                                <td align="center"><a href="editshow.html?id=4">编辑</a> | <a href="delshow.htmlid=4">删除</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>