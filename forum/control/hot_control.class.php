<?php

/*
 * hot threads
 */

!defined('FRAMEWORK_PATH') && exit('FRAMEWORK_PATH not defined.');

include BBS_PATH.'control/common_control.class.php';

class hot_control extends common_control{

	function __construct(&$conf) {
		parent::__construct($conf);
		
	}

	public function on_index(){
		
		$hot=$this->thread->index_fetch(array(),array('posts'=>-1),0,5);
		var_dump($hot);
		return null;
	}
	public function on_list(){
		$hot=$this->thread->index_fetch(array(),array('posts'=>-1),0,5);
		//var_dump(array_values($hot));		

		echo  json_encode(array_values($hot));
	}

	public function on_listbyId(){
		//获取uid
		$uid = intval(core::gpc('uid'));
		//var_dump($uid);
		$list=$this->thread->index_fetch(array(('uid')=>array('='=>$uid)),array('dateline'=>-1),0,3);
		echo json_encode(array_values($list));
		//return $list;
	}
	public function on_baike(){
		//获取cname
		$cname= (core::gpc('cname'));
		$cname=urldecode($cname);
		var_dump($cname);
		//从最下面的分级找cname是否存在 默认存在也只能存在一个?
		$list=$this->thread_type->index_fetch(array(('typename')=>array('='=>$cname)));
		if(sizeof($list)!=0){
			$list=array_values($list);
			//var_dump($list);
			//从thread表中获取内容
			$lists=$this->thread->index_fetch(array('fid'=>array('='=>$list[0]['fid']),'typeid2 or typeid1 or typeid3 '=>$list[0]['typeid']),array('dateline'=>-1),0,4);
			//$lists=$this->thread->index_fetch(array('fid'=>array('='=>$list[0]['fid']),'typeid1 or typeid2 or typeid3 or typeid4'=>$list[0]['typeid']),array('dateline'=>-1),0,4);
			echo json_encode(array_values($lists));
		}
		else{
			//二级分类中没有匹配到，从一级分类中匹配 默认存在也只能存在一个？
			$list=$this->forum->index_fetch(array(('name')=>array('='=>$cname)));
			$list=array_values($list);
			//从thread表中获取乃荣
			$lists=$this->thread->index_fetch(array('fid'=>array('='=>$list[0]['fid'])),array('dateline'=>-1),0,4);
			echo json_encode(array_values($lists));
		}

		
	}
}

?>