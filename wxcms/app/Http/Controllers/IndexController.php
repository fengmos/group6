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
 * 后台控制器
 * @author  chenyang 
 * @return  void
 */
class IndexController extends CommonController
{
    /**
     * 后台首页
     * @return [type] [description]
     */
    public function index()
    {
        return view('Index.index');
    }

    /**
     * 左侧公共导航
     * @return [type] [description]
     */
    public function nav_left()
    {
    	return view('common/nav_left');
    }

    /**
     * 顶部公共导航
     * @return [type] [description]
     */
    public function top()
    {
    	return view('common/top');
    }

}