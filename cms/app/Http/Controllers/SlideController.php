<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
class SlideController extends CommonController
{
    //跳转到首页黄灯片
    public function slide_show(){
        return view('Slide.slide_show');
    }
    //跳转到添加幻灯片的页面
    public function slide_add(){
        return view('Slide.slide_add');
    }
}