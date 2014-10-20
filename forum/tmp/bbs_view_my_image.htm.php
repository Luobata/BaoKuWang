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
					<td>图片列表</td>
				</tr>
				<tr>
					<td>
					<?php if($attachlist) { ?>
					<?php if(!empty($attachlist)) { foreach($attachlist as &$attach) {?>
						<div style="width: 100px; height: 100px; float: left; text-align: center; margin: 10px;" class="border">
							<a href="<?php echo isset($conf['upload_url']) ? $conf['upload_url'] : '';?>attach/<?php echo isset($attach['filename']) ? $attach['filename'] : '';?>" title="<?php echo isset($attach['orgfilename']) ? $attach['orgfilename'] : '';?>" target="_blank"><img src="<?php echo isset($conf['upload_url']) ? $conf['upload_url'] : '';?>attach/<?php echo isset($attach['filename_thumb']) ? $attach['filename_thumb'] : '';?>" width="<?php echo isset($conf['thread_icon_middle']) ? $conf['thread_icon_middle'] : '';?>" height="<?php echo isset($conf['thread_icon_middle']) ? $conf['thread_icon_middle'] : '';?>"  style="margin: 8px;" /></a>
							<br /><a href="http://localhost/forum/?my-attachthread-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>-pid-<?php echo isset($attach['pid']) ? $attach['pid'] : '';?>.htm" target="_blank">所在主题</a>
							<br /><span class="small grey"><?php echo isset($attach['dateline_fmt']) ? $attach['dateline_fmt'] : '';?></span>
						</div>
					<?php }} ?>
					<?php } else { ?>
						无
					<?php } ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="page" style="text-align: center;"><?php echo isset($pages) ? $pages : '';?></div>
	</div>
</div>	

<?php include $this->gettpl('footer.htm');?>

</body>
</html>