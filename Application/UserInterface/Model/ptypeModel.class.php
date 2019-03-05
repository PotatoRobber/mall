<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/28 0028
 * Time: 下午 4:43
 */
namespace UserInterface\Model;
use Think\Model;

class ptypeModel extends Model
{
    public function gettypename(){
        $tdao=M("ptype");
        $typedata=$tdao->select();
        return $typedata;
//        $pdao=M("productinfo");
//        $redata=$pdao->where("is_recommend=1")->select();
//
    }
}