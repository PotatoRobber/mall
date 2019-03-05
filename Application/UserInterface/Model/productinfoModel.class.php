<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/28 0028
 * Time: 下午 7:56
 */

namespace UserInterface\Model;


use Think\Cache\Driver\Memcache;
use Think\Model;

class productinfoModel extends Model
{
    public function getreproduct(){
        $pdao=M("productinfo");
        $where['is_recommend']=1;
        $where['is_show']=1;
        $redata=$pdao->where($where)->order('product_sort')->limit(10)->select();
        return $redata;
    }
    public function getnoreproduct(){
        $pdao=M("productinfo");
        $where['is_recommend']=0;
        $where['is_show']=1;
        $noredata=$pdao->where($where)->order('product_sort')->limit(10)->select();
        return $noredata;
    }
    public function getproductbyid($pid){
        $pdao=M("productinfo");
        $data=$pdao->where('productid='.$pid)->find();
        return $data;
    }
    public function getproductbytypeid($typeid){

        $pdao=M("productinfo");
        $where['type_id']=$typeid;
        $where['is_show']=1;
        $data=$pdao->where($where)->limit(15)->select();
        return $data;
    }
    //模糊查询
    public function getproductbyname($text){
//        精确查询
//        $pdao=M("productinfo");
//        $data=$pdao->where('product_name='."'".$text."'")->find();
//        return $data;

        //tp模糊查询（失败）
//        $pdao=D("productinfo");
//        $where['text'] = array('like','%'.$text.'%');
//        $searchdata = $pdao->where($where)->select();
//        return $searchdata;

        //手写sql查询(失败)
        $pdao=M("productinfo");
        $sql = "SELECT * FROM `tp_productinfo` WHERE `product_name` LIKE '%".$text."%';";
        $data=$pdao->query($sql);
        return $data;
    }
//    public function getproductbyname2($text){
//        $pdao=M("productinfo");
//        $sql = "SELECT * FROM `tp_productinfo` WHERE `product_name`='".$text."';";
//        $data=$pdao->query($sql);
//        return $data;
//    }

        //查询购物车中商品的所有信息
    public function getcardata($car){
        $pdao=M("productinfo");
        $pagedata=array();//存储页面要的数据的数组
        $totalmoney=0;//单独定义个总金额
        for($i=0;$i<count($car);$i++){
            $data=$car[$i];
            if ($data["pid"]){
                $pdata=$pdao->where("productid=".$data['pid'])->find();//查询购物车中每个商品的所有信息，存进pdata数组
                $pdata['number']=$data['number'];//把购买数量也存进pdata数组
                $pdata['xj']=$pdata['number']*$pdata['product_price'];
                $totalmoney=$totalmoney+$pdata['xj'];
                $pagedata[]=$pdata;//一个pdata是购物车中的一个商品的一条信息，把每个商品的信息都存进pagedata二维数组
            }
        }
        $array=array($pagedata,$totalmoney);
        return $array;
    }
    public function updatestock($car){
        $pdao=M("productinfo");
        $a=array();

        for($i=0;$i<count($car);$i++){
        $a['pid']=$car[$i]['pid'];
        $a['number']=$car[$i]['number'];
        $stock=$pdao->where('productid='.$a['pid'])->find();
        $stockdata['product_count']=$stock['product_count']-$a['number'];
          $data=$pdao->where('productid='.$a['pid'])->save($stockdata);
        }
        return $data;
    }
    public function getstockcount($car){
        $pdao=M("productinfo");
        $data=array();
        $a=array();
        $alldata=array();
        for($i=0;$i<count($car);$i++){
            $data[$i]['pid']=$car[$i]['pid'];
            $a=$pdao->where('productid='.$car[$i]['pid'])->field('product_count')->find();
            $data[$i]['product_count']=$a['product_count'];
//            for($j=0;$j<count($car);$j++){
//                $alldata[$j]=$data[$i];
//            }
        }
//        dump($data);
        return $data; //返回商品id和库存的二维数组

    }

}