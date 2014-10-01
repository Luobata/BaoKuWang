<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="<?php echo isset($_seo_keywords) ? $_seo_keywords : '';?>" />
	<meta name="description" content="<?php echo isset($_seo_description) ? $_seo_description : '';?> " />
	<meta name="generator" content="Xiuno BBS" />
	<meta name="author" content="Xiuno Team" />
	<meta name="copyright" content="2008-2012 xiuno.com" />
	<meta name="MSSmartTagsPreventParsing" content="True" />
	<meta http-equiv="MSThemeCompatible" content="Yes" />
	<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
	
	<link href="http://localhost/forum/view/common.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="favicon.ico" />
	
	<script type="text/javascript">
	var cookie_pre = '<?php echo isset($conf['cookie_pre']) ? $conf['cookie_pre'] : '';?>';
	var g_uid = <?php echo isset($_user['uid']) ? $_user['uid'] : '';?>;
	</script>
	<title><?php if(!empty($_title)) { foreach($_title as &$title) {?><?php echo isset($title) ? $title : '';?> <?php }} ?></title>
</head>
<body>


<div id="wrapper1">
	
	<div id="wrapper2">
		
		<div id="menu" role="navigation">
			<div class="width">
				<table cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
					<tr>
						<td class="left"></td>
						<td class="logo"><a href="<?php echo isset($conf['logo_url']) ? $conf['logo_url'] : '';?>" title="<?php echo isset($conf['app_name']) ? $conf['app_name'] : '';?>"><span id="logo"></span></a></td>
						<td class="center">
							
							<span class="sep"></span>
							<a href="./" <?php echo isset($_checked['index']) ? $_checked['index'] : '';?>>首页</a>
							
							<?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
							<span class="sep"></span>
							<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>	
							<?php }}?>
							
						</td>
						<td class="center2">
							
							<?php if($conf['search_type']) { ?>
							<form action="http://localhost/forum/?search-index.htm" target="_blank" id="search_form" method="post">
								<div id="search"><input type="text" id="search_keyword" name="keyword" x-webkit-speech lang="zh-CN" /></div>
								
							</form>
							<?php } ?>
							
						</td>
						<td class="right"></td>
					</tr>
				</table>
			</div>
		</div>
							
		
		
		<div id="body" role="main">
		
		



