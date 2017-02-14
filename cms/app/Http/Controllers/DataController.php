<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DataController extends Controller{
    //
    public function index(){
        $host = "127.0.0.1";
        $user = "root";
        $password = "root";
        $dbname = "cms";
        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $dbname);
        $mysql = "set names utf8;";
        mysqli_query($mysqli,$mysql);
        $query="select table_name,table_type,engine,table_rows,TABLE_COLLATION,VERSION,concat(truncate(data_length/1024,2),'字节') as data_size,concat(truncate(index_length/1024,2),'字节') as index_length,data_free FROM information_schema.tables WHERE table_schema = 'cms' ORDER BY table_name DESC";//构建查询
        $res=mysqli_query($mysqli,$query);
        while($result_row=mysqli_fetch_array($res)){
            $arr[]=$result_row;
        }
        return view('data.index',['tables'=>$arr]);
    }
    /**
     * 添加表
     */
    public function adddata(){
        if($arr=Input::get()){
            $host = "127.0.0.1";
            $user = "root";
            $password = "root";
            $dbname = "cms";
            $mysqli = mysqli_connect($host, $user, $password);
            mysqli_select_db($mysqli, $dbname);
            $mysql = "set names utf8;";
            mysqli_query($mysqli,$mysql);
            $tables = mysqli_query($mysqli, "show tables");
            while ($t = mysqli_fetch_array($tables)) {
                $row[] = $t;
            }
            foreach ($row as $kay=>$val){
                if($val['Tables_in_cms']==$arr['table_name']){
                    return  back()->with("msg","已经存在这个表了");
                }
            }
            $table = $arr['table_name'];
            $sql = "create table `$table` (";
            foreach($arr['name'] as $k=>$v){

                $sql.="`".$arr['name'][$k]."`".$arr['table_type'][$k].'('.$arr['length'][$k].')';
                if(isset($arr['null'][$k])){
                    $sql.="  not null";
                }

                if($k==0 && isset($arr['increment'])){
                    $sql.="  AUTO_INCREMENT";
                }
                if(isset($arr['notes'][$k])){
                    $sql.="  COMMENT "."'".$arr['notes'][$k]."'";
                }
                $sql.=',';
            }
            $sql.="PRIMARY KEY (`".$arr['name'][0]."`)";
            $sql = trim($sql,",");
            $sql.=")";
            $sql .=" ENGINE='".$arr['engine']."' DEFAULT CHARSET='".$arr['set']."' ROW_FORMAT=DYNAMIC  ;";
            //print_r($sql);die;
            $res=mysqli_query($mysqli,$sql);
            if($res){
                return $this->redirect('admin/data');
            }else{
                return  back()->with("msg","建表失败");
            }
        }else{
            return view('data.adddata');
        }
    }

    public function list_tables($database){

        $rs = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'cms'");
        $tables = array();
        while ($row = mysqli_fetch_row($rs)) {
            $tables[] = $row[0];
        }
        mysqli_free_result($rs);
        return $tables;
    }
}
