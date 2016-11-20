<?php
/**
 * Created by PhpStorm.
 * User: JMR
 * Date: 2016/11/20
 * Time: 16:53
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{

    //show the management page of users
    public function showUser(){
        $this->display('user');
    }


}