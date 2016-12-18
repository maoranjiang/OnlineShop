<?php
/**
 * Created by PhpStorm.
 * User: JMR
 * Date: 2016/11/20
 * Time: 16:30
 */

namespace Home\Controller;
use Think\Controller;

class ProductController extends Controller{
    //show the manage page of products
    public function showProduct(){
        header("Content-Type:text/html; charset=utf-8");
        $goods_db = M('goods');
        $list = $goods_db->where(true)->select();
        $this->assign("list",$list);
        $this->display('product');
    }

    //show the page of product class
    public function showProductClass(){
        header("Content-Type:text/html; charset=utf-8");
        $goods_class_db = M("goods_class");
        //dump($total);
        //die;
        $goods_class_list = $goods_class_db -> where(TRUE)->select();
        //$user_list = $user_db ->select();
        $list = array();
        foreach($goods_class_list as $arr){
            $list[$arr['pid']][]=$arr;
        }
        $this -> assign("list",$list);
        //dump($user_list);
        //die;
        $this->display('productClass');
    }

    public function showProductClassAdd()
    {
        header("Content-Type:text/html; charset=utf-8");
        $db = M("goods_class");
        $list = $db -> where(array("type"=>0))->select();
        $this->assign("list",$list);
        $this->display(productClass_add);
    }

    public function addClass()
    {
        header("Content-Type:text/html; charset=utf-8");
        $db = M("goods_class");
        $data['pid']=(int)$_POST['parentId'];
        $data['class_name']=$_POST['className'];
        if($_POST['parentId']==0)
        $data['type']=0;
        else
            $data['type']=1;
//        dump($data);
//        die;
        $result=$db->add($data);
        if($result)
            $this->redirect(showProduct/product);
    }

    public function deleteClass()
    {
        $class_db = M('goods_class');
        $id = $_GET['class_id'];
//        dump($id);
//        die;
        $condition['goods_class_id']=$id;
        $result=$class_db->where($condition)->delete();
        if($result)
            $this->display("manage_class_result");
    }

    public function showAddProduct()
    {
        header("Content-Type:text/html; charset=utf-8");
        $parentId=M('goods_class');
        $condition['type']=0;
        $parent_list = $parentId->where($condition) ->select();
//        dump($parent_list);
//        die;
        $this->assign("province",$parent_list);
        //$this->assign("cate2",$class_list);
        $this->display(product_add);

    }


    public function addProduct()
    {
        header("Content-Type:text/html; charset=utf-8");
        $goods_db = M('goods');
        $goods_info['goods_name'] = $_POST['goodsName'];
        $goods_info['goods_class_id'] = (int)$_POST['city'];
        $goods_info['goods_image'] = $_POST['photo'];
        $goods_info['goods_unit_price'] = (int)$_POST['productPrice'];
        $goods_info['goods_stock'] = (int)$_POST['stock'];
        $goods_info['goods_intro'] = $_POST['introduction'];
//        dump($goods_info);
//        die;
        $result = $goods_db -> add($goods_info);
        if($result)
            $this->display(manage_result);
    }
}