<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\rent_house;

class WxController extends Controller
{
    //
    public function index(){

    	return view('static_wx/index');
    }

    //房源列表
    public function rentlist(){

        $user = new rent_house();
        $list = $user->sel();

        $data['list'] = $list;
    	return view("static_wx/rentlist",$data);
    }

    //房屋详情
    public function housedetail(){

    	return view('static_wx/housedetail');

    }

    public function map(){

    	return view('static_wx/map');
    }

    //房东个人页面
    public function fd_personal(){

        return view('static_wx/fd_personal');
    }

    //房东发布房源
    public function add_housing(){

        return view('static_wx/add_housing');
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
    public function zf_personal(){

        return view('static_wx/zf_personal');
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
