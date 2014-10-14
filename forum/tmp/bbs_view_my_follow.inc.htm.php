<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>			<ul class="userlist">
			<?php if(!empty($userlist)) { foreach($userlist as &$user) {?>
				<li>
					<div>
						<?php if($_user['uid'] && $_user['uid'] != $user['uid']) { ?>
						<a href="http://localhost/forum/?pm-ajaxlist-uid-<?php echo isset($user['uid']) ? $user['uid'] : '';?>-ajax-1.htm" class="ajaxdialog" ajaxdialog="{position: 'center', modal: false}" value="短消息" onclick="return false;" /><span class="avatar_middle border" style="<?php if($user['avatar_middle']) { ?>background-image: url(<?php echo isset($user['avatar_middle']) ? $user['avatar_middle'] : '';?>)<?php } ?>" uid="<?php echo isset($user['uid']) ? $user['uid'] : '';?>"></span></a>
						<?php } else { ?>
						<span class="avatar_middle border" uid="<?php echo isset($user['uid']) ? $user['uid'] : '';?>" style="<?php if($user['avatar_middle']) { ?>background-image: url(<?php echo isset($user['avatar_middle']) ? $user['avatar_middle'] : '';?>)<?php } ?>"></span>
						<?php } ?>
					</div>
					<div style="white-space: nowrap;">
						<a href="http://localhost/forum/?you-index-uid-<?php echo isset($user['uid']) ? $user['uid'] : '';?>.htm" target="_blank" rel="nofollow"><span style="font-size: 12px; white-space: nowrap;" title="<?php echo isset($user['username']) ? $user['username'] : '';?>"><?php echo isset($user['username']) ? $user['username'] : '';?></span></a>
					</div>
					
				</li>
			<?php }} ?>
			</ul>