<div class="width">

	
	
	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px;">
		<tr>
			<td class="left"></td>
			<td class="center">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				
				<span>最新帖</span>
				
			</td>
			<td class="center2">
								<span id="user">
					
				<?php if($_user['groupid'] == 0) { ?>
					<a href="http://localhost/forum/?user-login.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-user"></span> 登录</a>
					<a href="http://localhost/forum/?user-create.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-create"></span> 注册</a>
				<?php } else { ?>
					
					<a href="http://localhost/forum/?my-profile.htm" title="<?php echo isset($_user['groupname']) ? $_user['groupname'] : '';?>"><span class="icon icon-user-user"></span> <?php echo isset($_user['username']) ? $_user['username'] : '';?></a>
					
					<?php if($_user['groupid'] == 6) { ?>
					<a href="http://localhost/forum/?user-reactive.htm">邮箱激活</a>
					<?php } ?>
					
					<span id="pm">
						<a href="http://localhost/forum/?my-pm.htm" class="pm"><span class="icon icon-pm"></span> 消息</a><a href="http://localhost/forum/?my-pm.htm" style="display: none;" aria-label="消息" class="newpm"><span class="icon icon-newpm"></span> 消息</a>
					</span>
				
					<?php if($_user['groupid'] > 0 && $_user['groupid'] < 6) { ?>
					<a href="admin/" target="_blank"><span class="icon icon-setting"></span> 管理</a>
					<?php } ?>
				
					<a href="http://localhost/forum/?user-logout.htm" class="ajaxdialog" onclick="return false"><span class="icon icon-user-logout"></span> 退出</a>
				<?php } ?>
					
				</span>
				<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread"  rel="nofollow"><span class="icon icon-post-newthread"></span> 发新帖</a>
			</td>
			<td class="right"></td>
		</tr>
	</table>
	
	
	
	<div class="div">
	<div class="header" style="font-weight: normal;">
		<table width="100%" cellspacing="0" cellpadding="0" style="word-break: break-all" >
			<tr align="left">
				<td valign="middle" class="subject">
				<?php if($fid) { ?>
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>.htm" rel="nofollow" <?php if(!core::gpc('digest')) { ?>class="grey"<?php } ?>>普通主题</a> <span class="grey2">|</span> 
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-digest-1.htm" rel="nofollow" <?php if(core::gpc('digest')) { ?>class="grey"<?php } ?>>精华主题</a>
					
					<?php if(!core::gpc('digest') && !core::gpc('typeid1') && !core::gpc('typeid2') && !core::gpc('typeid3') && !core::gpc('typeid4')) { ?>
					<span id="nav_orderby">
						<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-0  <?php echo isset($_checked['orderby'][0]) ? $_checked['orderby'][0] : '';?>" title="顶帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 8px;"></a><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-1  <?php echo isset($_checked['orderby'][1]) ? $_checked['orderby'][1] : '';?>" title="发帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 4px;"></a>
					</span>
					<?php } ?>
				<?php } else { ?>
					标题
				<?php } ?>
					
				</td>
				
				
				<td width="80" class="username">发帖</td>
				<td width="80" class="lastpost">回帖</td>
				<td width="80" class="views" align="center">回复/查看</td>
				
			</tr>
		</table>
	</div>
	<div class="body threadlist" id="threadlist">
	
		
	
		<?php if(!empty($toplist)) { foreach($toplist as &$thread) {?>
			
<table width="100%" cellspacing="0" cellpadding="2" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
		
			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?></a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow"><?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2"><?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />
		<?php }} ?>
		
		<?php if(!empty($toplist)) { ?>
		<div class="bg2" style="line-height: 12px; height: 12px;">
			<div style="width: 56px; float: left;" class="grey"></div>
		</div>
		<hr />
		<?php } ?>
		
		<?php if(!empty($threadlist)) { foreach($threadlist as &$thread) {?>
			
<table width="100%" cellspacing="0" cellpadding="2" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
		
			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?></a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow"><?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2"><?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />
		<?php }} ?>
		
		

	</div>
	<div class="footer"></div>
</div>
<?php if(!empty($pages)) { ?>
<div class="page" style="margin: auto; margin-top: 8px; text-align: center; clear: both;"><?php echo isset($pages) ? $pages : '';?></div>
<?php } ?>


<?php if($fid && $ismod) { ?>
<div style="text-align: center; margin-top: 8px;">
	<input type="checkbox" name="checkall" id="mod_checkall" /><label for="mod_checkall">全选</label>
	<a type="button" class="button smallblue" id="mod_top" value="置顶" href="javascript:void(0)" role="button"><span>置顶</span></a>
	<?php if(!empty($forum['typecates'])) { ?>
	<a type="button" class="button smallblue" id="mod_type" value="主题分类" href="javascript:void(0)" role="button"><span>主题分类</span></a>
	<?php } ?>
	<a type="button" class="button smallblue" id="mod_digest" value="精华" href="javascript:void(0)" role="button"><span>精华</span></a>
	<a type="button" class="button smallblue" id="mod_move" value="移动" href="javascript:void(0)" role="button"><span>移动</span></a>
	
	<a type="button" class="button smallblue" id="mod_delete" value="删除" href="javascript:void(0)" role="button"><span>删除</span></a>
	
</div>
<?php } ?>



	
	
	
	<div class="div">
		<div class="header"><span class="icon icon-stat"></span> 站点统计</div>
		<div class="body">
			<div style="margin-top: 8px; line-height: 12px; margin-bottom: 4px;">
				
				<span class="grey">帖子：</span><span><?php echo isset($conf['posts']) ? $conf['posts'] : '';?></span> <span class="small grey2">|</span>
				<span class="grey">会员：</span><span><?php echo isset($conf['users']) ? $conf['users'] : '';?></span>
				<?php if($conf['todayposts']) { ?>
				<span class="small grey2">|</span>
				<span class="grey">今日发帖：</span><span class="new bold"><?php echo isset($conf['todayposts']) ? $conf['todayposts'] : '';?></span>
				<?php } ?>
				<?php if($conf['todayusers']) { ?>
				<span class="small grey2">|</span>
				<span class="grey">今日注册：</span><span class="new bold"><?php echo isset($conf['todayusers']) ? $conf['todayusers'] : '';?></span>
				<?php } ?>
				<?php if($conf['newusername']) { ?>
				<span class="small grey2">|</span>
				<span class="grey">新会员:</span> <a href="http://localhost/forum/?you-profile-uid-<?php echo isset($conf['newuid']) ? $conf['newuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" rel="nofollow"><?php echo isset($conf['newusername']) ? $conf['newusername'] : '';?></a>
				<?php } ?>
				<span class="small grey2">|</span>
				<span class="grey">在线：</span><span class="new bold"><a href="http://localhost/forum/?online-list-ajax-1.htm" class="ajaxdialog" onclick="return false;"><?php echo isset($conf['onlines']) ? $conf['onlines'] : '';?></a></span>
				
			</div>
		</div>
		<div class="footer"></div>
	</div>
	
	
	
