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
			</td>
			<td class="right"></td>
		</tr>
	</table>
	

	<div class="box bg2 border shadow">
		<div style="margin: 2em;">
			
			
			
			<h1 style="text-align: center;">
				<?php if(is_array($message)) { ?>
					<?php if(!empty($message)) { foreach($message as &$msg) {?>
						<li><?php echo isset($msg) ? $msg : '';?></li>
					<?php }} ?>
				<?php } else { ?>
				<?php echo isset($message) ? $message : '';?>
				<?php } ?>
				
				
			</h1>
			
			<?php if(!$goto) { ?>
			<p style="text-align: center; margin-top: 40px; margin-bottom: 40px;"><a type="button" value=" 返回 " class="button bigblue" onclick="history.back();return false;" href="javascript:void(0)" role="button"><span> 返回 </span></a></p>
			<?php } else { ?>
			<p style="text-align: center; margin-top: 40px; margin-bottom: 40px;"><a type="button" value=" 点击这里跳转 " class="button bigblue" onclick="window.location='<?php echo isset($goto) ? $goto : '';?>';return false;" href="javascript:void(0)" role="button"><span> 点击这里跳转 </span></a></p>
			<?php } ?>
			
			
		</div>
	</div>
</div>



<?php include $this->gettpl('footer.htm');?>

<?php if($goto) { ?>
<script type="text/javascript">
setTimeout(function() {window.location='<?php echo isset($goto) ? $goto : '';?>'}, 3000);
</script>
<?php } ?>

</body>
</html>