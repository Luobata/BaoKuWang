<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"940",title:"发表新帖"}-->
<style type="text/css">
.post_thread_form dt {width: 5%;}
.post_thread_form dd {width: 93%;}
</style>
<form action="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-ajax-1.htm" method="post" id="post_thread_form_<?php echo isset($pid) ? $pid : '';?>" class="post_thread_form" target="_blank">
	<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
	
	<dl>
		
		<dt><label for="subject">标题：</label></dt>
		<dd style="white-space: nowrap">
			<?php if($forumselect) { ?><?php echo isset($forumselect) ? $forumselect : '';?><?php } ?>
			<span id="typeselect">
		<?php if($typeselect1 || $typeselect2 || $typeselect3 || $typeselect4) { ?>
			<?php if(!empty($forum['types'])) { foreach($forum['types'] as $cateid=>&$types) {?>
				<?php if($cateid == 1 && $typeselect1) { ?><?php echo isset($typeselect1) ? $typeselect1 : '';?><?php } ?>
				<?php if($cateid == 2 && $typeselect2) { ?><?php echo isset($typeselect2) ? $typeselect2 : '';?><?php } ?>
				<?php if($cateid == 3 && $typeselect3) { ?><?php echo isset($typeselect3) ? $typeselect3 : '';?><?php } ?>
				<?php if($cateid == 4 && $typeselect4) { ?><?php echo isset($typeselect4) ? $typeselect4 : '';?><?php } ?>
			<?php }}?>
		<?php } ?>
			</span>
			<input type="text" name="subject" id="subject_<?php echo isset($pid) ? $pid : '';?>" value="<?php echo isset($thread['subject']) ? $thread['subject'] : '';?>" style="width: 500px;" tabindex="100" /> <span class="small grey">(200字)</span>
		</dd>
		
		
		
		<dt><label for="thread_message_<?php echo isset($pid) ? $pid : '';?>">内容：</label></dt>
		<dd style="position: relative;"><textarea name="message" id="thread_message_<?php echo isset($pid) ? $pid : '';?>" style="width: 855px; height: 400px;" tabindex="101"></textarea></dd>
		
		
		
		<dt></dt>
		<dd>
			<a type="submit" class="button bigblue" id="post_thread_submit_<?php echo isset($pid) ? $pid : '';?>" value="发表新帖" tabindex="102" href="javascript:void(0)" role="button"><span>发表新帖</span></a>
			<a type="button" class="button biggrey" value="取消" id="post_thread_cancel_<?php echo isset($pid) ? $pid : '';?>" tabindex="103" href="javascript:void(0)" role="button"><span>取消</span></a>
			
		</dd>
		
	</dl>
</form>



<script type="text/javascript">

