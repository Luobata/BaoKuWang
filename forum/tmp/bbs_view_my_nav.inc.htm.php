<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px; clear: both;">
		<tr>
			<td class="left"></td>
			<td class="center">
				<a href="./" class="icon icon-home"></a>
				<span class="sep"></span>
				
				<a href="http://localhost/forum/?my-profile.htm">我的空间</a>
				<?php if(!empty($_nav)) { foreach($_nav as &$nav) {?>
				<span class="sep"></span>
				<span><?php echo isset($nav) ? $nav : '';?></span>
				<?php }} ?>
			</td>
			<td class="center2"><?php include $this->gettpl('header_user.inc.htm');?></td>
			<td class="right"></td>
		</tr>
	</table>
