<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>

<link href="http://localhost/forum/view/my.css" type="text/css" rel="stylesheet" />

<div class="width">

	<?php include $this->gettpl('my_nav.inc.htm');?>

	<div class="left border  bg2">
		<?php include $this->gettpl('my_menu.inc.htm');?>
	</div>
	
	<div class="right">
		
		<?php include $this->gettpl('my_profile_nav.inc.htm');?>
		
		<div class="bg1 border" style="padding:10px;">
			<table cellpadding="0" cellspacing="0" width="576" style="table-layout: fixed; margin-top: 8px;">
				<tr>
					<td width="128" valign="top" align="center" style="padding-right:40px;">
						<a href="http://localhost/forum/?you-index-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" rel="nofollow"><span class="avatar_huge border" style="<?php if($_user['avatar_huge']) { ?>background-image: url(<?php echo isset($_user['avatar_huge']) ? $_user['avatar_huge'] : '';?>);<?php } ?>"></span></a>
			
						<?php if($_user['homepage']) { ?>
						<a href="<?php echo isset($_user['homepage']) ? $_user['homepage'] : '';?>" target="_blank" rel="nofollow"><span class="icon icon-myhome"></span>个人空间</a>
						<?php } ?>
						
					</td>
					<td valign="top">
					
						<table cellpadding="0" cellspacing="4" width="96%" align="center">
							<tr valign="top">
								<td>
									<p style="line-height: 20px;"><span class="grey">　用户组：</span><?php echo isset($_user['groupname']) ? $_user['groupname'] : '';?></p>
									<p style="line-height: 20px;"><span class="grey">注册时间：</span><?php echo isset($_user['regdate_fmt']) ? $_user['regdate_fmt'] : '';?></p>
									<p style="line-height: 20px;"><span class="grey">最后活跃：</span><?php echo isset($_user['lastactive_fmt']) ? $_user['lastactive_fmt'] : '';?></p>
									<p style="line-height: 20px;"><span class="grey">在线状态：</span><?php if($_user['isonline']) { ?><b class="red">在线</b><?php } else { ?>离线<?php } ?></p>
									
								</td>
								<td width="30%">
									<p style="line-height: 20px;"><span class="grey">主题：</span><b style="font-size: 14px; text-decoration: underline"><?php echo isset($_user['threads']) ? $_user['threads'] : '';?></b></p>
									<p style="line-height: 20px;"><span class="grey">帖子：</span><a href="http://localhost/forum/?you-post-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" rel="nofollow"><b style="font-size: 14px;"><?php echo isset($_user['posts']) ? $_user['posts'] : '';?></b></a></p>
									<p style="line-height: 20px;"><span class="grey">积分：</span><b style="font-size: 14px;"><?php echo isset($_user['credits']) ? $_user['credits'] : '';?></b></p>
									<p style="line-height: 20px;"><span class="grey">金币：</span><b style="font-size: 14px;"><?php echo isset($_user['golds']) ? $_user['golds'] : '';?></b></p>

									
								</td>
								<td width="30%">
									<p style="line-height: 20px;"><span class="grey">精华：</span><b style="font-size: 14px;"><?php echo isset($_user['digests']) ? $_user['digests'] : '';?></b></p>
									<p style="line-height: 20px;"><span class="grey">关注：</span><a href="http://localhost/forum/?you-follow-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" rel="nofollow"><b style="font-size: 14px; text-decoration: underline;"><?php echo isset($_user['follows']) ? $_user['follows'] : '';?></b></a></p>
									<p style="line-height: 20px;"><span class="grey">粉丝：</span><a href="http://localhost/forum/?you-followed-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" rel="nofollow"><b style="font-size: 14px; text-decoration: underline;"><?php echo isset($_user['followeds']) ? $_user['followeds'] : '';?></b></a></p>
									
								</td>
							</tr>
							
							
							
							<?php if($_user['groupid'] == 1) { ?>
							<tr>
								<td colspan="3" height="10"></td>
							</tr>
							<tr>
								<td>
									<?php echo isset($_user['email']) ? $_user['email'] : '';?> 
								</td>
								<td colspan="2">
									<span class="grey">注册IP：</span><?php echo isset($_user['regip']) ? $_user['regip'] : '';?> 
								</td>
							</tr>
							<?php } ?>

							
							
							
						</table>
						
						
					</td>
				</tr>
			</table>
			
		</div>
	</div>
</div>

<?php include $this->gettpl('footer.htm');?>



</body>
</html>