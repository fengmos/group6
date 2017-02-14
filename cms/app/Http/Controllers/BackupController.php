<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
class BackupController extends CommonController
{
    //所有表展示
    public function backup_list(){
         /*  $rs = mysql_query("SHOW TABLES FROM cms");*/
        $rs = DB::select('SHOW TABLES FROM cms');
      /*  $tables = array();
        while ($row = mysql_fetch_row($rs)) {
            $tables[] = $row[0];
        }
        $ar=mysql_free_result($rs);
        var_dump($ar);exit;*/
        return view('Backup.backup_list',['rs'=>$rs]);
    }
  /*  function list_tables($database)
    {
        $rs = mysql_query("SHOW TABLES FROM $database");
        $tables = array();
        while ($row = mysql_fetch_row($rs)) {
            $tables[] = $row[0];
        }
        mysql_free_result($rs);
        return $tables;
    }*/
    //增加新的表
    /*public function backup_add(){

        return view('Backup.backup_add');
    }*/
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
                return redirect('backup_list');
            }else{
                return  back()->with("msg","建表失败");
            }
        }else{
           /* return view('data.adddata');*/
            return view('Backup.backup_add');
        }
    }
}