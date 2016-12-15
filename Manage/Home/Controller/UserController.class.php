<?php
/**
 * Created by PhpStorm.
 * User: JMR
 * Date: 2016/11/20
 * Time: 16:53
 */
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class UserController extends Controller{

    //show the management page of users
    public function showUser(){
        header("Content-Type:text/html; charset=utf-8");
        import("ORG.Util.Page");
        $user_db = M("user");
        $total = $user_db -> count();//查询满足要求的总记录数
        //dump($total);
        //die;
        $num_per_page = 10;
        $page = new Page($total, $num_per_page);
        $page -> setConfig("header", "个会员");
        $show = $page -> show();
        $user_list = $user_db -> where(TRUE)->limit($page -> firstRow, $page ->listRows)->select();
        //$user_list = $user_db ->select();
        $this -> assign("users",$user_list);
        //dump($user_list);
        //die;
        $this->assign("show",$show);
        $this->display('user');
    }

    //show the page of user_add
    public function showAdd(){
        //$li_class="current";
        //$this->assign("class",$li_class);
        $this->display("user_add");
    }

    //operation of adding user
    public function addUser(){
        header("Content-Type:text/html; charset=utf-8");
        $user_db = M("user");
        $userinfo['user_id']=$_POST['user_id'];
        $userinfo['user_realname']=$_POST['user_realname'];
        $userinfo['user_password']=md5($_POST['user_password']);
        $userinfo['user_sex']=$_POST['user_sex'];
        $birth_year=$_POST['birthyear'];
        $birth_month=$_POST['birthmonth'];
        $birth_day=$_POST['birthday'];
        $userinfo['user_birth']=$birth_year.'-'.$birth_month.'-'.$birth_day;
        $userinfo['user_tel']=$_POST['user_tel'];
        $userinfo['user_address']=$_POST['user_address'];
        //dump($userinfo);
        //die;
        $condition['user_id']=$userinfo['user_id'];
        $find = $user_db->where($condition)->find();
        //dump($find);
        //die;
        if($find)
        {
            echo"<script>alert('user ID already existed!')</script>";
            $this->display("user_add");
        }
        else{
            if($userinfo['user_id'] !=NULL) {
                $user_db->add($userinfo);
                //echo "<script>alert('Add Successfully!')</script>";
                $this->display("manage_result");
            }
            else{
                echo "<script>alert('User ID cannot be null!')</script>";
                $this->display("user_add");
            }
        }
    }

    //show the user_modify page
    public function showModify(){
        header("Content-Type:text/html; charset=utf-8");
        $user_db = M('user');
        $id = $_GET['user_id'];
        $condition['user_id'] = $id;
        $userinfo = $user_db ->where($condition)->find();

        $this->assign("user_info",$userinfo);
        $this->display("user_modify");
    }

    //operation of modifying user
    public function modifyUser(){
        header("Content-Type:text/html; charset=utf-8");
        $user_db = M('user');
        $userinfo['user_id']=$_POST['user_id'];
        $userinfo['user_realname']=$_POST['user_realname'];
        $userinfo['user_password']=md5($_POST['user_password']);
        $userinfo['user_sex']=$_POST['user_sex'];
        $birth_year=$_POST['birthyear'];
        $birth_month=$_POST['birthmonth'];
        $birth_day=$_POST['birthday'];
        $userinfo['user_birth']=$birth_year.'-'.$birth_month.'-'.$birth_day;
        $userinfo['user_tel']=$_POST['user_tel'];
        $userinfo['user_address']=$_POST['user_address'];
        //dump($userinfo);
        //die;
        $condition['user_id']=$userinfo['user_id'];
        $result=$user_db->where($condition)->save($userinfo);
        //dump($result);
        //die;
        if($result!=false)
        $this->display("manage_result");
        else{
            echo 'Modify failed!';
            $this->redirect("user_modify");
        }
    }

    //operation of deleting user
    public function deleteUser(){
        header("Content-Type:text/html; charset=utf-8");
        $user_db = M('user');
        $id = $_GET['user_id'];
        $confirm=$_GET['confirm'];
        dump($confirm);
        die;
        $condition['user_id']=$id;
        $result=$user_db->where($condition)->delete();
        if($result)
            $this->display("manage_result");
    }
}