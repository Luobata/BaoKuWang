<?php

/*
 * Copyright (C) xiuno.com
 */

!defined('FRAMEWORK_PATH') && exit('FRAMEWORK_PATH not defined.');
	include 'C:/Users/yaogou/Documents/SoftWare/wamp/wamp/www/forum/tmp/control_common_control.class.php';

class index_control extends common_control {
	
	function __construct(&$conf) {
		parent::__construct($conf);
		$this->_checked['bbs'] = ' class="checked"';
		$this->_title[] = $this->conf['seo_title'] ? $this->conf['seo_title'] : $this->conf['app_name'];
		$this->_seo_keywords = $this->conf['seo_keywords'];
		$this->_seo_description = $this->conf['seo_description'];
	}
	
	// 给插件预留个位置
	public function on_index() {


		
		$this->on_bbs();
	}
	
	// 首页
	public function on_bbs() {
		$this->_checked['index'] = ' class="checked"';
		

		

		//获取所有版块信息cou 建议修改能生成fid的数组
		$cou= $this->forum->index_fetch();
		//var_dump($cou[0]['fid']);
		//var_dump($cou);
		//$i=1;
		//var_dump($cou["forum-fid-".$i]['threads']);
		//$cou=$cou['forum-fid-1'];
		// for($i=0;$i<count($cou);$i++){
		// 	$array[] = $cou[$i][threads];
		// 	}
		// 	var_dump($array);
		//$blog = $this->forum->read(1);
		//var_dump($blog);
		//更改了pagesize
		//需要封装一个二维数组，包含版块名称，版块总主题数，版块最新消息tid，tid对应的标题和发帖人，版主，版块信息
		//有点问题，应该把$i换成不同的fid数组中的值
		$all=count($cou);
		for($i=1;$i<=$all;$i++){
			if(isset($cou["forum-fid-".$i])){
			$blank[$i]['name']=$cou["forum-fid-".$i]['name'];
			$blank[$i]['threads']=$cou["forum-fid-".$i]['threads'];
			$blank[$i]['lasttid']=$cou["forum-fid-".$i]['lasttid'];
			//获取tid对应的标题和发帖人
			$blank[$i]['modnames']=$cou["forum-fid-".$i]['modnames'];
			$blank[$i]['brief']=$cou["forum-fid-".$i]['brief'];
			$text=$this->thread->read($i,$blank[$i]['lasttid']);			
			$blank[$i]['author']=$text['username'];
			$blank[$i]['subject']=$text['subject'];}
			else{
				$i++;
				$all++;
				break;
			}
			if($blank[$i]['author']==null){
				$blank[$i]['date']=null;
			}else{
				$blank[$i]['date']=date('Y-m-d H:i:s', $text['dateline']);
			}
		}
		//var_dump($blank[1]['lasttid']);
		//var_dump($this->thread->read(1,$blank[1]['lasttid']));
		$aa=$this->thread->index_fetch(array('tid' => array('='=>15)));
		//var_dump($aa);
		


		//var_dump($blank);

		$pagesize = 30;
		$toplist = array(); // only top 3
		$readtids = '';
		$page = misc::page();
		$start = ($page -1 ) * $pagesize;
		$threadlist = $this->thread->get_newlist($start, $pagesize);
		foreach($threadlist as $k=>&$thread) {
			$this->thread->format($thread);
			
			// 去掉没有权限访问的版块数据
			$fid = $thread['fid'];
			
			// 那就多消耗点资源吧，谁让你不听话要设置权限。
			if(!empty($this->conf['forumaccesson'][$fid])) {
				$access = $this->forum_access->read($fid, $this->_user['groupid']); // 框架内部有变量缓存，此处不会重复查表。
				if($access && !$access['allowread']) {
					unset($threadlist[$k]);
					continue;
				}
			}
			
			$readtids .= ','.$thread['tid'];
			if($thread['top'] == 3) {
				unset($threadlist[$k]);
				$toplist[] = $thread;
				continue;
			}
		}
		
		$toplist = $page == 1 ? $this->get_toplist() : array();
		$toplist = array_filter($toplist);
		foreach($toplist as $k=>&$thread) {
			$this->thread->format($thread);
                        $readtids .= ','.$thread['tid'];
                }
                
		$readtids = substr($readtids, 1); 
		$click_server = $this->conf['click_server']."?db=tid&r=$readtids";
		
		$pages = misc::simple_pages('http://localhost/forum/?index-index.htm', count($threadlist), $page, $pagesize);



		// 在线会员
		$ismod = ($this->_user['groupid'] > 0 && $this->_user['groupid'] <= 4);
		$fid = 0;
		$this->view->assign('ismod', $ismod);
		$this->view->assign('fid', $fid);
		$this->view->assign('threadlist', $threadlist);
		$this->view->assign('toplist', $toplist);
		$this->view->assign('click_server', $click_server);
		$this->view->assign('pages', $pages);
		$this->view->assign('blog',$blog);
		$this->view->assign('cou',$cou);
		$this->view->assign('blank',$blank);
		

		
		$this->view->display('index_index.htm');
	}
	
	public function on_test() {
		$this->view->display('test_drag.htm');
	}
	
	private function get_toplist($forum = array()) {
		$fidtids = array();
		// 3 级置顶
		$fidtids = $this->get_fidtids($this->conf['toptids']);
		
		// 1 级置顶
		if($forum) {
			$fidtids += $this->get_fidtids($forum['toptids']);
		}
		
		$toplist = $this->thread->mget($fidtids);
		return $toplist;
	}
	
	private function get_fidtids($s) {
		$fidtids = array();
		if($s) {
			$fidtidlist = explode(' ', trim($s));
			foreach($fidtidlist as $fidtid) {
				if(empty($fidtid)) continue;
				$arr = explode('-', $fidtid);
				list($fid, $tid) = $arr;
				$fidtids["$fid-$tid"] = array($fid, $tid);
			}
		}
		return $fidtids;
	}

}

?>