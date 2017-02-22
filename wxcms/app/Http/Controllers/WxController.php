<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\rent_house;
use DB;
use App\History;
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
    public function housedetail($id,Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $result = History::where(array('ip'=>$ip,'rent_id'=>$id))->get()->toArray();
        // dd($result);
        if(is_array($result) && !empty($result))
        {
            //存在数据
            $data['list'] = DB::table('rent_house')->where('rent_id',"$id")->first();
            $data['fdinfo'] = DB::table('renter')->where('r_id',$list->landlord_id)->select('r_tel','r_name')->first();
        }
        else
        {
            //新增历史
            $history = new History;
            $history->ip = $ip;
            $history->rent_id = $id;
            $history->save();
            //调取数据
            $data['list'] = DB::table('rent_house')->where('rent_id',"$id")->first();
            $data['fdinfo'] = DB::table('renter')->where('r_id',$list->landlord_id)->select('r_tel','r_name')->first();
        }
        
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
        if($request->isMethod('post')){

            $data = $request->input();
            unset($data['_token']);
            $data['img_id'] = $request->session()->get('img_id');
            $res = DB::table('rent_house')->insert($data);

            if($res){
                echo "发布成功！";
            }else{
                echo "发布失败！";
            }

        }else{

            //生成图片关联标识
            $imgId = uniqid();
            $request->session()->put('img_id',$imgId);
            return view('static_wx/add_housing',$data);
        }

    }

    //房东房源列表
    public function agent_list(Request $request){

        $fd_id = $request->session()->get('fd_id');  //房东id
        $list = DB::table('rent_house')->where('landlord_id',$fd_id)->get();

        //房东信息
        $fd_info = DB::table('renter')->where('r_id',$fd_id)->first();


        $data['list'] = $list;
        $data['fd_info'] = $fd_info;
        return view('static_wx/agentdetail',$data);
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
    public function personal_info(Request $request){
        $fd_id =  $request->session()->get('fd_id');

        if($request->isMethod('post')){

           $data = $request->input();
            unset($data['_token']);


           $res = DB::table('renter')
                ->where('r_id', $fd_id)
                ->update($data);

            if($res){
                echo "修改成功！";
            }else{
                echo "修改失败!";
            }

        }else{


            $fd_info = DB::table('renter')->where('r_id',$fd_id)->first();

            $data['fd_info'] = $fd_info;
            return view('static_wx/personal_info',$data);
        }

    }


    //租户个人信息
    public function zf_personal_info(){



        return view('static_wx/zf_personal_info');
    }

    //我关注的房东
    public function My_landlord(){


        return view('static_wx/My_landlord');
    }

    //房东图片上传
    public function fileUpload(Request $Request){
        header('Content-type: text/plain; charset=utf-8');

        $userid = $Request->session()->get('fd_id');  //房东id





        $uploadaddress = $_SERVER['DOCUMENT_ROOT'].'/'.'awjw/group6/wxcms/public/uploadfile/upload';

        $files = $_FILES['theFile'];
        $fileName = iconv('utf-8', 'gbk', $_REQUEST['fileName']);
        $totalSize = $_REQUEST['totalSize'];
        $isLastChunk = $_REQUEST['isLastChunk'];
        $isFirstUpload = $_REQUEST['isFirstUpload'];

        if ($_FILES['theFile']['error'] > 0) {
            $status = 500;
        } else {
            // 此处为一般的文件上传操作
            // if (!move_uploaded_file($_FILES['theFile']['tmp_name'], 'upload/'. $_FILES['theFile']['name'])) {
            //     $status = 501;
            // } else {
            //     $status = 200;
            // }

            // 以下部分为文件断点续传操作
            // 如果第一次上传的时候，该文件已经存在，则删除文件重新上传
            if ($isFirstUpload == '1' && file_exists("$uploadaddress/". $fileName) && filesize("$uploadaddress/". $fileName) == $totalSize) {
                unlink("$uploadaddress/". $fileName);
            }

            // 否则继续追加文件数据
            if (!file_put_contents("$uploadaddress/". $fileName, file_get_contents($_FILES['theFile']['tmp_name']), FILE_APPEND)) {
                $status = 501;
            } else {
                // 在上传的最后片段时，检测文件是否完整（大小是否一致）
                if ($isLastChunk === '1') {
                    if (filesize("$uploadaddress/". $fileName) == $totalSize) {

                        $data['imgadd'] = $fileName;
                        $data['fd_id'] = $userid;

                        //房屋图片id
                        $data['fw_id'] = $Request->session()->get('img_id');

                        $res = DB::table('fd_image')->insert($data);

                        $status = 200;
                    } else {
                        $status = 502;
                    }
                } else {
                    $status = 200;
                }
            }
        }

        echo json_encode(array(
            'status' => $status,
            'totalSize' => filesize("$uploadaddress/". $fileName),
            'isLastChunk' => $isLastChunk
        ));



    }





}
