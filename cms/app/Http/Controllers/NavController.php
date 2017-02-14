<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
class NavController extends CommonController
{
    //跳转到商户列表页面
    public function nav_show(){
        //echo 111;die;
        return view('Nav.nav_show');

    }
    //跳转到添加页面
    public function nav_add(){
        return view('Nav.nav_add');
    }
    //添加入库
    public function nav_shows(){
        $nav_name=Request::input('nav_name');
        $xuan=Request::input('xuan');
        $sort=Request::input('sort');
        $links_ad=Request::input('links_ad');
        $user=array('nav_name'=>$nav_name,'xuan'=>$xuan,'sort'=>$sort,'links_ad'=>$links_ad);
        $res = DB::table('nav')->insert($user);
        if($res)
        {
            return redirect("nav_show");
        }else
        {
            echo "添加失败";
        }

    }
}