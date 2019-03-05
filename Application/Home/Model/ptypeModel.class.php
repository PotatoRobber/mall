<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26 0026
 * Time: 下午 7:41
 */

namespace Home\Model;


use Think\Model;

class ptypeModel extends Model
{
    public function getAll(){
        $tdao=M("ptype");
        $data = $tdao->select();
        return $data;
    }
    public function deltype($typeid){
        $tdao=M("ptype");
        $data=$tdao->where('type_id='.$typeid)->delete();
        return $data;
    }
    public function gettypebytypename($tname){
        $tdao=M("ptype");
        $data = $tdao->where("type_name='"."$tname"."'")->find();
        return $data;
    }
    public function gettypebytypeid($tid){
        $tdao=M("ptype");
        $data = $tdao->where("type_id='"."$tid"."'")->find();
        return $data;
    }
    public  function addnewtype($data){
        $tdao=M("ptype");
        $tdao->data($data)->add();
        //为什么create不行
//        $tdao->create();
//        $tdao->add();


    }
    public function updatetype($data){
        $tdao=M("ptype");
        $result = $tdao->where("type_id=".$data['type_id'])->save($data);
        return $result;
    }
}