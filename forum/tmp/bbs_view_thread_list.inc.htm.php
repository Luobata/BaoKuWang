<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>  <link rel="stylesheet" href="http://localhost/forum/view/css/forum.css"></link>
<div class="page_content">
<div class="page_left">
	

<div class="div">
	
	<div class="header" style="font-weight: normal;">
		<table width="100%" cellspacing="0" cellpadding="0" style="word-break: break-all" >
			<tr align="left">
				<td valign="middle" class="subject indextitle">
				<?php if($fid) { ?>
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>.htm" rel="nofollow" <?php if(!core::gpc('digest')) { ?>class="grey"<?php } ?>>普通主题</a>  
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-digest-1.htm" rel="nofollow" <?php if(core::gpc('digest')) { ?>class="grey"<?php } ?>>精华主题</a>
					
					<?php if(!core::gpc('digest') && !core::gpc('typeid1') && !core::gpc('typeid2') && !core::gpc('typeid3') && !core::gpc('typeid4')) { ?>
					<span id="nav_orderby">
						<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-0  <?php echo isset($_checked['orderby'][0]) ? $_checked['orderby'][0] : '';?>" title="顶帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 8px;"></a><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-1  <?php echo isset($_checked['orderby'][1]) ? $_checked['orderby'][1] : '';?>" title="发帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 4px;"></a>
					</span>
					<?php } ?>
				<?php } else { ?>
					宝库论坛
				<?php } ?>
					
				</td>
				
				<?php if($fid) { ?>
				<td width="80" class="username fatie">发帖</td>
				<td width="80" class="lastpost huitie">回帖</td>
				<td width="80" class="views chakan" align="center">回复/查看</td>
                <?php } ?>
                
                <td>
                <?php if(!$fid) { ?>
                
				
				<span class="grey today">今日：</span><span class="todayposts "><?php echo isset($conf['todayposts']) ? $conf['todayposts'] : '';?></span>
                                                                       
				<span class="grey today">主题：</span><span class="todayposts"><?php echo isset($conf['threads']) ? $conf['threads'] : '';?></span>
				
                 </td>
                 <?php } ?>                                                 
				
			</tr>
		</table>
	</div>
	<div class="body threadlist" id="threadlist">
	
		
		<?php if($fid) { ?>
		<?php if(!empty($toplist)) { foreach($toplist as &$thread) {?>
			<?php include $this->gettpl('thread_list_line.inc.htm');?>
		<?php }} ?> 
		<?php } ?>
		<!--如果是首页则展示板块，否则展示-->
		<?php if(!$fid) { ?>
		<!--展示板块-->
		<?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
			<?php include $this->gettpl('thread_list_line.inc.htm');?>
			
        <?php }}?>
		<?php } ?>	

		
		<?php if(!empty($toplist)) { ?>
		<div class="bg2" style="line-height: 12px; height: 12px;">
			<div style="width: 56px; float: left;" class="grey"></div>
		</div>
		<hr />
		<?php } ?>
		<!-- 这里好像有点问题-->
		<?php if($fid) { ?>

		<?php if(!empty($threadlist)) { foreach($threadlist as &$thread) {?>
			<?php include $this->gettpl('thread_list_line.inc.htm');?>
		<?php }} ?>
		<?php } ?>
		
		
</div>
	</div>
	<!-- <div class="footer"></div> -->
	</div>
	<div class="page_right">
		<?php if(!$fid) { ?>
		<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread"  rel="nofollow">
		<?php } else { ?>
		<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread" rel="nofollow">
			<?php } ?>
		<div class="newt">
			发布新话题
		</div>
		</a>
		<div class="recommand">
			<div class="rec">
				推荐
			</div>
			<div class="rec_content">
				<li class="fir">
					<a href=""><span class="twotext left">鉴定</span></a>
					<a href=""><span class="fourtext right">线下交易</span></a>
				</li>
				<li class="sec">
					<a href=""><span class="fourtext left">古玩知识</span></a>
					<a href=""><span class="twotext right">估值</span></a>
				</li>
			</div>
		</div>
		
	</div>
</div>
<?php if(!empty($pages)) { ?>
<div class="page" style="margin: auto; margin-top: 8px; text-align: center; clear: both;"><?php echo isset($pages) ? $pages : '';?></div>
<?php } ?>


<?php if($fid && $ismod) { ?>
<div style="text-align: center; margin-top: 8px;width:715px;">
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


