<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class AjaxController extends Controller{
	public function getRegion(){
		$Region=M("goods_class");
		$map['pid']=$_REQUEST["pid"];
		$map['type']=$_REQUEST["type"];
//		$map['pid']=1;
//		$map['type']=1;
		$list=$Region->where($map)->select();
		echo json_encode($list);
	}
	
}
