<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27 0027
 * Time: 下午 4:35
 */

namespace Home\Model;


use Think\Model;
use Think\Model\ViewModel;

class productinfoModel extends Model
{
    public function getAll(){
//        $pdao=M("productinfo");
//          $data = $pdao->select();
        $pdao=D("productandtypeView");
       $data = $pdao->field('product_id','product_name','type_id','product_price','product_img','product_detail','product_count','is_show','product_sort','is_recommend','ptype_id')->select();

       return $data;
    }
    public function gettypename(){
        $pdao=D("productandtypeView");
        $data = $pdao->select();
        return $data;
    }

    public function delproduct($pid){
        $pdao=M("productinfo");
        $data=$pdao->where('productid='.$pid)->delete();
        return $data;
    }
    public function gettypebyproductname($pname){
        $pdao=M("productinfo");
        $data=$pdao->where("product_name='"."$pname"."'")->find();
        return $data;
    }
    public function addproduct($data){
        $pdao=M("productinfo");
        $pdao->data($data)->add();

    }
    public function getproductbytypeid($pid){
        $pdao=M("productinfo");
        $data = $pdao->where("productid='"."$pid"."'")->find();
        return $data;
    }
    public function updateproduct($data){
        $pdao=M("productinfo");
        $result = $pdao->where("productid=".$data['productid'])->save($data);
        return $result;
    }
}

class productandtypeViewModel extends ViewModel {
    public $viewFields = array(
        'productinfo'=>array('productid','product_name','type_id','product_price','product_img','product_detail','product_count','is_show','product_sort','is_recommend'),
        'ptype'=>array('type_id'=>'ptype_id', '_on'=>'productinfo.type_id=ptype.type_id'),
    );
}