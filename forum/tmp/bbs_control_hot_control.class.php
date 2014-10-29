<?php

/*
 * hot threads
 */

!defined('FRAMEWORK_PATH') && exit('FRAMEWORK_PATH not defined.');
	include 'D:/WampServer/www/forum/tmp/control_common_control.class.php';

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
}

?>