</div>



		
		</div>
		
	</div>
	
</div>




<div id="footer" role="contentinfo">
	
	<table class="width">
		<tr>
			<td class="left">
				<?php echo isset($conf['app_copyright']) ? $conf['app_copyright'] : '';?><br />
				Powered by  <a href="http://bbs.xiuno.com" target="_blank" class="grey">Xiuno BBS <b><?php echo isset($conf['version']) ? $conf['version'] : '';?></b></a>
				
			</td>
			<td class="right">
				<?php echo isset($conf['china_icp']) ? $conf['china_icp'] : '';?><br />
				<?php echo isset($_SERVER['time_fmt']) ? $_SERVER['time_fmt'] : '';?>, 耗时:<?php echo number_format(microtime(1) - $_SERVER['starttime'], 4);?>s
				
			</td>
		</tr>
	</table>
	
</div>

<?php if(DEBUG == 1 && $_user['groupid'] == 1 || DEBUG == 2) { ?>

<div class="box">
<h3>Debug Information: </h3>
<pre>

<b>Memory</b> = <?php echo memory_get_usage();?>

<b>Processtime</b> = <?php echo number_format(microtime(1) - $_SERVER['starttime'], 4);?>

<b>REQUEST_URI:</b> = <a href="<?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';?>" target="_blank" style="color: #888888"><?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';?></a>

<b>_GET</b> = <?php echo htmlspecialchars(print_r($_GET, 1));?>

<b>_POST</b> = <?php echo htmlspecialchars(print_r($_POST, 1));?>

<b>_COOKIE</b> = <?php echo htmlspecialchars(print_r($_COOKIE, 1));?>

<b>SQL:</b> = <?php isset($_SERVER['sqls']) && print_r($_SERVER['sqls']);?>

<?php if(DEBUG == 2) { ?>
<b>time:</b> = <?php echo isset($_SERVER['time']) ? $_SERVER['time'] : '';?><br />
<b>_user</b> = <?php print_r($_user);?>
<b>conf</b> = <?php unset($conf['db'], $conf['cache']);print_r($conf);?>
<?php } ?>

<b>include:</b> = <?php print_r(get_included_files());?>

</pre>
	
</div>

<?php } ?>

<?php if(DEBUG) { ?>
<script src="http://localhost/forum/view/js/jquery-1.4.full.js" type="text/javascript" ></script>
<?php } else { ?>
<script src="http://localhost/forum/view/js/jquery-1.4.min.js" type="text/javascript" ></script>
<?php } ?>

<script src="http://localhost/forum/view/js/common.js" type="text/javascript"></script>

<script src="http://localhost/forum/view/js/dialog.js" type="text/javascript"></script>

<script type="text/javascript">

