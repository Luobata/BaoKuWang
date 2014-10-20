<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>

<link href="http://localhost/forum/view/my.css" type="text/css" rel="stylesheet" />

<div class="width">

	<?php include $this->gettpl('my_nav.inc.htm');?>

	<div class="left border shadow bg2">
		<?php include $this->gettpl('my_menu.inc.htm');?>
	</div>
	
	<div class="right">
		<div class="page tab" style="margin-bottom: 4px;">
			<?php include $this->gettpl('my_file_nav.inc.htm');?>
		</div>
		<div class="list">
			<table class="table">
				<tr class="header">
					<td align="left">附件名</td>
					<td width="80">上传时间</td>
					<td width="30">售价</td>
					<td width="50">下载次数</td>
					<td width="30">收入</td>
					<td width="80">版块</td>
					<td width="50">所在主题</td>
					<td width="80">查看下载历史</td>
				</tr>
				<?php if($attachlist) { ?>
				<?php if(!empty($attachlist)) { foreach($attachlist as &$attach) {?>
				<tr>
					<td><a href="<?php echo isset($conf['upload_url']) ? $conf['upload_url'] : '';?>attach/<?php echo isset($attach['filename']) ? $attach['filename'] : '';?>" target="_blank"><?php echo isset($attach['orgfilename']) ? $attach['orgfilename'] : '';?></a></td>
					<td><?php echo isset($attach['dateline_fmt']) ? $attach['dateline_fmt'] : '';?></td>
					<td><?php echo isset($attach['golds']) ? $attach['golds'] : '';?></td>
					<td><?php echo isset($attach['downloads']) ? $attach['downloads'] : '';?></td>
					<td><?php echo isset($attach['incomes']) ? $attach['incomes'] : '';?></td>
					<td><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>.htm" target="_blank"><?php echo isset($attach['forumname']) ? $attach['forumname'] : '';?></a></td>
					<td><a href="http://localhost/forum/?my-attachthread-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>-pid-<?php echo isset($attach['pid']) ? $attach['pid'] : '';?>.htm" target="_blank">点击查看</a></td>
					<td><a href="http://localhost/forum/?my-downlog-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>-aid-<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>.htm">查看下载历史</a></td>
				</tr>
				<?php }} ?>
				<?php } else { ?>
				<tr>
					<td colspan="8">无</td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="page" style="text-align: center;"><?php echo isset($pages) ? $pages : '';?></div>
	</div>
</div>	

<?php include $this->gettpl('footer.htm');?>

</body>
</html>