<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/28 0028
 * Time: 下午 3:50
 */
namespace UserInterface\Controller;
use UserInterface\Model\ptypeModel;
use UserInterface\Model\productinfoModel;
use UserInterface\Model\userinfoModel;
use Think\Controller;
header("content-type:text/html;charset=utf-8");

class FrontindexController extends Controller
{
    public function index(){
    $reid=I('get.reid');
    $tmodel = new ptypeModel();
    $pmodel = new productinfoModel();
    $typedata = $tmodel->gettypename();
    $redata = $pmodel->getreproduct();
    $noredata = $pmodel->getnoreproduct();

//        dump($typedata);
//        return;

    $this->assign("typedata",$typedata);
    $this->assign("redata",$redata);
    $this->assign("noredata",$noredata);
    //购物车下拉列表
    $car=$_SESSION["car"];
    $user=$_SESSION['userdata'];
    $username=$user[0];
    $cardata=$pmodel->getcardata($car);
    $this->assign("car",$cardata[0]);
    $this->assign("username",$username);
    $this->display("index");
}
    public function preview(){
        $pid=I('get.pid');
//        $array=array($pid);
//        dump($array);
//        return;
        $pmodel = new productinfoModel();
        $iddata=$pmodel->getproductbyid($pid);
        $this->assign("data",$iddata);
//        dump($iddata);
//        return;

//右推荐
        $pmodel = new productinfoModel();
        $redata = $pmodel->getreproduct();


        for ($i=0;$i<count($redata);$i++){
            $oprice=$redata[$i]["product_price"]*1.2;
            $redata[$i]["oprice"]=$oprice;
        }

        $this->assign("redata",$redata);


        //购物车下拉列表
        $car=$_SESSION["car"];
        $cardata=$pmodel->getcardata($car);
        $this->assign("car",$cardata[0]);
        $this->display("preview");
    }




