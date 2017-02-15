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
 * 房源控制器
 * @author  chenyang 
 */
class HouseController extends CommonController
{
    /**
     * 展示房源列表
     * @return [type] [description]
     */
    public function house_list()
    {
        return view('house/house_list');
    }
    /**
     * 房源添加页面
     * @return [type] [description]
     */
    public function house_add()
    {
        return view('house/house_add');
    }
}