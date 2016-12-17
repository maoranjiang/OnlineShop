<?php
class AjaxAction extends Action{
	public function getRegion(){
		$Region=M("region");
		$map['pid']=$_REQUEST["pid"];
		$map['type']=$_REQUEST["type"];
		$list=$Region->where($map)->select();
		echo json_encode($list);
	}
	
}
