<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!--{json width:"700",height:600,title:"与 <?php echo isset($touser['username']) ? $touser['username'] : '';?> 对话"}-->

<div id="pmlist_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>" class="border" style="padding: 4px; overflow: auto;"></div>
<div class="page" id="pmlist_page_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>"></div>

<?php if($touser['uid'] != 2) { ?>
<div>
	<form action="http://localhost/forum/?pm-create-touid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm" method="post" id="pm_add_form_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>">
		<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
		<div><textarea name="message" class="message" style="width: 664px; height: 52px;"></textarea></div>
		<div style="margin-top: 4px;">
			<div style="width: 180px; float: right; text-align: right;"><a href="http://localhost/forum/?pm-truncate-touid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm" id="truncatepm" onclick="return false;">清空对话记录</a></div>
			<div style="width: 180px; float: left;">
				<a type="submit" class="button smallblue submit" value="发送" href="javascript:void(0)" role="button"><span>发送</span></a>
				<a type="button" class="button smallgrey cancel" value="关闭" href="javascript:void(0)" role="button"><span>关闭</span></a>
			</div>
		</div>
	</form>
</div>
<?php } else { ?>
<div>
	<form action="http://localhost/forum/?pm-create-touid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm" method="post" id="pm_add_form_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>">
		<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
		<div><textarea name="message" class="message" style="width: 564px; height: 60px;" disabled="disabled">不能回复给系统用户</textarea></div>
		<div style="margin-top: 4px;">
			<div style="width: 180px; float: right; text-align: right;"><a href="http://localhost/forum/?pm-truncate-touid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm" id="truncatepm" onclick="return false;">清空对话记录</a></div>
			<div style="width: 180px; float: left;">
				<a type="button" class="button smallgrey cancel" value="关闭" href="javascript:void(0)" role="button"><span>关闭</span></a>
			</div>
		</div>
	</form>
</div>
<?php } ?>

<script type="text/javascript">

