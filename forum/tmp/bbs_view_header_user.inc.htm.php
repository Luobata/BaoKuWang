<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>				<span id="user">
					
				<?php if($_user['groupid'] == 0) { ?>
					
					<!--
					<a href="http://localhost/forum/?user-login.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-user"></span> 登录</a>
					<a href="http://localhost/forum/?user-create.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-create"></span> 注册</a>
					-->

				<?php } else { ?>
					
					<a style="display: none;" href="http://localhost/forum/?my-profile.htm" title="<?php echo isset($_user['groupname']) ? $_user['groupname'] : '';?>"><!--<span class="icon icon-user-user"></span>-->设置<!--<?php echo isset($_user['username']) ? $_user['username'] : '';?>--></a>
					
					<?php if($_user['groupid'] == 6) { ?>
					<a href="http://localhost/forum/?user-reactive.htm">邮箱激活</a>
					<?php } ?>
					
					<span id="pm">
                        <a href="http://localhost/forum/?my-post.htm" class="pm"><!--<span class="icon icon-pm"></span>-->我的发帖</a>
						<a href="http://localhost/forum/?my-pm.htm" class="pm"><!--<span class="icon icon-pm"></span>-->联系人</a>
                        <a href="http://localhost/forum/?my-profile.htm" class="pm"><!--<span class="icon icon-pm"></span>-->设置</a>
                        <a href="http://localhost/forum/?my-pm.htm" style="display: none;" aria-label="消息" class="newpm"><span class="icon icon-newpm"></span> 消息</a>
					</span>
				
					<?php if($_user['groupid'] > 0 && $_user['groupid'] < 6) { ?>
					<a href="admin/" target="_blank"><span class="icon icon-setting"></span> 管理</a>
					<?php } ?>
					
					<!--
					<a href="http://localhost/forum/?user-logout.htm" class="ajaxdialog" onclick="return false"><span class="icon icon-user-logout"></span> 退出</a>
					-->

				<?php } ?>
					
				</span>