function delay_execute(dialog, recall) {
	
var attachnum = <?php echo isset($attachnum) ? $attachnum : '';?>;
var pid = <?php echo isset($pid) ? $pid : '';?>;

window.UEDITOR_HOME_URL = "<?php echo isset($conf['plugin_url']) ? $conf['plugin_url'] : '';?>baidu_editor/ueditor/";
$.xload('plugin/baidu_editor/ueditor/ueditor.config.js', 'plugin/baidu_editor/ueditor/ueditor.all.min.js', 'http://localhost/forum/view/js/swfupload/swfupload.js', function() {
	window.UEDITOR_CONFIG.snapscreenServerUrl = 'http://localhost/forum/?ueditor-uploadimage-<?php echo isset($conf['cookie_pre']) ? $conf['cookie_pre'] : '';?>sid-<?php echo isset($_sid) ? $_sid : '';?>-<?php echo isset($conf['cookie_pre']) ? $conf['cookie_pre'] : '';?>auth-<?php echo isset($_auth) ? $_auth : '';?>-ajax-1.htm';
	var editor = new UE.ui.Editor();
	window.editor = editor;
	editor.render("thread_message_<?php echo isset($pid) ? $pid : '';?>");
	
	editor.ready(function(){
			
		// TAB 切换键到 message
		$('#subject_<?php echo isset($pid) ? $pid : '';?>').keydown(function(e) {
			var keycode = e.keyCode ? e.keyCode : e.which;
			if(keycode == 9) {
				setTimeout(function() {editor.focus(true);}, 100); // fix chrome.
			}
		});
		
		//var attachdialog = editor.getDialog('attachment');
		var attachdialog = editor.ui._dialogs.attachmentDialog;
		attachdialog.iframeUrl = 'http://localhost/forum/?ueditor-attach-fid-<?php echo isset($fid) ? $fid : '';?>-pid-<?php echo isset($pid) ? $pid : '';?>-redirect-0.htm';
		
		attachdialog.onok = function() {
			$('#'+attachdialog.id+'_iframe')[0].contentWindow.attach_form_submit(attachdialog);
			return false;
		};
		
		window.set_attach_num = function(attachnum) {
			if(attachnum > 0) {
				$('#'+editor.ui.id).find('div.edui-for-attachment').alert(attachnum, {alerticon: 0, width: 20});
			}
		};
		window.set_attach_num(attachnum);
		
		// 快捷键相应
		editor.body.onkeydown = function(e) {
			if((e.ctrlKey && (e.which == 13 || e.which == 10)) || (e.altKey && e.which == 83)) {
				editor.sync();
				$('#post_thread_submit_<?php echo isset($pid) ? $pid : '';?>').trigger('click');
			}
		}
	});
});
	
	$('#subject_<?php echo isset($pid) ? $pid : '';?>').focus();
	
	// 自动伸缩，自动提交
	$('#thread_message_<?php echo isset($pid) ? $pid : '';?>').keyup(function(e) {
		if((e.ctrlKey && (e.which == 13 || e.which == 10)) || (e.altKey && e.which == 83)) {
			$('#post_thread_submit_<?php echo isset($pid) ? $pid : '';?>').trigger('click');
			return false;
		}
	});

	$('#post_thread_submit_<?php echo isset($pid) ? $pid : '';?>').click(function() {
		$('div.alert').remove();
		$('#post_thread_submit_<?php echo isset($pid) ? $pid : '';?>').disable();
		var postdata = $("#post_thread_form_<?php echo isset($pid) ? $pid : '';?>").serialize();
		$.post($('#post_thread_form_<?php echo isset($pid) ? $pid : '';?>').attr('action'), postdata,  function(s){
			$('#post_thread_submit_<?php echo isset($pid) ? $pid : '';?>').enable();
			var json = json_decode(s);
			if(error = json_error(json)) {alert(error); return false;}
			if(json.status <=0) {
				alert(json.message);
				return false;
			}
			
			json = json.message;
			if(json.subject) {
				$('#subject_<?php echo isset($pid) ? $pid : '';?>').alert(json.subject, {width: 250, delay: 3000}).focus();
				return false;
			}
			if(json.message) {
				$('#thread_message_<?php echo isset($pid) ? $pid : '';?>').parent().alert(json.message, {width: 250, delay: 3000});
				$('#thread_message_<?php echo isset($pid) ? $pid : '';?>')[0].focus();
				return false;
			}
			

			
			var thread = json.thread;
			
			$('#thread_message_<?php echo isset($pid) ? $pid : '';?>').val('');
	 		
	 		dialog.set_body('<div class="ok">发表成功，页面将自动跳转到列表页！</div>');
	 		setTimeout(function() {
	 			if(thread && (thread.typeid1 || thread.typeid2 || thread.typeid3 || thread.typeid4)) {
	 				var typeidurl = '-typeid1-'+thread.typeid1+'-typeid2-'+thread.typeid2+'-typeid3-'+thread.typeid3+'-typeid4-'+thread.typeid4; 
	 			} else {
	 				var typeidurl = '';
	 			}
	 			window.location= 'http://localhost/forum/?thread-index-fid-'+thread.fid+'-tid-'+thread.tid+typeidurl+'.htm';
	 			dialog.close();
	 		}, 500);
		  });
		  
		  
		  
		  return false;
	});
	$('#post_thread_cancel_<?php echo isset($pid) ? $pid : '';?>').click(function() {
		dialog.close();
	});
	
	// 选择版块，AJAX 加载主题分类
	$('#fid').change(function() {
		var fid = this.value;
		$.get('http://localhost/forum/?post-typeselect-fid-'+fid+'-ajax-1.htm', function(s) {
			var json = json_decode(s);
			if(error = json_error(json)) {alert(error); return false;}
			if(json.status <=0) {
				alert(json.message);
				return false;
			}
			
			json = json.message;
			var typeslects = json.typeselect1 + json.typeselect2 + json.typeselect3 + json.typeselect4;
			$('#typeselect').html(typeslects);
		});
	});
	

	

}
</script>

