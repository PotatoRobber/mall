<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26 0026
 * Time: 下午 3:55
 */

namespace Home\Controller;

use Home\Model\AdmininfoModel;
use Think\Controller;
use Think\Verify;
header("Content-type: text/html; charset=utf-8");
class LoginController extends Controller
{
    public function showlogin(){
        $this->display();
    }
    public function verify_c(){
        //生成验证码
        $config = array(
            'useNoise'=>false,
            'length'=>4
        );
        $verfiy = new Verify($config);
        $verfiy->entry();
    }
//    public function test(){
//        $code = I('get.code');
//        var_dump($this->check_verfiy($code));
//    }
//    public function check_verfiy($code,$id=''){
//        $verfiy = new Verify();
//        return $verfiy->check($code,$id);
//    }
    public function login(){
        // 检查验证码
        $verify = I('param.verify','');
        if(!check_verify($verify)){
            $this->error("亲，验证码输错了哦！",$this->site_url,9);
        }
        //检查账号密码
        $username = I('post.adminuser');
        $psw=I('post.adminpsw');
        $data=array($username,$psw);
        $adminmodel = new AdmininfoModel();
        $result = $adminmodel->getlogin($username,md5($psw) );
        if($result==null){
            $this->error("账号或者密码错误");
        }else if($result==false){
            $this->error("数据库操作错误");
        }else{
            $_SESSION['userdata']=$data;
            $this->redirect("Index/index");
        }
    }
    public function queryname(){
        $uname=I("get.uname");
        $adminmodel = new AdmininfoModel();
        $adminmodel->queryname($uname);

    }
}