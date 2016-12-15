<?php
/**
 * Created by PhpStorm.
 * User: JMR
 * Date: 2016/11/20
 * Time: 16:29
 */

namespace Home\Controller;
use Think\Controller;

class OrderController extends Controller{
    //show manage page of order
    public function showOrder(){
        $this->display(order);
    }
}
