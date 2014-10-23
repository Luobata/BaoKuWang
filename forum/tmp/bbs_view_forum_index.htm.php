<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>


<div class="width">

	
	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px;">
		<tr>
			<td class="left"></td>
			<td class="center">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				
				<span><?php echo isset($forum['name']) ? $forum['name'] : '';?></span>
				
			</td>
			<td class="center2">
				<?php include $this->gettpl('header_user.inc.htm');?>
				<!-- <a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread" rel="nofollow"><span class="icon icon-post-newthread"></span> 发新帖</a> -->
			</td>
			<td class="right"></td>
		</tr>
	</table>
         
<!-- 	<span class="sep"></span>
	<a href="./" <?php echo isset($_checked['index']) ? $_checked['index'] : '';?>>首页</a>
        
        <?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
        Test
	<span class="sep"></span>
	<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>	
          <?php }}?> -->
	
	
	
	<?php if(!empty($forum['types'])) { ?>
	<div class="tab" id="threadtype">
		<?php if(!empty($forum['types'])) { foreach($forum['types'] as $cateid=>&$types) {?>
		<?php if($types) { ?>
		<div>
			<table>
				<tr>
					<td valign="top" style="white-space: nowrap"><?php if(!empty($forum["typecates"]["$cateid"])) { ?><span class="grey"><?php echo isset($forum["typecates"]["$cateid"]) ? $forum["typecates"]["$cateid"] : '';?>：</span><?php } ?></td>
					<td>
					<?php if($cateid == 1) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-0-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部1</a><?php } ?>
					<?php if($cateid == 2) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-0-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部2</a><?php } ?>
					<?php if($cateid == 3) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-0-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部3</a><?php } ?>
					<?php if($cateid == 4) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-0.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部4</a><?php } ?>
					<?php if(!empty($types)) { foreach($types as $typeid=>&$typename) {?>
					<?php if($cateid == 1) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid) ? $typeid : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 5</a><?php } ?>
					<?php if($cateid == 2) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid) ? $typeid : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 6</a><?php } ?>
					<?php if($cateid == 3) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid) ? $typeid : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 7</a><?php } ?>
					<?php if($cateid == 4) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid) ? $typeid : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 8</a><?php } ?>
					<?php }}?>
					</td>
				</tr>
			</table>
		</div>
		<?php } ?>
		<?php }}?>
	</div>
	<?php } ?>
	
	<?php include $this->gettpl('thread_list.inc.htm');?>
	
	<?php if($page == 1) { ?>
	<!-- <div class="div" style="margin-top: 8px;">
		<div class="header">版块信息</div>
		<div class="body">
			<p>
				<span>
					<span class="grey">版块名称s：</span><b><?php echo isset($forum['name']) ? $forum['name'] : '';?></b> &nbsp; <span class="grey2">|</span> 
					<span class="grey">主题：</span><b><?php echo isset($forum['threads']) ? $forum['threads'] : '';?></b> &nbsp;  <span class="grey2">|</span> 
					<span class="grey">帖子：</span><b><?php echo isset($forum['posts']) ? $forum['posts'] : '';?></b> &nbsp;  <span class="grey2">|</span> 
					<span class="grey">今日帖子：</span><span class="new bold"><?php echo isset($forum['todayposts']) ? $forum['todayposts'] : '';?></span> &nbsp;
					<?php if($forum['modlist']) { ?>
					  <span class="grey2">|</span> 
					  <span class="grey">版主：</span><?php if(!empty($forum['modlist'])) { foreach($forum['modlist'] as $modid=>&$modname) {?><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($modid) ? $modid : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" rel="nofollow"><?php echo isset($modname) ? $modname : '';?></a> <?php }}?>
					<?php } ?>
				</span>
			</p>
			<?php if($forum['brief']) { ?>
			<p style="margin-top: 8px;">
				<span class="grey">版块介绍：<?php echo isset($forum['brief']) ? $forum['brief'] : '';?></span>
			</p>
			<?php } ?>
		</div>
		<div class="footer"></div>
	</div> -->
	<?php } ?>
	
</div>	

<?php include $this->gettpl('footer.htm');?>

<?php include $this->gettpl('thread_list_js.inc.htm');?>

<script type="text/javascript">

</script>


</body>
</html>