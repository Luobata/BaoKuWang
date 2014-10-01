<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"400",height:"200",title:"用户退出"}-->



<h2 style="text-align: center; margin: 32px;"> 您确定退出吗？</h2>
<div style="text-align: center">
	<form action="http://localhost/forum/?user-logout-ajax-1.htm" method="post" id="logout_form">
		<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
		
		<a type="submit" class="button bigblue" id="logout_submit" value="退出" href="javascript:void(0)" role="button"><span>退出</span></a>
		<a type="button" class="button biggrey" value="关闭" id="logout_cancel" href="javascript:void(0)" role="button"><span>关闭</span></a>
		
	</form>
</div>



<script type="text/javascript">

// 延迟执行的脚本，约定名字为：delay_execute()
function delay_execute(dialog, recall) {
	var ajaxhandle = null;
	$('#logout_submit').click(function() {
		
		// 终止短消息循环
		if(newpm_instance) newpm_instance.stop();
		
		$('#logout_submit').disable();
		
		var postdata = $("#logout_form").serialize();
		$.post($('#logout_form').attr('action'), postdata,  function(s){
			
			$('#logout_submit').enable();
			
			var json = json_decode(s);
			if(error = json_error(json)) {alert(error); return false;}
			
			json = json.message;
			

			g_uid = 0;
			$('#user').html('<a href="http://localhost/forum/?user-login-ajax-1.htm" class="ajaxdialog" onclick="return false">登录</a> <a href="http://localhost/forum/?user-create-ajax-1.htm" class="ajaxdialog" onclick="return false">注册</a>');
			dialog.set_body('<div class="ok">退出成功。</div>');
			if(recall) {
	 			dialog.close();
				recall();
			} else {
				setTimeout(function(){
		 			dialog.close();
		 			window.location.reload();
		 		}, 1000);
			}
			
		});
		return false;
	});
	
	$('#logout_cancel').click(function() {
		dialog.close();
	});
	

}
</script>
