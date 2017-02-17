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
 * 导航控制器
 * @author  liuyanmeng 
 */
class NavController extends CommonController
{
    /**
     * 导航列表页面
     * @return [type] [description]
     */
    public function nav_list(){
        return view('nav.nav_list');
    }

    /**
     * 导航添加页面
     * @return [type] [description]
     */
    public function nav_add(){
        return view('nav.nav_add');
    }
    
}