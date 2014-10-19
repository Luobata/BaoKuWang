<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"400",title:"附件下载"}-->

<dl>
	<dt>附件名：</dt>
	<dd><img src="http://localhost/forum/view/image/filetype/<?php echo isset($attach['filetype']) ? $attach['filetype'] : '';?>.gif" width="16" height="16" /> <?php echo isset($attach['orgfilename']) ? $attach['orgfilename'] : '';?></dd>
	
	<dt>大小：</dt>
	<dd><?php echo isset($attach['filesize_fmt']) ? $attach['filesize_fmt'] : '';?></dd>
	
	<dt>下载次数：</dt>
	<dd><?php echo isset($attach['downloads']) ? $attach['downloads'] : '';?> 次</dd>
	
	<dt>最后更新时间：</dt>
	<dd><?php echo isset($attach['dateline_fmt']) ? $attach['dateline_fmt'] : '';?></dd>
	
	<dt>售价：</dt>
	<dd><span class="red"><?php echo isset($attach['golds']) ? $attach['golds'] : '';?> 金币</span></dd>
	
	<dt>您账户剩余：</dt>
	<dd><?php echo isset($_user['golds']) ? $_user['golds'] : '';?> 金币</dd>
	
	<dt>下载地址：</dt>
	<dd><a href="http://localhost/forum/?attach-download-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>-aid-<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>.htm" target="_blank"><span class="icon icon-download"></span> <u><b>本地下载</b></u></a></dd>
	
	<dt></dt>
	<dd>
		<br />
		<!--<a type="submit" class="button bigblue" onclick="window.open('http://localhost/forum/?attach-download-fid-<?php echo isset($attach['fid']) ? $attach['fid'] : '';?>-aid-<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>.htm');;return false;" id="down_click_<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>" value="点击下载" href="javascript:void(0)" role="button"><span>点击下载</span></a>-->
		<a type="button" class="button biggrey" value="关闭" id="down_cancel_<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>" href="javascript:void(0)" role="button"><span>关闭</span></a>
	</dd>
</dl>

<script type="text/javascript">

// 延迟执行的脚本，约定名字为：delay_execute()
function delay_execute(dialog, recall) {
	$('#down_cancel_<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>').click(function() {
		dialog.close();
	});
	$('#down_click_<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>').click(function() {
		dialog.close();
	});
}
</script>
