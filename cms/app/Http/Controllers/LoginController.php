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
 * 登陆控制器
 * @author  chenyang 
 * @return  void
 */
class LoginController extends BaseController
{
    /**
     * 登陆页面展示
     * @return [type] [description]
     */
    public function login(){
        return view('Login.login');
    }
    
    /**
     * 登陆验证方法
     * @return [type] [description]
     */
    public function check_login(){
         $u_name=Request::input('u_name');
         $u_pwd=Request::input('u_pwd');
         $ar = DB::table('admin')->where('username',$u_name)->first();//一维
         if($ar)
         {
             if($ar->admin_pwd==$u_pwd)
             {
                 $session = new Session;
                 $session->set("u_name",$ar->username);
                 $session->set("u_pwd",$ar->admin_pwd);
                 return redirect('index');

             }else
             {
                 return redirect('login');
             }
         }else
         {
            return redirect('login');
        }
    }
}
