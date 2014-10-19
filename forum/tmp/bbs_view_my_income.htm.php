<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>

<link href="http://localhost/forum/view/my.css" type="text/css" rel="stylesheet" />

<div class="width">

	<?php include $this->gettpl('my_nav.inc.htm');?>

	<div class="left border shadow bg2">
		<?php include $this->gettpl('my_menu.inc.htm');?>
	</div>
	
	<div class="right">
		<div class="page tab" style="margin-bottom: 4px;">
			<?php include $this->gettpl('my_pay.inc.htm');?>
		</div>
		<div class="list">
			<table class="table">
				<tr class="header">
					<td align="left">附件名</td>
					<td width="100" align="left">所在主题</td>
					<td width="100">下载人</td>
					<td width="100">时间</td>
					<td width="100">金币</td>
				</tr>
				<?php if($incomelist) { ?>
				<?php if(!empty($incomelist)) { foreach($incomelist as &$income) {?>
				<tr>
					<td><a href="<?php echo isset($conf['upload_url']) ? $conf['upload_url'] : '';?>attach/<?php echo isset($income['attach']['filename']) ? $income['attach']['filename'] : '';?>" target="_blank"><?php echo isset($income['attach']['orgfilename']) ? $income['attach']['orgfilename'] : '';?></a></td>
					<td><a href="http://localhost/forum/?my-attachthread-fid-<?php echo isset($income['attach']['fid']) ? $income['attach']['fid'] : '';?>-pid-<?php echo isset($income['attach']['pid']) ? $income['attach']['pid'] : '';?>.htm" target="_blank">点击查看</a></td>
					<td><a href="http://localhost/forum/?you-index-uid-<?php echo isset($income['uid']) ? $income['uid'] : '';?>.htm" target="_blank" rel="nofollow"><?php echo isset($income['user']['username']) ? $income['user']['username'] : '';?></a></td>
					<td><?php echo isset($income['dateline_fmt']) ? $income['dateline_fmt'] : '';?></td>
					<td><?php echo isset($income['golds']) ? $income['golds'] : '';?> 枚</td>
				</tr>
				<?php }} ?>
				<?php } else { ?>
				<tr>
					<td colspan="5">无</td>
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