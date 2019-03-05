<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12 0012
 * Time: 下午 3:47
 */

namespace UserInterface\Controller;


use Think\Controller;

class MymemController extends Controller
{
    public function index(){
        $mem=new \Memcache();
        $mem->connect('127.0.0.1',11211);
        $mem->set('hello','world2');
        echo $mem->get('hello');
//        echo 'd';
        return;
    }
}