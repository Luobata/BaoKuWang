<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><?php include $this->gettpl('header.htm');?>



<div class="width">
	<div class="box bg2 border shadow">
		<div style="margin: 2em; height: 300px;" id="msgbox"></div>
	</div>
</div>

<?php include $this->gettpl('footer.htm');?>

<script type="text/javascript">
$('#msgbox').height($(window).height() -  $('#header').height() - 300 - $('#menu').height());
ajaxdialog_request('http://localhost/forum/?user-login-ajax-1.htm', function() {
	window.location = '<?php echo isset($referer) ? $referer : '';?>';
});
</script>



</body>
</html>