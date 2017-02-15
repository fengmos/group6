<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WxLoginController extends Controller
{
   

   public function index(){


   	return view('static_wx/login');
   }

    //注册页面
    public function register(){

        return view('static_wx/register');
    }

    //找回密码
    public function newPassword(){

        return view('static_wx/newPassword');
    }

    //租户登录
    public function zf_login(){

        return view('static_wx/zf_login');
    }


}
