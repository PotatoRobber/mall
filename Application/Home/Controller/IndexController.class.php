<?php
namespace Home\Controller;
use Home\Model\productinfoModel;
use Home\Model\ptypeModel;//这里要注意！要写到model的下一级
use Think\Controller;
use Think\Page;



class IndexController extends Controller {
    public function islogin(){
        if(!isset($_SESSION['userdata'])){
            $this->redirect("Login/showlogin");
        }
    }
    public function index(){
        $this->islogin();
        $this->display();
    }
    public function typemsg(){
        $this->islogin();
        $tmodel = new ptypeModel();
        $data=$tmodel->getAll();
        $this->assign("typedata",$data);
        $this->display();
    }
    public function deltype(){
        $this->islogin();
        $tid=I('get.tid');
        $tmodel = new ptypeModel();
        $result=$tmodel->deltype($tid);
        if($result>0){
            $this->success("删除成功",'typemsg');
        }
    }
    public function addnewtype(){
        $this->islogin();
        $typename=I("post.typename");
        $typenote=I("post.typenote");
        $tmodel=new ptypeModel();
        $result = $tmodel->gettypebytypename($typename);

        if($result){
            $this->error("类型名称 $typename 已经存在");
        }else{
            $data=array('type_name'=>$typename,'type_note'=>$typenote);

            $tmodel->addnewtype($data);
            $this->success("添加成功",'typemsg');
        }
    }
    public function updatetype(){
        $this->islogin();
        $tid=I('get.tid');
        $tmodel = new ptypeModel();
        $data = $tmodel->gettypebytypeid($tid);
//        $_SESSION['updatedata']=$data;

        $this->assign("typedata",$data);
        $this->display();

    }
    public function updatetype2(){
        $this->islogin();
        $tid=I('post.typeid');
        $tname=I('post.typename');
        $tnote=I('post.typenote');
        $data=array('type_id'=>$tid,'type_name'=>$tname,'type_note'=>$tnote);
        $tmodel = new ptypeModel();
        $tmodel->updatetype($data);
        $this->success("修改成功",'typemsg');

    }

    //商品管理
    public function productmsg(){
        $this->islogin();
        $pmodel = new productinfoModel();
        $data=$pmodel->getAll();
        $this->assign("productdata",$data);

        $pdao=D('productinfo');//实例化模型
        $count=$pdao->count();//得到总条数
        $page=new Page($count,5);//创建page对象，参数是总共的条数，和每页显示的条数
        //设置分页样式
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('theme','共%TOTAL_ROW%条数据%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $show =$page->show();//是显示分页的html，拥有完整的html标签
 //       $list = $pdao->limit($page->firstRow,$page->listRows)->select();//firstRow为当前页开始的位置

 //多表查询
        $list = M('productinfo')
            ->table('tp_productinfo as a')
            ->join('tp_ptype as b')
            ->where('a.type_id = b.type_id')
            ->limit($page->firstRow,$page->listRows)
            ->select();

        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function delproduct(){
        $this->islogin();
        $pid=I('get.pid');
        $pmodel = new productinfoModel();
        $result=$pmodel->delproduct($pid);
        if($result>0){
            $this->success("删除成功",'productmsg');
        }
    }
    public function addproduct(){
        $this->islogin();
        $tmodel = new ptypeModel();
        $data=$tmodel->getAll();

        $this->assign("typedata",$data);
        $this->display();
    }
    public function addnewproduct(){
        $this->islogin();
        $product_name=I("post.product_name");
        $type_id=I("post.type_id");
        $product_price=I("post.product_price");
//        $product_img=I("post.product_img");
        $product_detail=I("post.product_detail");
        $product_count=I("post.product_count");
        $is_show=I("post.is_show");
        $product_sort=I("post.product_sort");
        $is_recommend=I("post.is_recommend");

//        $data=array('productid'=>$productid,'product_name'=>$product_name,'type_id'=>$type_id,'product_price'=>$product_price,'product_img'=>$product_img,'product_detail'=>$product_detail,'product_count'=>$product_count,'is_show'=>$is_show,'product_sort'=>$product_sort,'is_recommend'=>$is_recommend);
//        dump($data);
//        return;


        $filename = $_FILES['product_img']['name'];//获取到上传的文件的名称
        $filetype = $_FILES['product_img']['type'];
        $filesize = $_FILES['product_img']['size'];
        $fileTmp = $_FILES['product_img']['tmp_name']; //文件临时存放的名字
        $newfilename =(time()*3+35);
        $filearray = (explode(".",$filename));
        $filepath="public/UserInterface/uploadfiles/".$newfilename.'.'.$filearray[count($filearray)-1];
        move_uploaded_file($fileTmp,$filepath);


        $pmodel = new productinfoModel();
        $result = $pmodel->gettypebyproductname($product_name);
        if($result){
            $this->error("商品名称 $product_name 已经存在");
        }else{
            $data=array('product_name'=>$product_name,'type_id'=>$type_id,'product_price'=>$product_price,'product_img'=>$filepath,'product_detail'=>$product_detail,'product_count'=>$product_count,'is_show'=>$is_show,'product_sort'=>$product_sort,'is_recommend'=>$is_recommend);
            $pmodel->addproduct($data);
            $this->success("添加成功",'productmsg');
        }
    }
    public function updateproduct(){
        $this->islogin();
        $tmodel = new ptypeModel();
        $tdata=$tmodel->getAll();
        $this->assign("typedata",$tdata);

        $pid=I('get.pid');
        $pmodel = new productinfoModel();
        $data = $pmodel->getproductbytypeid($pid);
//        $_SESSION['updatedata']=$data;

        $this->assign("productdata",$data);
        $this->display();

    }
    public function updateproduct2(){
        $this->islogin();
        $productid=I('post.productid');
        $product_name=I('post.product_name');

          $type_id=I('post.type_id');
//        $type_id=$_POST['typeid'];

        $product_price=I('post.product_price');
        $product_img=I('post.product_img');
        $product_detail=I('post.product_detail');
        $product_count=I('post.product_count');
        $is_show=I('post.is_show');
        $product_sort=I('post.product_sort');
        $is_recommend=I('post.is_recommend');
        $data=array('productid'=>$productid,'product_name'=>$product_name,'type_id'=>$type_id,'product_price'=>$product_price,'product_img'=>$product_img,'product_detail'=>$product_detail,'product_count'=>$product_count,'is_show'=>$is_show,'product_sort'=>$product_sort,'is_recommend'=>$is_recommend);

//        dump($data);
//        return;

        $pmodel = new productinfoModel();
        $pmodel->updateproduct($data);
        $this->success("修改成功",'productmsg');

    }

}