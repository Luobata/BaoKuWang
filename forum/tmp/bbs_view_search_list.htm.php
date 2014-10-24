<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>
<style>
.filter_body li {line-height: 1.6;}
.filter_body ul {margin-top: 0px; padding-top: 0px;}
.filter_body hr {margin: 4px;}
</style>
<div class="width">
	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px;">
		<tr>
			<td class="left"></td>
			<td class="center">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				<span>论坛搜索</span>
			</td>
			<td class="right"></td>
		</tr>
	</table>
	
	<!-- <div style="padding: 8px;">
		<input type="text" id="srchkeyword" name="keyword" value="<?php echo isset($keyword) ? $keyword : '';?>" x-webkit-speech lang="zh-CN" style="width: 328px; height: 18px;" />
		<a type="button" class="button smallblue" value="搜索" id="srchsubmit" href="javascript:void(0)" role="button"><span>搜索</span></a>
	</div> -->
	
<?php if($keyword) { ?>
	<table width="100%">
		<tr valign="top">
			<td width="160">
				<div class="div"style="display:blcok;width:160px;">
					<div class="header" style="font-weight: normal;">
						筛选条件
					</div>
					<div class="body filter_body">
						<p class="grey">&nbsp; 版块:</p>
						<hr />
						<ul>							
							<li><a href="http://localhost/forum/?search-index-fid-0-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-<?php echo isset($daterange) ? $daterange : '';?>-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['fid_0']) ? $_checked['fid_0'] : '';?>>全部</a></li>
							<?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($_fid) ? $_fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-<?php echo isset($daterange) ? $daterange : '';?>-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked["fid_$_fid"]) ? $_checked["fid_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a></li>
							<?php }}?>
						</ul>
						
						<p class="grey">&nbsp; 时间范围:</p>
						<hr />
						<ul>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-0-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_0']) ? $_checked['daterange_0'] : '';?>>全部</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-1-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_1']) ? $_checked['daterange_1'] : '';?>>一天内</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-7-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_7']) ? $_checked['daterange_7'] : '';?>>一周内</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-30-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_30']) ? $_checked['daterange_30'] : '';?>>一月内</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-365-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_365']) ? $_checked['daterange_365'] : '';?>>一年内</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-<?php echo isset($orderby) ? $orderby : '';?>-daterange-1095-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['daterange_1095']) ? $_checked['daterange_1095'] : '';?>>三年内</a></li>
						</ul>
						
						<p class="grey">&nbsp; 排序:</p>
						<hr />
						<ul>
							<?php if($searchtype == 'sphinx') { ?>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-match-daterange-<?php echo isset($daterange) ? $daterange : '';?>-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['orderby_match']) ? $_checked['orderby_match'] : '';?>>匹配度</a></li>
							<?php } ?>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-timedesc-daterange-<?php echo isset($daterange) ? $daterange : '';?>-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['orderby_timedesc']) ? $_checked['orderby_timedesc'] : '';?>>时间倒序</a></li>
							<li><a href="http://localhost/forum/?search-index-fid-<?php echo isset($fid) ? $fid : '';?>-orderby-timeasc-daterange-<?php echo isset($daterange) ? $daterange : '';?>-keyword-<?php echo isset($keyword_url) ? $keyword_url : '';?>.htm" <?php echo isset($_checked['orderby_timeasc']) ? $_checked['orderby_timeasc'] : '';?>>时间正序</a></li>
						</ul>
					</div>
				</div>
			</td>
			<td>
				<?php if(empty($threadlist)) { ?>
					<div class="div">
						<div class="header">搜索结果</div>
						<div class="body">
							<p>无匹配结果，请尝试更换关键词或者扩大筛选范围。</p>
						</div>
					</div>
				<?php } else { ?>
					<?php include $this->gettpl('thread_list.inc.htm');?>
				<?php } ?>	
			</td>
		</tr>
	</table>
<?php } ?>
</div>	

<?php include $this->gettpl('footer.htm');?>
<?php include $this->gettpl('thread_list_js.inc.htm');?>

<script type="text/javascript">
$('#srchsubmit').click(function() {
	<?php if($searchtype == 'sphinx' || $searchtype == 'title') { ?>
	window.location = 'http://localhost/forum/?search-index-keyword-'+encodeURIComponent($('#srchkeyword').val())+'.htm';
	<?php } else { ?>
	window.open('http://localhost/forum/?search-index-keyword-'+encodeURIComponent($('#srchkeyword').val())+'.htm');
	<?php } ?>
});
$('#srchkeyword').keyup(function(e) {
	if(e.which == 13 || e.which == 10) {
		$('#srchsubmit').trigger('click');
	}
}).focus();
</script>

</body>
</html>