<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Input;
use Symfony\Component\HttpFoundation\Session\Session;
class GatherController extends CommonController
{
    //采集并入库
    public function gather_ads()
    {
        //表名
        $b_name=Request::input('b_name');
        $host = "127.0.0.1";
        $user = "root";
        $password = "root";
        $dbname = "cms";
        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $dbname);
        $mysql = "set names utf8;";
        mysqli_query($mysqli,$mysql);
        $query=Request::input('querr');
        $res=mysqli_query($mysqli,$query);
        if($res)
        {
          /*  header("content-type:text/html;charset=gb2312");*/
            /* $preg=null;*/
            $url=Request::input('url');
            $ch= curl_init ();
//② 模拟浏览器防止网站做了防采集
//请求url地址
            $params[ CURLOPT_URL ] = $url;
//是否返回响应头信息
            $params[ CURLOPT_HEADER ] =  false;
//是否将结果返回
            $params[ CURLOPT_RETURNTRANSFER ] =  true;
//是否重定向
            $params[ CURLOPT_FOLLOWLOCATION ] =  true;
//伪造浏览器
            $params[ CURLOPT_USERAGENT ] =  'Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 F
irefox/9.0.1';
//③ 开始发送请求，传入curl参数
            curl_setopt_array($ch, $params);
//④ 执行抓取
            $content= curl_exec ($ch);
            $str = mb_convert_encoding($content, "utf-8", "GBK");
            $preg1='#<p>(.*)<strong><span style="font-size: 16px;">(.*)</span></strong><span style="font-size: 16px;">(.*)</span></p>#';
            preg_match_all($preg1,$str,$arr1);
           foreach($arr1[2] as $k=>$v){
            $title=strip_tags($arr1[2][$k]);
               $assess=strip_tags($arr1[3][$k]);
               $res = DB::table($b_name)->insert(['title'=>$title,'assess'=>$assess]);
           }
            if($res)
            {
                echo  "添加成功";
                return redirect('gather_list');
            }else
            {
                echo 0;
            }
        }
        /* $query=("CREATE TABLE IF NOT EXISTS `caiji` (
`id` int(16) NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`assess` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;");*/

        /*     $query=mysql_query("CREATE TABLE IF NOT EXISTS `表名` (
       `id` int(16) NOT NULL auto_increment,
       `name` varchar(255) NOT NULL,
       `remarke` text character set gb2312 NOT NULL,
       PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;");*/
    }
    //跳转到采集展示页面
    public function gather_list(){
        $arr = DB::select('SELECT * FROM caiji');
      /*  $arr=html_entity_decode($ar);*/
        return view('Gather.gather_list',['arr'=>$arr]);
    }
    //跳转到采集页面
    public function gather_add(){
        return view('Gather.gather_add');
    }
    //到采集的详情页面
    public function url1(){
        header("content-type:text/html;charset=gb2312");
        $ur=Request::input('ur');
        $z=date('Y-m-d');
        $file="./jt/$z.html";
        if(file_exists($file))
        {
            echo "静态";
            echo file_get_contents($file);die;
        }
            //开启ob缓存
            ob_start();
            echo $str=file_get_contents($ur);
            $res= fopen ( $file, 'w');
            fwrite ($res,$str);

    }
}