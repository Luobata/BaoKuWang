<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>

<link href="http://localhost/forum/view/my.css" type="text/css" rel="stylesheet" />

<div class="width">

	<?php include $this->gettpl('my_nav.inc.htm');?>

	<div class="left border shadow bg2">
		<?php include $this->gettpl('my_menu.inc.htm');?>
	</div>
	
	<div class="right">
		
		<?php include $this->gettpl('my_profile_nav.inc.htm');?>
		
		<div class="bg1 border shadow">
			<form action="http://localhost/forum/?my-homepage.htm" method="post" id="my_homepage_form">
				<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
				
				<div class="body" style="width: 500px;">
					<dl>
					
						
						
						<dt><label for="homepage">博客地址：</label></dt>
						<dd><input type="text" name="homepage" id="homepage" size="24" value="<?php echo isset($user['homepage']) ? $user['homepage'] : '';?>" title="请输入网址" style="width: 320px;" /></dd>
						
						
						
						<dt></dt>
						<dd>
							<a type="submit" class="button bigblue" id="my_homepage_submit" value="修改个人资料" href="javascript:void(0)" role="button"><span>修改个人资料</span></a>
							<a type="button" class="button biggrey" value="取消" onclick="history.back();return false;" href="javascript:void(0)" role="button"><span>取消</span></a>
							<div class="notice" id="notice" style="display: none;"></div>
						</dd>
					</dl>
					
					
				</div>
			</form>
		</div>
	</div>
</div>	

<?php include $this->gettpl('footer.htm');?>

<script type="text/javascript">
$('#my_homepage_submit').click(function() {
	$('#my_homepage_form').submit();
	return false;
});

<?php if(!empty($error)) { foreach($error as $k=>&$v) {?>
<?php if($v) { ?>
	$('#<?php echo isset($k) ? $k : '';?>').alert('<?php echo isset($v) ? $v : '';?>').focus();
<?php } ?>
<?php }}?>

<?php if(!empty($_POST) && empty($error)) { ?>
	$('#notice').html('修改成功。').show();
<?php } ?>
</script>



</body>
</html>