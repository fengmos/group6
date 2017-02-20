<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use DB;


class WxLoginController extends Controller
{
   

=======
use App\Users;
use Mail;
class WxLoginController extends Controller
{
   
    public $email;
>>>>>>> bfb4de551a071aff0f093259ab1e70a24f70d5b0
   public function index(){


   	return view('static_wx/login');
   }

    //注册页面
    public function register(){

        return view('static_wx/register');
    }

    //找回密码
<<<<<<< HEAD
    public function newPassword(){

        return view('static_wx/newPassword');
=======
    public function newPassword()
    {
        if(\Request::isMethod('post'))
        {
            $email = \Request::all()['email'];
            $user_info = Users::where('email',$email)->first()->toArray();
            $return = array('status'=>'','msg'=>'','url'=>'');
            if(!empty($user_info) && is_array($user_info))
            {
                //存在数据
                //发送邮件
                $this->email = $user_info['email'];
                $this->send();
                $return['status'] = 1;
                $return['msg'] = "邮件已发送到您的绑定邮箱，请注意查收";
                return json_encode($return);
            }
            else
            {
                //不存在
                $return['status'] = 2;
                $return['msg'] = "邮件已发送到您的绑定邮箱，请注意查收";
                return json_encode($return);
            }

        }
        else
        {
            return view('static_wx/newPassword');
        }
        
>>>>>>> bfb4de551a071aff0f093259ab1e70a24f70d5b0
    }

    //租户登录
    public function zf_login(){

        return view('static_wx/zf_login');
    }

<<<<<<< HEAD
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


=======
    public function send()
    {
        $num = Mail::raw('您现在正在使用爱乌及屋验证码，验证码为:'.$this->get_code(), function($message) {

        $message->from('864912185@qq.com', 'NIan');
        $message->subject('邮件主题');
        $message->to($this->email);
        });     
    }

    public function get_code()
    {
        $code = rand(1000,9999);
        $user = Users::where('email',$this->email)->first();
        $user->code = $code;
        $user->save();
        return $code;
>>>>>>> bfb4de551a071aff0f093259ab1e70a24f70d5b0
    }



<<<<<<< HEAD
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


=======


    public function check_password()
    {
        $data = \Request::all();
        $user_info = Users::where('email',$data['email'])->first();
        if($data['code'] == $user_info['code'] && !empty($user_info['code']))
        {
            if($data['password'] == $data['password1'])
            {
                //修改密码
                $user_info->password = md5($data['password']);
                $user_info->save();
                if($user_info->save())
                {
                    echo "<script>alert('恭喜您密码修改成功')</script>";
                }
            }
            else
            {
                echo "<script>alert('前后密码不一致')</script>";
            }
        }
        else
        {
            echo "<script>alert('验证码错误，请重新验证')</script>";
        }
    }
>>>>>>> bfb4de551a071aff0f093259ab1e70a24f70d5b0
}
