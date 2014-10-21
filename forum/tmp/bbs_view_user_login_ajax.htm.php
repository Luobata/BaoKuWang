<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"540",height:"300",title:"用户登录"}-->



<form action="http://localhost/forum/?user-login-ajax-1.htm" method="post" id="login_form">
	<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
	<input type="hidden" name="clienttime" value="" />
	<dl>
		<dt><label for="login_email">Email/用户名：</label></dt>
		<dd><input type="text" name="email" id="login_email" value="<?php echo isset($user['email']) ? $user['email'] : '';?>" tabindex="10" style="width: 250px;" /> <a href="http://localhost/forum/?user-create-ajax-1.htm" onclick="return false;" class="ajaxdialog" id="login_create_link">注册</a></dd>
		
		<dt><label for="login_password">密　码：</label></dt>
		<dd>
			<input type="password" name="password" id="login_password" size="24" value="" title="请输入密码" tabindex="11" style="width: 250px;" /> 
			<?php if($conf['resetpw_on']) { ?><a href="http://localhost/forum/?user-resetpw.htm" target="_blank">找回密码</a><?php } ?>
		</dd>
		
		
		
		<dt></dt>
		<dd>
			<a type="submit" class="button bigblue" id="login_submit_ajax" value="登录" tabindex="12" href="javascript:void(0)" role="button"><span>登录</span></a>
			<a type="button" class="button biggrey" value="关闭" id="login_cancel" href="javascript:void(0)" role="button"><span>关闭</span></a>
		</dd>
		
		
	</dl>
</form>



<script type="text/javascript">

// 延迟执行的脚本，约定名字为：delay_execute()
function delay_execute(dialog, recall) {
	$('#login_email').focus();
	var ajaxhandle = null;
	$('#login_form').submit(function() {return false;});
	$('#login_submit_ajax').click(function() {
		
		$('div.alert').remove();
		$('#login_submit_ajax').disable();
		
		var postdata = $("#login_form").serialize();
		$.post($('#login_form').attr('action'), postdata,  function(s){
			
			$('#login_submit_ajax').enable();
			
			var json = json_decode(s);
			if(error = json_error(json)) {alert(error); return false;}
			if(json.status <= 0) {alert(json.message); return false;}
			json = json.message;
			
			if(json.email) {
				$('#login_email').alert(json.email).focus();
				return false;
			}
			if(json.password) {
				$('#login_password').alert(json.password).focus();
				return false;
			}

			
			if(!json.user) {
				alert('返回数据格式有问题:' + s);
				return false;
			} else {
				var user = json.user;
				g_uid = user.uid;
				
				// 服务端已经设置了 xn_auth, js 不用再管
				
				var adminadd = user.groupid == 1 ? ' <a href="<?php echo isset($conf['app_url']) ? $conf['app_url'] : '';?>admin/">管理</a> ' : '';
				$('#user').html('<a href="http://localhost/forum/?my-profile.htm">' + user.username + '</a> '+adminadd);
		 		
				// 同步登陆可以插入到此处

		 		
				$('#login_email, #login_password').val('');
				dialog.set_body('<div class="ok">登录成功!</div>');
				
		 		if(recall) {
		 			dialog.close();
					recall();
				} else {
					setTimeout(function(){
			 			dialog.close();
			 			window.location.reload();
			 		}, 1000);
				}
			}
		  });
		return false;
	});
	
	$('#login_cancel').click(function() {
		dialog.close();
	});
	
	$('#login_form input').keyup(function(e) {
		//e = e || document.parentWindow.event;
		var e = e ? e : window.event;
                var kc = e.keyCode ? e.keyCode : e.charCode;
		if(kc == 13) {
			$('#login_submit_ajax').trigger('click');
		}
		return true;
	});
	
	// 给 link 指定回调，这是一个全局的。
	$('#login_create_link').get(0).recall = recall;
	
	$('#login_form input[name=clienttime]').val(Math.round(new Date().getTime()/1000));
	

}
</script>