// 延迟执行的脚本，约定名字为：delay_execute()
function delay_execute(dialog, recall) {
	// 获取对象
	var jform = $('#pm_add_form_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>');
	var jmessage = $('textarea.message', jform);
	var jsubmit = $('a.submit', jform);
	var jcancel = $('a.cancel', jform);
	var jpmlist = $('#pmlist_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>');
	var maxpmid = 1;
	var maxpage = 1;
	
	var _this = this;
	
	// 提交
	jsubmit.click(function() {
		if(!jmessage.val()) {
			jmessage.alert('请输入内容。', {width: 150, delay: 3000}).focus();
			return false;
		}
		jsubmit.disable();
		var postdata = jform.serialize();
		$.post(jform.attr('action'), postdata, function(s) {
			jsubmit.enable();
			var json = json_decode(s);
			
			// copy start
			if(error = json_error(json)) {alert(error); return false;}
			if(json.status == 1) {
				maxpmid = json.message.maxpmid;
				maxpage = json.message.maxpage;
				var s = json.message.body;
				
				$(s).appendTo(jpmlist);
				
				// 滚屏
				jmessage.val('').focus();
				jpmlist.attr('scrollTop', jpmlist.height());
				
				if(g_newpm_userlist && g_newpm_userlist[k])delete g_newpm_userlist[k];
			} else {
				alert(json.message);
				g_newpm_userlist = null;
			}
			if(!g_newpm_userlist) {
				$('#pm a.pm').show();
				$('#pm a.newpm').hide()
			}		
			// copy end
		});
	});
	
	// 快捷提交
	jmessage.keyup(function(e) {
		if((e.ctrlKey && (e.which == 13 || e.which == 10)) || (e.altKey && e.which == 83)) {
			jsubmit.trigger('click');
			return false;
		}
	});

	// 关闭层
	jcancel.click(function() {
		dialog.close();
	});
	
	/*
	// 自动调整高度
	var jmessage_height = jmessage.height();
	var jpmlist_height = jpmlist.height();
	jmessage.focus(function() {jmessage.height(jmessage_height + 60); jpmlist.height(jpmlist_height - 60);});
	jmessage.blur(function() {jmessage.height(jmessage_height - 60); jpmlist.height(jpmlist_height + 60);});
	*/
	
	var window_height = $(window).height() - 20;
	dialog.set_height(window_height - 35);
	dialog.set_position('center');
	var subheight = is_ie6 ? 280 : 215;
	jpmlist.height(window_height - subheight);
	
	// 给 page 区域追加事件
	pages_add_event('http://localhost/forum/?pm-ajaxlistbody-uid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm', <?php echo isset($totalpage) ? $totalpage : '';?>, <?php echo isset($page) ? $page : '';?>, $('#pmlist_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>'), $('#pmlist_page_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>'));
	
	// 初始化为最后一页的数据，可以取到 maxpmid, maxpage
	$.get('http://localhost/forum/?pm-ajaxlistbody-uid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-ajax-1.htm', function(s) {
		var json = json_decode(s);
		if(error = json_error(json)) {alert(error); return false;}
		
		maxpmid = json.message.maxpmid;
		//alert('Line 101 : ' + maxpmid);
		maxpage = json.message.maxpage;
		$('#pmlist_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>').html(json.message.body);
		
		jmessage.val('').focus();
		jpmlist.attr('scrollTop', jpmlist.height());
		return false;
	});
	
	// ajax page
	$('#pmlist_page_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?> a').click(function() {
		var href = $(this).attr('href');
		var arr = xn_parse_url(href);
		var page = arr['page'];
		$.get(href, function(s) {
			$('#pmlist_td_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>').html(s);
		});
		return false;
	});
	
	// 删除按钮
	$('table', jpmlist).die('mouseover').live('mouseover', function() {$('a.icon-delete', this).show();});
	$('table', jpmlist).die('mouseout').live('mouseout', function() {$('a.icon-delete', this).hide();});
	
	// 删除记录
	$('a.icon-delete', jpmlist).die('click').live('click', function() {
		if(window.confirm('您确定删除吗？')) {
			var jlink = $(this);
			var href = jlink.attr('href');
			$.get(href, function(s) {
				var json = json_decode(s);
				if(error = json_error(json)) {alert(error); return false;}
				jlink.closest('div.pm_line').remove();
			});
		}
		return false;
	});

	// 如果对方在线，则启动实时聊天。此处优化了请求，避免了频繁请求。
	var touser_online = <?php echo isset($touser['isonline']) ? $touser['isonline'] : '';?>;
	if(touser_online) {
		
		if(_this.pmlist_handle) clearInterval(_this.pmlist_handle);	// _this.pmlist_handle 全局变量，用来存储计时器句柄。
		_this.pmlist_handle = setInterval(function() {
			// 全局变量 g_newpm_userlist
			//print_r(g_newpm_userlist);
			if(g_newpm_userlist) {
				for(var k in g_newpm_userlist) {
					var user = g_newpm_userlist[k];
					if(user.uid == <?php echo isset($touser['uid']) ? $touser['uid'] : '';?>) {
						$.get('http://localhost/forum/?pm-newlist-fromuid-<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>-maxpmid-'+maxpmid+'-maxpage-'+maxpage+'-ajax-1.htm', function(s) {
							var json = json_decode(s);
	
							// copy from line 53. start
							if(error = json_error(json)) {alert(error); return false;}
							if(json.status == 1) {
								maxpmid = json.message.maxpmid;
								//alert('Line 156 : ' + maxpmid);
								maxpage = json.message.maxpage;
								var s = json.message.body;
								if(s == '' || s == "\r\n") return;
								
								$(s).appendTo(jpmlist);
								// 滚屏
								//jmessage.val('').focus();
								jpmlist.attr('scrollTop', jpmlist.height());
								
								if(g_newpm_userlist && g_newpm_userlist[k])delete g_newpm_userlist[k];
								
							} else {
								g_newpm_userlist = null;
							}
							if(!g_newpm_userlist) {
								$('#pm a.pm').show();
								$('#pm a.newpm').hide();
								/*
								// 如果没有新消息，去除节点
								$('#pm_userlist a[uid=<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>]').remove();
								if($('#pm_userlist a').length == 0) {
									$('#pm_userlist').closest('div.alert').remove();
									$('#pm a.pm').show();
									$('#pm a.newpm').hide();
								}*/
							}
							// copy end.
						});
						
						g_newpm_userlist = null;
						newpm_instance.delay = 1000;	// 设置短消息定时器短一些，即时一些。 g_pm_delay 此处可以及时点。
						break;
					}
				}
			}
		}, 1000);
	}
	
	// 如果没有新消息，去除节点
	$('#pm_userlist a[uid=<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>]').remove();
	if($('#pm_userlist a').length == 0) {
		$('#pm_userlist').closest('div.alert').remove();
		$('#pm a.pm').show();
		$('#pm a.newpm').hide();
	}
	
	$('#truncatepm').click(function() {
		if(window.confirm('您确定清空对话记录吗？')) {
			var jlink = $(this);
			var href = jlink.attr('href');
			$.get(href, function(s) {
				var json = json_decode(s);
				if(error = json_error(json)) {alert(error); return false;}
				$('#pmlist_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>').html('对话记录已经清空！');
				$('#pmlist_page_<?php echo isset($touser['uid']) ? $touser['uid'] : '';?>').html('');
			});
		}
		return false;
	});
}

</script>