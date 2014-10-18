<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>		<div class="page tab" style="margin-bottom: 4px;">
			<a href="http://localhost/forum/?my-profile.htm" <?php echo isset($_checked['profile']) ? $_checked['profile'] : '';?>>基本信息</a>
			<a href="http://localhost/forum/?my-homepage.htm" <?php echo isset($_checked['homepage']) ? $_checked['homepage'] : '';?>>个人信息</a>
			<a href="http://localhost/forum/?my-password.htm" <?php echo isset($_checked['password']) ? $_checked['password'] : '';?>>修改密码</a>
			<a href="http://localhost/forum/?my-avatar.htm" <?php echo isset($_checked['avatar']) ? $_checked['avatar'] : '';?>>修改头像</a>
			
		</div>