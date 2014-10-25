<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><div style="margin-top: 4px; text-align: center;">
	<span class="avatar_big border" id="avatar_menu" style="<?php if($_user['avatar_big']) { ?>background-image: url(<?php echo isset($_user['avatar_big']) ? $_user['avatar_big'] : '';?>)<?php } ?>"></span>
</div>

<div style="text-align: center; margin-bottom: 20px;" class="grey">
	<?php echo isset($_user['username']) ? $_user['username'] : '';?>
</div>

<ul class="left_menu">
	
	<li <?php echo isset($_checked['my_profile']) ? $_checked['my_profile'] : '';?>><a href="http://localhost/forum/?my-profile.htm">我的资料</a></li>
	<li <?php echo isset($_checked['my_post']) ? $_checked['my_post'] : '';?>><a href="http://localhost/forum/?my-post.htm">我的发帖</a></li>
	<li <?php echo isset($_checked['my_follow']) ? $_checked['my_follow'] : '';?>><a href="http://localhost/forum/?my-follow.htm">我的联系人</a></li>
	<li <?php echo isset($_checked['my_wealth']) ? $_checked['my_wealth'] : '';?>><a href="http://localhost/forum/?my-income.htm">我的财富</a></li>
	<li <?php echo isset($_checked['my_file']) ? $_checked['my_file'] : '';?>><a href="http://localhost/forum/?my-upload.htm">我的文件</a></li>
	
</ul>