<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    //show the index page of the manage application
    public function index(){
        $this->display(index);
   }

}