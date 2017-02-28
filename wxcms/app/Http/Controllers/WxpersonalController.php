<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class WxpersonalController extends Controller
{
    //租户个人信息修改
    public function personalupd(Request $Request){
    	$userid = $Request->session()->get('userid');

<<<<<<< HEAD
=======
    	

>>>>>>> f5f5bdaa9672a93165592998e6dc949d2eb8f836
    	$data = $Request->input();

    	unset($data['_token']);

    	$res = DB::table('user')->where('user_id',$userid)->update($data);


    	if($res){
    		echo "修改成功!";
    	}else{
    		echo "修改失败！";
    	}

    }


}
