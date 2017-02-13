<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * 房东管理模块
 * @author   chenyang
 */
class LandlordController extends CommonController
{
    /**
     * 房东列表
     * @return [type] [description]
     */
    public function landlord_show()
    {
        //echo 111;die;
        return view('landlord.landlord_show');
    }

    /**
     * 房东添加
     * @return [type] [description]
     */
    public function landlord_add()
    {
        return view('landlord.landlord_add');
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