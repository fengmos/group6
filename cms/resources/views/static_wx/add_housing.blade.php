<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>房源发布系统</title>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/add_housing.css')}}">
</head>
<body>
<header>
    房源发布系统
</header>

<footer>

            <div class="content">

                <table>
                    <tr>
                        <td align="right">房源地址:</td>
                        <td align="left"><input type="text" name="" class="text"></td>
                    </tr>
                    <tr>
                        <td align="right">房源价格:</td>
                        <td align="left"><input type="text" name="" class="text3"></td>
                    </tr>
                    <tr>
                        <td align="right">类型:</td>
                        <td align="left">
                            <input type="text" class="text3">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">租赁方式:</td>
                        <td align="left"><input type="text" class="text3"></td>
                    </tr>
                    <tr>
                        <td align="right">地址:</td>
                        <td align="left">
                            <input type="text" class="text" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">装修:</td>
                        <td align="left" >
                            <input type="checkbox" class="text2">是
                            <input type="checkbox" class="text2">否
                            <input type="checkbox" class="text2">精装修
                        </td>
                    </tr>
                    <tr>
                        <td align="right">面积:</td>
                        <td align="left">
                            <input type="text" class="text3">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">房型:</td>
                        <td align="left">
                            <input type="text" class="text4">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">楼层:</td>
                        <td align="left">
                            <input type="text" class="text4">

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
                            <button class="submit">发布房源</button>
                            <a href="{{url('fd_personal')}}"><button class="submit">返回</button></a>
                        </td>

                    </tr>

                </table>


            </div>

</footer>
</body>
</html>