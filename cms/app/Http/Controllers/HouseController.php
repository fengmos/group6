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
 * 房源控制器
 * @author  chenyang 
 */
class HouseController extends CommonController
{
    /**
     * 展示房源列表
     * @return [type] [description]
     */
    public function house_list()
    {
        $data=DB::table('rent_house')->get();
        //dd($data);die;
        return view('house/house_list',['data'=>$data]);
    }
    /**
     * 房源添加页面
     * @return [type] [description]
     */
    public function house_add()
    {
        return view('house/house_add');
    }
    /*
     * 执行添加房源操作
     */
    public function add_pro(Request $request)
    {
        $data = $request::all();
        //dd($data);

        $file = Request::file('image');    //获取文件名称
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();    //客户端文件名称..
            $tmpName = $file->getFileName();   //缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file->getRealPath();     //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file->getClientOriginalExtension();   //上传文件的后缀.
            $mimeTye = $file->getMimeType();    //也就是该资源的媒体类型
            $newName =  $clientName . "." . $entension;    //定义上传文件的新名称
            $path = $file->move('images', $newName);    //把缓存文件移动到制定文件夹
            $data['r_img']=$path;
            //dd($data);
            $res=DB::table('rent_house')->insert(
                array('r_adress' =>$data['r_adress'],
                    'r_price'=>$data['r_price'],
                    'r_floor'=>$data['r_area'],
                    'r_area'=>$data['r_floor'],
                    'r_type'=>$data['r_type'],
                    'r_fixture'=>$data['r_fixture'],
                    'r_form'=>$data['r_form'],
                    'r_way'=>$data['r_way'],
                    'r_img'=>$data['r_img'],
                ));
            if($res){
                $data=DB::table('rent_house')->get();
                return view('house.house_list',['data'=>$data]);
            }else{
                echo 2;
            }

        }

    }
    /*
    * 删除房屋信息通过ID进行数据操作
    */
    public function house_del(Request $request)
    {
        $id = $_GET['id'];
        //echo $id;die;
        $res = DB::table('rent_house')->where('r_id', '=', $id)->delete();
        if ($res) {
            $data = DB::table('rent_house')->get();
            return view('house/house_list',['data'=>$data]);
        } else {
            echo "失败";
        }
    }
    /*
    * 修改数据
    */
    public function house_update(){
        $id=$_GET['id'];
        $data = DB::table('rent_house')->where('r_id',$id)->first();
        //dd($data);
        return view('house/house_update',['data'=>$data]);

    }
    /*
     * 接受传过来的值进行修改操作
     */
    public function house_updatepro(Request $request){
        $data=$request::all();
        //dd($data);
        $res=DB::table('rent_house')
            ->where('r_id',$data['r_id'] )
            ->update(array('r_adress' => $data['r_adress'],
                    'r_price' => $data['r_price'],
                    'r_area' => $data['r_area'],
                    'r_floor' => $data['r_floor'],
                    'r_type' => $data['r_type'],
                    'r_fixture' => $data['r_fixture'],
                    'r_form' => $data['r_form'],
                    'r_way' => $data['r_way'],
                )
            );
        if($res){
            $data=DB::table('rent_house')->get();
            return view('house/house_list',['data'=>$data]);
        }else{
            echo "no fail";
        }
    }
}