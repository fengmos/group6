<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\rent_house;
use DB;

class WxController extends Controller
{
    //
    public function index(){

        $like = DB::table('rent_house')->take(3)->get();


        $data['like'] = $like;
    	return view('static_wx/index',$data);
    }

    //房源列表
    public function rentlist(){

        $user = new rent_house();
        $list = $user->sel();

        $data['list'] = $list;
    	return view("static_wx/rentlist",$data);
    }

    //房屋详情
    public function housedetail($id,Request $request){


        $list = DB::table('rent_house')->where('rent_id',"$id")->first();
        $data['list'] = $list;
    	return view('static_wx/housedetail',$data);

    }

    public function map(){

    	return view('static_wx/map');
    }

    //房东个人页面
    public function fd_personal(Request $Request){

        //判断房东是否登录
        $fd_username = $Request->session()->get('fd_username');



        if($fd_username){

            $data['username'] = $fd_username;

            return view('static_wx/fd_personal',$data);
        }else{


            return redirect('fd_login');
        }


    }

    //房东发布房源
    public function add_housing(Request $request){

        $fd_id = $request->session()->get('fd_id');

        $data['fd_id'] = $fd_id;
        return view('static_wx/add_housing',$data);
    }

    //房东房源列表
    public function agent_list(){

        return view('static_wx/agentdetail');
    }

    //租客列表
    public function tenants(){

        return view('static_wx/agent');
    }

    //房东列表
    public function landlord(){

        return view('static_wx/landlord');
    }

    //租户个人中心
    public function zf_personal(Request $Request){


        $username =  $Request->session()->get('username');
        $openid =  $Request->session()->get('openid');


        if(!empty($username)){


//            $qqdata = DB::table('networklogin')->where('openid',$openid)->first();

            $data['userinfo'] = $username;
            $data['touxiang'] = url('static_wx/img/member.png');

            return view('static_wx/zf_personal',$data);

        }else if(!empty($openid)){


            $qqdata = DB::table('networklogin')->where('openid',$openid)->first();

            $data['userinfo'] = $qqdata->nickname;
            $data['touxiang'] = $qqdata->figureurl_qq_2;

            return view('static_wx/zf_personal',$data);
        }else{

            return redirect('zf');
        }


    }

    //房东修改密码
    public function update_pass(){

        return view('static_wx/update_pass');
    }

    //租户修改密码
    public function zf_update_pass(){

        return view('static_wx/zf_update_pass');
    }

    //房东个人信息
    public function personal_info(){

        return view('static_wx/personal_info');
    }


    //租户个人信息
    public function zf_personal_info(){



        return view('static_wx/zf_personal_info');
    }

    //我关注的房东
    public function My_landlord(){


        return view('static_wx/My_landlord');
    }



}
