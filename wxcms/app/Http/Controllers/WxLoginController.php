<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class WxLoginController extends Controller
{
   

   public function index(Request $Request){

       //判断是否登录
       if($Request->session()->get('fd_username')){

           return redirect('fd_personal');
           die;

       };


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
    public function zf_login(Request $Request){

        $fd_username = $Request->session()->get('fd_username');  //房东session
        $username = $Request->session()->get('username');  //租户session
        $openid =  $Request->session()->get('openid');



        if(!empty($fd_username)){

            $Request->session()->forget('username');  //删除租户session
            return redirect('fd_personal');
        }else if(!empty($username) || !empty( $openid)){

            $Request->session()->forget('fd_username');  //删除房东session
            return redirect('zf_personal');
        }else{}


            return view('static_wx/zf_login');

    }

    //第三方登录

    public function qqlogin(Request $Request){

        $openid = $Request->input('openid');
        $access_token = $Request->input('access_token');


        $user = DB::select("select openid from networklogin where openid = '$openid'");

        if(!$user){



            $userinfo = file_get_contents('https://graph.qq.com/user/get_user_info?access_token='.$access_token.'&oauth_consumer_key=101369412&openid='.$openid.'');


            //插入随机生成到用户表
            $userData['username'] = 'Awjw'.uniqid();
            //系统生成的密码
            $systempwd = $userData['username'].'1234556';
            $userData['password'] = MD5("$systempwd");  //最终密码

            $userData['mobile_phone'] = '11111111111';
            $userData['add_time'] = time();
            $userData['email'] = '11@qq.com';


            //返回自增id
            $id = DB::table('user')->insertGetId($userData);

            if($id){
                $NewUserInfo = json_decode($userinfo,true);
                $NewUserInfo['openid'] = $openid;
                $NewUserInfo['user_id'] = $id;


                $res = DB::table('networklogin')->insert($NewUserInfo);

                if($res){

                    //如果是第三方登录则删除普通用户信息
                    $Request->session()->put('openid',"$openid");
                    $Request->session()->forget('username');

                    return redirect('zf_personal');
                }else{
                    
                    return redirect('zf');
                }
            }else{

                echo "操作失败";
            }




        }else{

            $Request->session()->put('openid',"$openid");
            //如果是第三方登录则删除普通用户信息
            $Request->session()->forget('username');
            return redirect('zf_personal');

        }

    }

    //普通用户登录
    public function ordinaryUser(Request $Request){

        $data = $Request->input();

        $res = DB::table('user')->where('username',$data['name'])
                                ->where('password',MD5($data['password']))
                                ->first();




        if($res){

            $username = $res->username;

            $Request->session()->put('username',$username);

            return redirect('zf_personal');

        }else{

            $url = url('zf');

            echo "<script>alert('用户名或密码错误');</script>";
            echo "<script>window.location.href='".$url."';</script>";
        }


    }



    //房东登录页面
    public function fd_login(Request $Request){



        $data = $Request->input();

        $username = $data['name'];
        $password = MD5($data['password']);

        $usernamepreg = '/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/';
        if(preg_match($usernamepreg,$username)){



            $res = DB::table('renter')->where('r_email',"$username")
                                      ->where('r_pwd',"$password")
                                      ->first();
            if($res){

                $Request->session()->put('fd_username',$res->r_name);
                $Request->session()->put('fd_id',$res->r_id);

                return redirect('fd_personal');
                die;

            }else{

                $url = url('fd_login');
                echo "<script>alert('用户名或密码错误')</script>";
                echo "<script>window.location.href='".$url."';</script>";
            }


        }

        $mobile = '/^1[34578]{1}\d{9}$/';
        if(preg_match($mobile,$username)){

            $res = DB::table('renter')->where('r_tel',"$username")
                ->where('r_pwd',"$password")
                ->first();
            if($res){


                $Request->session()->put('fd_username',$res->r_name);
                $Request->session()->put('fd_id',$res->r_id);
                return redirect('fd_personal');
                die;

            }else{

                $url = url('fd_login');
                echo "<script>alert('用户名或密码错误')</script>";
                echo "<script>window.location.href='".$url."';</script>";
            }

        }

        $url = url('fd_login');

        echo "<script>alert('请输入手机或邮箱')</script>";
        echo "<script>window.location.href='".$url."';</script>";

    }

    //退出登录
    public function outlogin(Request $request){

        $request->session()->forget('fd_username');
        $request->session()->forget('username');
        $request->session()->forget('openid');
        return redirect('wx');

    }


}