$('#search input').focus(function() {$('#search').addClass('hover');});
$('#search input').blur(function() {$('#search').removeClass('hover');});
$('#search input').keyup(function(e) {
	if(e.which == 13 || e.which == 10) {
		var val = encodeURIComponent($(this).val());
		$('#search_form').attr('action', 'http://localhost/forum/?search-index-keyword-'+val+'.htm');
		$('#search_form').submit();
		return false;
	}
});

// 登陆后才能发帖
$('#create_thread').click(function() {
	if(g_uid == 0) {
		ajaxdialog_request('http://localhost/forum/?user-login.htm', function() {
			$('#create_thread').unbind('click');
			ajaxdialog_request($('#create_thread').attr('href'));
			$('#create_thread').click(function() {
				ajaxdialog_request($('#create_thread').attr('href'));
			});
		}, {fullicon: 1});
		return false;
	} else {
		ajaxdialog_request($('#create_thread').attr('href'), null);
		return false;
	}
});

$('a.ajaxdialog, input.ajaxdialog').die('click').live('click', ajaxdialog_click);
$('a.ajaxtoggle').die('click').live('click', ajaxtoggle_event);

//$('div.list .table tr:odd').not('tr.header').addClass('odd');	/* 奇数行的背景色 */
//$('div.list .table tr:last').addClass('last');	/* 奇数行的背景色 */

<?php if($_user['uid']) { ?>
// ------------------------> 短消息 start
	
	function userlist_to_html(userlist) {
		var s = '<div id="pm_userlist">';
		for(k in userlist) {
			var user = userlist[k];
			s += '<a href="http://localhost/forum/?pm-ajaxlist-uid-'+user.uid+'-ajax-1.htm" uid="'+user.uid+'" class="ajaxdialog" ajaxdialog="{position: \'center\', modal: false, cache: false}"><span class="avatar_small" style="'+(user.avatar_small ? 'background-image: url('+user.avatar_small+')' : '')+'"></span> '+user.username+' (<b class="red">'+user.newpms+'</b>)</a>';
		}
		s += '</div>';
		return s;
	}
	
	// 如果有新短消息，除了全局提示以外，再做一个全局标记，实现模拟即时聊天。
	var g_newpm_userlist = null;	// 全局变量
	
	// 心跳频率  根据负载来调整，如果PV <10W: 1秒, <100w 2秒, <600w 3秒, 600w+, 5秒
	var g_newpm_delay = <?php echo isset($pm_delay) ? $pm_delay : '';?>;
	
	function newpm() {
		var _this = this;
		_this.delay = g_newpm_delay;
		_this.t = null;
		_this.stop = function() {
			if(_this.t) clearTimeout(_this.t);
		};
		_this.run = function() {
			_this.stop();
			_this.t = setTimeout(function() {
				//print_r('http://localhost/forum/?pm-new-ajax-1.htm');
				$.get('http://localhost/forum/?pm-new-ajax-1.htm', function(s) {
					var json = json_decode(s);
					if(error = json_error(json)) {return false;}
					// alert(error);
					
					if(json.status == 1) {
						

						
						var userlist = json.message;
						g_newpm_userlist = userlist;
						var s = userlist_to_html(userlist);
						$('#pm a.pm').hide();
						$('#pm a.newpm').show().unbind('mouseover').mouseover(function() {
							$('#pm a.newpm').alert(s, {"width": 150, "pos": 7, "delay": 1000, "alerticon": 0});
						});
						_this.delay = g_newpm_delay;
						_this.run();
					} else if(json.status == 2) {
						g_newpm_userlist = null;
						_this.delay = _this.delay * 2;
						_this.run();
					} else if(json.status == -1) {
						// 退出登录，什么都不做
					} else {
						// 发生错误，不提示，否则太频繁，影响用户体验。可以在后台查看PHP错误日志
						// alert(json.message);
					}
				});
			}, _this.delay);
		};
		return this;
	}
	
	
	var newpm_instance = new newpm(); 
	newpm_instance.run();
	
	<?php if(DEBUG == 2) { ?>
	//newpm_instance.stop();
	<?php } ?>
	// ----------------> 短消息 end
	
	// 鼠标放在上面，显示最后联系的5个人。

<?php } ?>

</script>

