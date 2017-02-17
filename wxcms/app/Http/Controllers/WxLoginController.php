<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use Mail;
class WxLoginController extends Controller
{
   
    public $email;
   public function index(){


   	return view('static_wx/login');
   }

    //注册页面
    public function register(){

        return view('static_wx/register');
    }

    //找回密码
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
        
    }

    //租户登录
    public function zf_login(){

        return view('static_wx/zf_login');
    }

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
    }





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
}
