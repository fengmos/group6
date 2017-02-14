<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
class ClassifyController extends CommonController
{
    //跳转到首页黄灯片
    public function classify_list(){
        return view(' Classify.classify_list');
    }
    //跳转到添加分类的页面
    public function classify_add(){
        return view(' Classify.classify_add');
    }
}