<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"700",height:600,title:"与 <?php echo isset($touser['username']) ? $touser['username'] : '';?> 对话"}-->
<?php if(!empty($pmlist)) { foreach($pmlist as &$pm) {?>
	<?php if($pm['uid'] != $_user['uid']) { ?>
		<div style="clear: both; margin-bottom: 4px;" class="pm_line">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td width="16">
						<span class="icon icon-pm-left-arrow" style="float: right; margin-right: -1px; margin-top: 0px; position: relative; _position: static;"></span>
					</td>
					<td>
						<table class="leftmsg" cellspacing="0" cellpadding="0" border="0" align="left">
							<tr>
								<td>
									<?php echo isset($pm['message']) ? $pm['message'] : '';?> <span class="small grey"> - <?php echo isset($pm['dateline']) ? $pm['dateline'] : '';?></span>
									<?php if($pm['uid'] == 2) { ?>
									<a href="http://localhost/forum/?pm-ajaxdelete-pmid-<?php echo isset($pm['pmid']) ? $pm['pmid'] : '';?>-ajax-1.htm" class="icon icon-delete" style="display: none; vertical-align: bottom;"></a></span>
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	<?php } else { ?>
		<div style="clear: both; margin-bottom: 4px;" class="pm_line">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td>
						<table class="rightmsg" cellspacing="0" cellpadding="0" border="0" align="right">
							<tr>
								<td>
									<?php echo isset($pm['message']) ? $pm['message'] : '';?> <span class="small grey"> - <?php echo isset($pm['dateline']) ? $pm['dateline'] : '';?> <a href="http://localhost/forum/?pm-ajaxdelete-pmid-<?php echo isset($pm['pmid']) ? $pm['pmid'] : '';?>-ajax-1.htm" class="icon icon-delete" style="display: none; vertical-align: bottom;"></a></span>
								</td>
							</tr>
						</table>
					</td>
					<td width="16">		
						<span class="icon icon-pm-right-arrow" style="float: left; margin-left: -1px; margin-top: 0px; position: relative; _position: static;"></span>
					</td>
				</tr>
			</table>
		</div>
	<?php } ?>
<?php }} ?>