<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>房源发布系统</title>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/add_housing.css')}}">
    <script type="text/javascript" src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
</head>
<body>
<header>
    房源发布系统
</header>

<footer>

            <div class="content">

                <table>
                    <tr>
                        <td align="right">房屋标题:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_title"></td>
                    </tr>

                    <tr>
                        <td align="right">地区:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_district"></td>
                    </tr>

                    <tr>
                        <td align="right"><input type="hidden" value="{{$fd_id}}" id="fd_id">房源地址:</td>
                        <td align="left"><input type="text" name="" class="text" id="r_address"></td>
                    </tr>
                    <tr>
                        <td align="right">房源价格:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_price"></td>
                    </tr>
                    <tr>
                        <td align="right">类型:</td>
                        <td align="left">
                            <input type="text" class="text3" id="r_type">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">租赁方式:</td>
                        <td align="left"><input type="text" class="text3" id="r_way"></td>
                    </tr>

                    <tr>
                        <td align="right">装修:</td>
                        <td align="left" >
                            <select name="" id="r_fixture" class="text4">
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="精装修">精装修</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">面积:</td>
                        <td align="left">
                            <input type="text" class="text3" id="r_area">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">房型:</td>
                        <td align="left">
                            <input type="text" class="text4" id="r_form">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">楼层:</td>
                        <td align="left">
                            <input type="text" class="text4" id="r_floor">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">房源照片:</td>
                        <td align="center">
                            <input type="file" class="text5">

                        </td>
                    </tr>

                    <tr>
                        <td align="center" colspan="2" height="245px">
                            <button class="submit" id="send">发布房源</button>
                            <a href="{{url('fd_personal')}}"><button class="submit">返回</button></a>
                        </td>

                    </tr>

                </table>


            </div>

</footer>
</body>
<script>
    $('#send').click(function(){
        var r_title = $("#r_title").val();  //房屋标题
        var r_district = $("#r_district").val(); //地区
        var fd_id = $("#fd_id").val();  //id
        var r_address = $("#r_address").val();  //地址
        var r_price = $("#r_price").val();  //价格
        var r_type = $("#r_type").val();  //类型
        var r_way = $("#r_way").val();  //租赁方式
        var r_area = $("#r_area").val(); //面积
        var r_form = $("#r_form").val();  //房型
        var r_floor = $("#r_floor").val(); //楼层
        var r_fixture = $("#r_fixture").val(); //是否装修



        alert(r_fixture);

    })


</script>
</html>