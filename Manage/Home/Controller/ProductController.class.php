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
        $this->display('product');
    }

    //show the page of product class
    public function showProductClass(){
        header("Content-Type:text/html; charset=utf-8");
        $goods_class_db = M("goods_class");
        $class_father = M("class_father");
        //dump($total);
        //die;
        $goods_class_list = $goods_class_db -> where(TRUE)->select();
        $class_father_list = $class_father -> where(TRUE)->select();
        //$user_list = $user_db ->select();
        $this -> assign("goods_class_list",$goods_class_list);
        $this->assign("class_father_list",$class_father_list);
        //dump($user_list);
        //die;
        $this->display('productClass');
    }

    public function deleteClass()
    {
        $class_db = M('goods_class');
        $id = $_GET['class_id'];
        dump($id);
        die;
        $condition['user_id']=$id;
        $result=$user_db->where($condition)->delete();
        if($result)
            $this->display("manage_result");
    }

    public function showAddProduct()
    {
        $parentId=M('goods_class');
        $condition['type']=0;
        $parent_list = $parentId->where($condition) ->select();
//        dump($parent_list);
//        die;
        $this->assign("cate1",$parent_list);
        //$this->assign("cate2",$class_list);
        $this->display(product_add);

    }
    public function cate()
    {
        header("Content-Type:text/html; charset=utf-8");
        $class=M('goods_class');
        $result = array();
        $cate =$_POST['type'];
//        $test=12;
//        dump($cate);
//        die;
        //$result = $class->where(array('class_father_id'=> $cate))->field('goods_class_id,class_name')->select();
        $result = $class->where(true)->field('goods_class_id,class_name')->select();
        $this->ajaxReturn($result,"JSON");
//        dump($result);
//        die;
        echo json_encode($result);
        //test
    }

    public function addProduct()
    {
        $goods_db = M('goods');
        $goods_info['goods_name'] = $_POST['productName'];
        $goods_info['class_father_id'] = $_POST['parentId'];
        $goods_info['goods_image'] = $_POST['photo'];
        $goods_info['goods_unit_price'] = $_POST['productPrice'];
        $goods_info['goods_stock'] = $_POST['stock'];
        $goods_info['goods_intro'] = $_POST['introduction'];
        $goods_info['goods_name'] = $_POST['productName'];
        $goods_info['goods_name'] = $_POST['productName'];
    }
}