<?php echo isset($conf['footer_js']) ? $conf['footer_js'] : '';?>



<?php if($fid && $ismod) { ?>
<script type="text/javascript">

// 二级置顶，三级置顶，检查 fid，如果fid不等于当前fid，则只能选择一篇
$('#mod_checkall').click(function() {
	$('#body input[name="fid_tid[]"]').attr('checked', this.checked);
});

// 置顶 弹出 dialog 设置为置顶
$('#mod_top').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-top-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

// 精华
$('#mod_digest').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-digest-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

// 主题分类 
$('#mod_type').click(function() {
	var other_forum_flag = 0;
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		var currfid = $(this).val().split('_')[0];
		if(currfid != <?php echo isset($fid) ? $fid : '';?>) {
			$(this).attr('checked', '');
			other_forum_flag = 1;
		}
	});
	if(other_forum_flag) {
		alert('批量设置主题分类只能选择当前版块的主题，已经取消了非当前版块的主题（全局置顶主题）');
	}
	
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-type-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

// 删除
$('#mod_delete').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	// 删除 dialog
	var url = url_add_arg('http://localhost/forum/?mod-delete-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

// 移动
$('#mod_move').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-move-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

</script>
<?php } ?>


<script type="text/javascript">

// 鼠标背景变色
$('#threadlist tr').bind('mouseover', function() {$(this).removeClass('bg1').addClass('bg2');});
$('#threadlist tr').bind('mouseout', function() {$(this).removeClass('bg2').addClass('bg1');});

// 最新帖，已读帖，比较最后阅读时间和帖子的最后回复时间
$('#body table.thread').each(function() {
	var tid = intval($(this).attr('tid'));
	var lastpost = intval($(this).attr('lastpost'));
	var k = tid_is_read(tid, lastpost);
	if(tid_is_read(tid, lastpost)) {
		$('.subject_type', this).addClass('read');
		$('a.subject_link', this).addClass('read');
		$('a.thread_icon', this).addClass('xgrey');
	}
});

// 点击服务器，火帖
$.getScript('<?php echo isset($click_server) ? $click_server : '';?>&'+Math.random(), function() {
	if(!xn_json) return;
	var json = xn_json;
	for(tid in json) {
		var viewspan = $('span.views[tid='+tid+']');
		viewspan.html(json[tid]);
		if(json[tid] > <?php echo isset($conf['threadlist_hotviews']) ? $conf['threadlist_hotviews'] : '';?>) {
			viewspan.addClass('red bold');
			//$('table[tid='+tid+'] a.subject_link').after(' <span class="icon icon-post-fire" title="火帖"></span>'); // 根据回复数
			//viewspan.html(viewspan.html() + '<span class="icon icon-post-fire"></span>');
		}
	}
});

// 记录当前页码
<?php if($fid) { ?>
var fid_page = $.parseJSON($.pdata(cookie_pre + 'fid_page'));
if(!fid_page) fid_page = {};
fid_page[''+<?php echo isset($fid) ? $fid : '';?>] = <?php echo isset($page) ? $page : '';?>;
$.pdata(cookie_pre + 'fid_page', $.toJSON(fid_page));

// orderby 切换
$('#nav_orderby a').click(function() {
	// 设置 cookie, 重新刷新页面
	$.cookie('orderby', intval($.cookie('orderby')) == 1 ? 0 : 1);
	window.location.reload();
});
<?php } ?>

$('div.div div.body').find('hr:last').hide();// 隐藏最后一个 hr

// 键盘翻页
bind_document_keyup_page();

</script>



<script type="text/javascript">
$('#friendlink_img img').hover(function() {$(this).removeClass('xgrey')}, function() {$(this).addClass('xgrey')});
$('div.div div.body').find('div.hr:last').hide();// 隐藏最后一个 hr

// 鼠标背景变色
$('table.forum').bind('mouseover', function() {$('td:gt(0)', this).removeClass('bg1').addClass('bg2');});
$('table.forum').bind('mouseout', function() {$('td:gt(0)', this).removeClass('bg2').addClass('bg1');});

</script>



</body>
</html>