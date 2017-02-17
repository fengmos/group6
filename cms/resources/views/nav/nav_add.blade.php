<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 添加分类 </title>
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
    @include('common/nav_left')</div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>自定义导航栏</h3>
            <script type="text/javascript">
            </script>
            <ul class="tab">
                <li><a href="#nav_add">添加站内导航</a></li>
            </ul>
            <div class="items">
                <div id="nav_add">
                    <form action="classify_ads"  method="post"  onsubmit="return checksubmit()">
                        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
                            <tr>
                                <td width="80" height="35" align="right">导航名称</td>
                                <td>
                                    <input type="text" id="n_name" name="n_name" value="" size="40" class="inpMain" /><span class="nav_names"></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">链接地址</td>
                                <td>
                                    <input type="text" name="n_link" size="20" class="inpMain" />
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">导航照片</td>
                                <td>
                                    <input type="file" name="n_img" size="20" class="inpMain" />
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">是否显示</td>
                                <td><input type="radio" value="1" name="xuan">是
                                    <input type="radio" value="0" name="xuan">否
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">排序</td>
                                <td>
                                    <input type="text" name="n_order" size="5" class="inpMain" /><span class="sorts"></span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="token" value="30fa081a" />
                                    <input name="submit" class="btn" type="submit" value="提交" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!--        <div id="nav_defined">
                            <form action="nav.php?rec=insert" method="post">
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
                                    <tr>
                                        <td width="80" height="35" align="right">导航名称</td>
                                        <td>
                                            <input type="text" name="nav_name" value="" size="40" class="inpMain" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="35" align="right">链接地址</td>
                                        <td>
                                            <input type="text" name="guide" value="" size="80" class="inpMain" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="35" align="right">排序</td>
                                        <td>
                                            <input type="text" name="sort" value="50" size="5" class="inpMain" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="hidden" name="token" value="30fa081a" />
                                            <input type="hidden" name="nav_menu" value="nav,0" />
                                            <input name="submit" class="btn" type="submit" value="提交" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>-->
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>