    public function addproduct(){
        $pnumber=I("post.number");//购买数量
        $pid=I("post.productid");//商品编号
        session_start();
        $car=null;
        //先判断会话中的car是否有数据，有就把会话数据装进数组car里。不存在就创建一个空数组car
        if (isset($_SESSION['car'])){
            $car=$_SESSION['car'];
        }else{
            $car=array();//（car是二维数组）
        }
        if (count($car)==0){//购物车是空。直接把接收到的id和number装进数组pdata，然后封装进购物车数组car里
            $pdata=array("pid"=>$pid,"number"=>$pnumber);
            $car[]=$pdata;
        }else{//购物车有商品。要判断当前购物车中是否已经存在当前要买的商品
            $flag=false;
            for ($i=0;$i<count($car);$i++){
                $data= $car[$i];
                if ($data["pid"]==$pid){
                    $car[$i]['number']=$car[$i]['number']+$pnumber;
                    $flag=true;
                    break;
                }
            }
            if ($flag==false){//flag==false代表购物车中没有重复的
                 $pdata=array("pid"=>$pid,"number"=>$pnumber);
                 $car[]=$pdata;
            }
        }
        $_SESSION['car']=$car;
        //car数组中只有编号和购物数量，而需要显示的数据有编号，商品名称，图片，价格，购买数量
        
        $this->showcar();
    }
    public function showcar(){
        $car=$_SESSION["car"];

        $pmodel = new productinfoModel();
        $cardata=$pmodel->getcardata($car);

        $this->assign("car",$cardata[0]);
        $this->assign("totalmoney",$cardata[1]);
        //购物车下拉列表
        $car=$_SESSION["car"];
        $cardata=$pmodel->getcardata($car);
        $this->assign("car",$cardata[0]);
        $this->display("showcar");

    }
    public function delcar(){
        $index=I("get.index")-1;
        $car=$_SESSION["car"];
        array_splice($car,$index,1);
        $_SESSION["car"]=$car;
        $this->showcar();
    }
    public function updatecar(){
        $index= I("post.index")-1;
        $number=I("post.number");
        $car=$_SESSION["car"];
        $car[$index]['number']=$number;
        $_SESSION['car']=$car;
        $this->showcar();
    }
    public function order(){
        $pmodel = new productinfoModel();
        $umodel = new userinfoModel();
        //检查购买数量是否超出库存
        $car=$_SESSION["car"];
        $stockdata = $this->getstock($car);
//        dump($car);
//        return;
        for ($i=0;$i<count($stockdata);$i++){
            if ($car[$i]['number']>$stockdata[$i]['product_count']){
                $errorproductdata = $pmodel-> getproductbyid($stockdata[$i]['pid']);
                $this->error("名称为 ".$errorproductdata['product_name']." 的商品购买数量超出库存");
            }
        }

        $car=$_SESSION["car"];
        $cardata=$pmodel->getcardata($car);

        $this->assign("car",$cardata[0]);
        $this->assign("totalmoney",$cardata[1]);
        //购物车下拉列表
        $car=$_SESSION["car"];
        $cardata=$pmodel->getcardata($car);
        $this->assign("car",$cardata[0]);
        //生成订单编号
        $orderid = (time()*3+5)*2+1;//利用时间戳生成订单号
        array_push($car,$orderid);
//        dump($car);
//        return;
        $cardata=$pmodel->getcardata($car);
//        dump($cardata);
//        return;
        $username =  $_SESSION['username'];
//        $useridarray = $umodel->getuseridbyname($username);
        $userdata=$_SESSION['userdata'];
        $userid = settype($userdata[1], "integer");

        $orderdata=array("order_id"=>$car[count($car)-1],"order_date"=>time(),"order_money"=>$cardata[1],"uesr_id"=>$userid);
        $umodel->addorder($orderdata);
        $this->assign("orderid",$orderid);
        $this->display("order");
    }
    public function pay(){
        $car=$_SESSION["car"];
        $pmodel = new productinfoModel();
        $cardata=$pmodel->getcardata($car);
        $this->assign("totalmoney",$cardata[1]);
        $this->display("pay");

    }
    public function search(){
        $searchtext=I("post.searchtext");
        $searchtext=(string)$searchtext;

        $pmodel = new productinfoModel();
        $data=$pmodel->getproductbyname($searchtext);
        $this->assign("searchdata",$data);

//        $a=array($data);
//        dump($a);
//        return;

        $this->display("showsearch");
    }
    //左侧导航
    public function classifyMenu(){
        $pmodel = new productinfoModel();
        $typeid=I("get.classifyid");
//        echo $typeid;
//        return;
        $data=$pmodel->getproductbytypeid($typeid);
//        $a=array($data);
//        dump($a);
//        return;
        echo json_encode($data);// 将查询到的数据转化为json返回
    }
    public function alreadypaid(){//成交后的操作
        $this->updatestock();
        $_SESSION["car"]="";//清空购物车
    }
    public function updatestock(){//成交后更新库存
        $pid=I("get.productid");//商品编号
        $car=$_SESSION['car'];
//        dump($car);
//        return;
        $pmodel = new productinfoModel();
        $updatedata = $pmodel->updatestock($car);
        $this->index();
    }
    public function getstock(){//获取库存数量
        $car=$_SESSION['car'];
        $pmodel = new productinfoModel();
        $stockdata = $pmodel->getstockcount($car);
        return $stockdata;

    }
    public function testmemcache(){
        $host = '127.0.0.1';
        $port = 11211;
        $mem = new \Memcache();
        $mem->connect($host,$port);
        $mem->set('hello','world2');
        return;
    }
    public function showuserlogin(){
        $this->display();
    }
    public function checklogin(){
        // 检查验证码
        $verify = I('param.verify','');
        if(!check_verify($verify)){
            $this->error("亲，验证码输错了哦！",$this->site_url,9);
        }
        //检查账号密码
        $username = I('post.username');
        $psw=I('post.userpsw');
        $adata=array($username,$psw);
        $data=array('user_name'=>$username,'user_pwd'=>$psw);
        $usermodel = new userinfoModel();
        $result = $usermodel->getlogin($username,md5($psw) );
        if($result==null){
            $this->error("账号或者密码错误");
        }else if($result==false){
            $this->error("数据库操作错误");
        }else{
            $_SESSION['userdata']=$data;
            $_SESSION['username']= $data["user_name"];
            $this->success("登录成功",'index');
        }
    }
    public function showuserregister(){
        $this->display();
    }
    public function userregister(){
        $umodel = new userinfoModel();
        $verify = I('param.verify','');
        if(!check_verify($verify)){
            $this->error("亲，验证码输错了哦！",$this->site_url,9);
        }
        $username = I('post.username');
        $psw = I('post.userpsw');
        $psw = md5($psw);

        $result = $umodel->gettypebyusername($username);

        if($result){
            $this->error("类型名称 $username 已经存在");
        }else{
            $data=array('user_name'=>$username,'user_pwd'=>$psw);
//            $adata=array($username,$psw);
            $userdata = $umodel->adduser($data);
            $_SESSION['username']= $data["user_name"];
            $_SESSION['userdata']= $data;
//            dump($_SESSION['userdata']);
//            return;
            $this->success("添加成功",'index');
        }
    }

}
