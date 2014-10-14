<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>

<link href="http://localhost/forum/view/my.css" type="text/css" rel="stylesheet" />

<div class="width">

	<?php include $this->gettpl('my_nav.inc.htm');?>

	<div class="left border shadow bg2">
		<?php include $this->gettpl('my_menu.inc.htm');?>
	</div>
	
	<div class="right">
		<div class="page tab" style="margin-bottom: 4px;">
			<a href="http://localhost/forum/?my-follow.htm" <?php echo isset($_checked['follow']) ? $_checked['follow'] : '';?>>我的关注</a>
			<a href="http://localhost/forum/?my-followed.htm" <?php echo isset($_checked['followed']) ? $_checked['followed'] : '';?>>我的粉丝</a>
			<a href="http://localhost/forum/?my-pm.htm" <?php echo isset($_checked['pm']) ? $_checked['pm'] : '';?>>最近联系人</a>
			
		</div>
		<div class="div">
			<div class="header">最近联系人</div>
			<div class="body">
				<?php include $this->gettpl('my_follow.inc.htm');?>
				
			</div>
			<div class="footer"></div>
		</div>
	</div>
</div>	

<?php include $this->gettpl('footer.htm');?>

<script>
var newuid = new Array();
<?php if(!empty($newlist)) { foreach($newlist as &$new) {?>
newuid[<?php echo isset($new['senduid']) ? $new['senduid'] : '';?>] = <?php echo isset($new['senduid']) ? $new['senduid'] : '';?>; 
<?php }} ?>

$.fn.shake = function(run) {
	this.each(function() {
		if(run) {
			var jthis = $(this);
			this.shake_time_handle = setInterval(function() {
				if(jthis.css('marginLeft') != '-2px') {
					jthis.css({'marginLeft':'-2px', 'marginTop':'2px'});
				} else {
					jthis.css({'marginLeft':'0px', 'marginTop':'0px'});
				}
			}, 200);
		} else {
			if(this.shake_time_handle) {
				clearInterval(this.shake_time_handle);
			}
		}
	});
}
		
$('ul.userlist span.avatar_middle').each(function() {
	var javatar = $(this);
	var uid = javatar.attr('uid');
	var width = javatar.width();
	var height = javatar.height();
	//javatar.parent().css({display: 'inline-block'}).width(width).height(height);
	if(newuid[uid]) {
		// javatar 跳动
		javatar.shake(1);
		//javatar.css({'margin-left':'-1px', 'margin-bottom:': '-1px'}).delay(1000).css({'margin-left':'0px', 'margin-bottom:': '0px'});
	}
	// 点击后停止跳动
	javatar.click(function() {
		$(this).shake(0);
	});
});

</script>

</body>
</html>