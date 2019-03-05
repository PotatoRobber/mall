<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/18 0018
 * Time: 下午 2:49
 */

namespace UserInterface\Model;


use Think\Model;

class userinfoModel extends Model
{
    public  function getlogin($user,$psw){
        $udao = M("userinfo");
        $user = $udao->where("user_name='".$user."'and user_pwd='".$psw."'")->find();
        return $user;
    }
    public function gettypebyusername($uname){
        $udao = M("userinfo");
        $data = $udao->where("user_name='"."$uname"."'")->find();
        return $data;
    }

    public function adduser($data){
        $udao = M("userinfo");
        $user = $udao->data($data)->add();
    }
    public function addorder($data){
        $odao = M("orderinfo");
        $user = $odao->data($data)->add();
    }
    public function getuseridbyname($uname){
        $udao = M("userinfo");
        $userid = $udao->where("user_name='"."$uname"."'")->field("user_id")->find();
        return $userid;
    }



}