<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>



<div class="width">

	
	
	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px;">
		<tr>
			<td class="left"></td>
			<td class="center">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				
				<span>我要交流</span>
				
			</td>
			<td class="center2">
				<!-- <form action="http://localhost/forum/?search-index.htm" target="_blank" id="search_form" method="post">
								<div id="search"><input type="text" id="search_keyword" name="keyword" x-webkit-speech lang="zh-CN" /></div>
								
							</form> -->
				<?php include $this->gettpl('header_user.inc.htm');?>
				<!-- <a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread"  rel="nofollow"><span class="icon icon-post-newthread"></span> 发新帖</a> -->
			</td>
			<td class="right"></td>
		</tr>
	</table>

        
<!-- 	<span class="sep"></span>
	<a href="./" <?php echo isset($_checked['index']) ? $_checked['index'] : '';?>>首页</a> -->
        
        <!--  <?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
        Test
	<span class="sep"></span>
	<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>	
          <?php }}?> -->
	
	
	
	<?php include $this->gettpl('thread_list.inc.htm');?>
<div class="bankuai">
    
</div>
	
	
	<!-- <div class="div">
		<div class="header"><span class="icon icon-stat"></span> a站点统计</div>
		<div class="body">
			<div style="margin-top: 8px; line-height: 12px; margin-bottom: 4px;">
				
				<span class="grey">帖子：</span><span><?php echo isset($conf['posts']) ? $conf['posts'] : '';?></span> <span class="small grey2">|</span>
				<span class="grey">会员：</span><span><?php echo isset($conf['users']) ? $conf['users'] : '';?></span>
				<?php if($conf['todayposts']) { ?>
				<span class="small grey2">|</span>
				<span class="grey">今日发帖：</span><span class="new bold"><?php echo isset($conf['todayposts']) ? $conf['todayposts'] : '';?></span>
	                                                                       <span class="small grey2">|</span>
				<span class="grey">总主题数：</span><span class="new bold"><?php echo isset($conf['threads']) ? $conf['threads'] : '';?></span>
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
	</div> -->
	
	
	
</div>



<?php include $this->gettpl('footer.htm');?>

<?php include $this->gettpl('thread_list_js.inc.htm');?>

<script type="text/javascript">
$('#friendlink_img img').hover(function() {$(this).removeClass('xgrey')}, function() {$(this).addClass('xgrey')});
$('div.div div.body').find('div.hr:last').hide();// 隐藏最后一个 hr

// 鼠标背景变色
$('table.forum').bind('mouseover', function() {$('td:gt(0)', this).removeClass('bg1').addClass('bg2');});
$('table.forum').bind('mouseout', function() {$('td:gt(0)', this).removeClass('bg2').addClass('bg1');});

</script>



</body>
</html>