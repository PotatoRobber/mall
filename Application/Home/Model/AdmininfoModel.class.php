<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26 0026
 * Time: 下午 4:06
 */
namespace Home\Model;

use Think\Model;

class AdmininfoModel extends Model
{
    public  function getlogin($user,$psw){
        $adao = M("admininfo");
        $admin = $adao->where("admin_name='".$user."'and admin_psw='".$psw."'")->find();
        return $admin;
    }
    public function queryname($uname){
        $adao = M("admininfo");
        $data=$adao->where("admin_name='".$uname."'")->find();


        if(count($data)>0){
            echo 1;
        }else{
            echo 0;
        }
    }
}