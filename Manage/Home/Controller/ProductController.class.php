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

    public function addProduct()
    {
        $goods_db = M('goods');


    }
}