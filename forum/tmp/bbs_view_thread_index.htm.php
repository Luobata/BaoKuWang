<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?><!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="<?php echo isset($_seo_keywords) ? $_seo_keywords : '';?>" />
	<meta name="description" content="<?php echo isset($_seo_description) ? $_seo_description : '';?> " />
	<meta name="generator" content="Xiuno BBS" />
	<meta name="author" content="Xiuno Team" />
	<meta name="copyright" content="2008-2012 xiuno.com" />
	<meta name="MSSmartTagsPreventParsing" content="True" />
	<meta http-equiv="MSThemeCompatible" content="Yes" />
	<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
	
	<link href="http://localhost/forum/view/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/forum/view/css/common-us.css"></link>
    <link rel="stylesheet" type="text/css" href=".view/css/index.css"></link>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	
	<script type="text/javascript">
	var cookie_pre = '<?php echo isset($conf['cookie_pre']) ? $conf['cookie_pre'] : '';?>';
	var g_uid = <?php echo isset($_user['uid']) ? $_user['uid'] : '';?>;
	</script>
	<title><?php if(!empty($_title)) { foreach($_title as &$title) {?><?php echo isset($title) ? $title : '';?> <?php }} ?></title>
</head>
<body>


<header>
	<script type="text/javascript"> 
     window.onload = function(){
           //ScrollImgLeft();
        }
    function ScrollImgLeft(){ 
    var speed=50; 
    var scroll_begin = document.getElementById("scroll_begin"); 
    var scroll_end = document.getElementById("scroll_end"); 
    var scroll_div = document.getElementById("scroll_div"); 
    if(scroll_div.offsetWidth>scroll_begin.offsetWidth){
        var tempString = scroll_begin.innerHTML;
        for(var i=0;i<(scroll_div.offsetWidth/scroll_begin.offsetWidth+3);i++){
              scroll_begin.innerHTML += tempString;
            }
    }
    scroll_end.innerHTML=scroll_begin.innerHTML; 
    function Marquee(){ 
    if(scroll_end.offsetWidth-scroll_div.scrollLeft<=0) 
    scroll_div.scrollLeft-=scroll_begin.offsetWidth; 
    else 
    scroll_div.scrollLeft++; 
    } 
    var MyMar=setInterval(Marquee,speed); 
    scroll_div.onmouseover=function() {clearInterval(MyMar);} 
    scroll_div.onmouseout=function() {MyMar=setInterval(Marquee,speed);} 

    } 

</script> 
<!-- <div id="gongao"> 
<img src="/catalog/view/theme/default/image/baoku/sound.png">
<div style="width:100%;height:30px;margin:0 auto;white-space: nowrap;overflow:hidden;left: 28px;
position: relative;" id="scroll_div" class="scroll_div"> 
<div id="scroll_begin"> 
眯眼工作室
</div> 
<div id="scroll_end"></div> 
</div> 
</div>  -->

<!-- <?php var_dump($product_id);?>-->
		<div class="head">

					
            <div class="logo">
                <a href="/">
                    <img style="width:100%;<!-- height:100%; -->border:0;"src="<?php echo isset($conf['logo_url']) ? $conf['logo_url'] : '';?>" title="<?php echo isset($name) ? $name : '';?>" alt="<?php echo isset($name) ? $name : '';?>" />
                </a>
            </div>
           
			<!-- <div class="logo">
				
			</div> -->

			<div class="search">
				<!-- <form>
					<input type="text" class="text">
					<a type="button" class="buttons" value="搜 索" href="javascript:void(0)" role="button"><span>搜 索</span></a>
<div class="buttons">
    搜索
</div>
				</form> -->
				<form action="/forum/" method="get" enctype="multipart/form-data" id="s_search">
                    <select class="search_sel">
                        <option>论坛</option>
                        <option>商城</option>
                        <option>序列号</option>
                    </select>

                    <input type="hidden" name="route" class="route" value="product/list"/>
                    <input type="text" name="search" class="text" value="<?php echo isset($keyword) ? $keyword : '';?>" />
                    <a type="submit" class="button button-search" value="搜索" style="display:none;" href="javascript:void(0)" role="button"><span>搜索</span></a>
                    <div class="buttons" onclick="submit">搜&nbsp;索</div>

                </form>
				<div class="hot">
                    <p><a>热门宝贝&nbsp;:</a></p>
                    <p><a href="/index.php?route=product/list&search=钻石">钻石</a></p>
                    <p><a href="/index.php?route=product/list&search=字画">字画</a></p>
                    <p><a href="/index.php?route=product/list&search=瓷器">瓷器</a></p>
                    <p><a href="/index.php?route=product/list&search=玛瑙">玛瑙</a></p>
                    <p><a href="/index.php?route=product/list&search=珍珠">珍珠</a></p>
                </div>
			</div>


            <?php if(($_user['uid']==0)) { ?>
                <div class="login" style="margin-left: 35px; margin-top: 40px;">
                    <a href="/index.php?route=account/login">登录</a>
                    <a href="/index.php?route=account/register">注册</a>
                </div>
            <?php } else { ?>
                <div class="login" style="margin-left: 15px; margin-top: 33px;">
                    <a href="javascript:void(0)" style="position:relative;bottom:7px;">你好！<?php echo $_user['username'];?></a><br/>
                    <a href="/index.php?route=account/account">个人中心</a>
                    <a href="/index.php?route=account/logout">退出</a>
                </div>
            <?php } ?>


			<div class="qbcode">
				
			</div>
		</div>	
	</header>
					
					 
					  

	<div class="title">
			<div class="index">
				<div class="all">
					<li><a href="">全部宝贝分类</a></li>
					<div class="content_head" style="position:absolute;z-index:100;display:none;">
                    <?php if(!empty($product_id)) { foreach($product_id as &$cat) {?>
                    <div class="goods">
                        <div class="goods_line">
                            <a href="index.php?route=product/list&filter_category=<?php echo $cat['parent']['id']; ?>">
                            <li><?php echo $cat['parent']['name']; ?></li></a>
                        </div>
                        <div class="item" id="item">
                        <?php if(sizeof($cat['children']!=0)) { ?>
                            <?php if(!empty($cat['children'])) { foreach($cat['children'] as &$cats) {?>
                            <div class="goods">
                                <div class="goods_line">
                                    <a href="index.php?route=product/list&filter_category=<?php echo $cats['id']; ?>">
                                    <li><?php echo $cats['name']; ?></li></a>
                                </div>
                            </div>    
                            <?php }} ?>
                        <?php } ?>
                        </div>
                    </div>
                        
                    <?php }} ?>
                </div>
					
					
				</div>
				<div class="others">
                <ul class="nav">
                    <li class="text"><a href="/index.php?route=common/home">首页</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="/index.php?route=product/list">我要寻宝</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="/index.php?route=account/new">我要寄卖</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="/index.php?route=product/identify">我要鉴定</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="/index.php?route=product/valuation">我要估值</a></li>

                    <li class="text" style="background-color: #421;"><a href="/forum">宝库社区</a></li>

                    <li class="text"><a href="javascript:void(0)">宝库自营</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="javascript:void(0)">限时特卖</a></li>
                    <img src="/catalog/view/theme/default/image/baoku/qidai.png">
                </ul>
            </div>
						
					</ul>
				</div>
			</div>
	</div>
<!-- head--> 
        
        

<div id="wrapper1">
	
	<div id="wrapper2">
		
<!--		<div id="menu" role="navigation">
			<div class="width">
				<table cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
					<tr>
						<td class="left"></td>
						<td class="logo"><a href="<?php echo isset($conf['logo_url']) ? $conf['logo_url'] : '';?>" title="<?php echo isset($conf['app_name']) ? $conf['app_name'] : '';?>"><span id="logo"></span></a></td>
						<td class="center">
							
							<span class="sep"></span>
							<a href="./" <?php echo isset($_checked['index']) ? $_checked['index'] : '';?>>首页</a>
							
							<?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
							<span class="sep"></span>
							<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>	
							<?php }}?>
							
						</td>
						<td class="center2">
							
							<?php if($conf['search_type']) { ?>
							<form action="http://localhost/forum/?search-index.htm" target="_blank" id="search_form" method="post">
								<div id="search"><input type="text" id="search_keyword" name="keyword" x-webkit-speech lang="zh-CN" /></div>
								
							</form>
							<?php } ?>
							
						</td>
						<td class="right"></td>
					</tr>
				</table>
			</div>
		</div>-->
							
		
		
		<div id="body" role="main">
		
		



<div class="width">

	
	<table id="nav" cellpadding="0" cellspacing="0" style="margin-bottom: 4px;">
		<tr>
			<td class="left"></td>
			<td class="center" style="white-space:nowrap; overflow: hidden;">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				
				<span><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-1.htm" id="forum_link"><?php echo isset($forum['name']) ? $forum['name'] : '';?></a></span>
				<span class="sep"></span>
				
				<span><a href="http://localhost/forum/?thread-index-fid-<?php echo isset($fid) ? $fid : '';?>-tid-<?php echo isset($tid) ? $tid : '';?>.htm"><?php echo isset($thread['subject_substr']) ? $thread['subject_substr'] : '';?></a></span>
				
			</td>
			<td class="center2">
								<span id="user">
					
				<?php if($_user['groupid'] == 0) { ?>
					
					<!--
					<a href="http://localhost/forum/?user-login.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-user"></span> 登录</a>
					<a href="http://localhost/forum/?user-create.htm" class="ajaxdialog" onclick="return false" rel="nofollow"><span class="icon icon-user-create"></span> 注册</a>
					-->

				<?php } else { ?>
					
					<a style="display: none;" href="http://localhost/forum/?my-profile.htm" title="<?php echo isset($_user['groupname']) ? $_user['groupname'] : '';?>"><!--<span class="icon icon-user-user"></span>-->设置<!--<?php echo isset($_user['username']) ? $_user['username'] : '';?>--></a>
					
					<?php if($_user['groupid'] == 6) { ?>
					<a href="http://localhost/forum/?user-reactive.htm">邮箱激活</a>
					<?php } ?>
					
					<span id="pm">
                        <a href="http://localhost/forum/?my-post.htm" class="pm"><!--<span class="icon icon-pm"></span>-->我的发帖</a>
                        <a href="http://localhost/forum/?my-profile.htm" class="pm"><!--<span class="icon icon-pm"></span>-->设置</a>
						<a href="http://localhost/forum/?my-pm.htm" class="pm"><span class="icon icon-pm"></span>&nbsp;消息</a>
                        <a href="http://localhost/forum/?my-pm.htm" style="display: none;" aria-label="消息" class="newpm"><span class="icon icon-newpm"></span> 消息</a>
					</span>
				
					<?php if($_user['groupid'] > 0 && $_user['groupid'] < 6) { ?>
					<a href="admin/" target="_blank"><span class="icon icon-setting"></span> 管理</a>
					<?php } ?>
					
					<!--
					<a href="http://localhost/forum/?user-logout.htm" class="ajaxdialog" onclick="return false"><span class="icon icon-user-logout"></span> 退出</a>
					-->

				<?php } ?>
					
				</span>
				<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread" rel="nofollow"><span class="icon icon-post-newthread"></span> 发新帖</a>
			</td>
			<td class="right"></td>
		</tr>
	</table>
	
	
	
	<?php if(!empty($postlist)) { foreach($postlist as &$post) {?>
	<?php $u = isset($userlist[$post['uid']]) ? $userlist[$post['uid']] : array();?>
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" class="post_table">
		<tr>
			<td width="70" valign="top">
				<div>
					<a href_real="http://localhost/forum/?you-index-uid-<?php echo isset($u['uid']) ? $u['uid'] : '';?>.htm" target="_blank" href="http://localhost/forum/?you-profile-uid-<?php echo isset($u['uid']) ? $u['uid'] : '';?>-ajax-1.htm" class="ajaxdialog_hover" ajaxdialog="{position: 5, modal: false, timeout: 1000, showtitle: false}" onclick="return false;" style="display: block" rel="nofollow" aria-label="<?php echo isset($u['username']) ? $u['username'] : '';?> <?php echo isset($post['floor']) ? $post['floor'] : '';?>楼">
						<span class="avatar_middle border bg1" <?php if(!empty($u['avatar_middle'])) { ?>style="background-image: url(<?php echo isset($u['avatar_middle']) ? $u['avatar_middle'] : '';?>)"<?php } ?>></span>
					</a>
				</div>
				<div style="word-break:break-all;"><?php echo isset($u['username']) ? $u['username'] : '';?></div>
				
			</td>
			<td width="15"></td>
			<td class="post_td" valign="top">
				<span class="icon icon-left-arrow" style="position: absolute; z-index: 9; float: left; margin-left: -9px; margin-top: 10px;"></span>
				<div class="bg1 border post">
				
					
					
					<?php if($thread['firstpid'] == $post['pid']) { ?>
					<h2 id="subject_<?php echo isset($tid) ? $tid : '';?>">
					
						<?php if($thread['top']) { ?><span class="icon icon-top-<?php echo isset($thread['top']) ? $thread['top'] : '';?>" style="margin-right: 2px;" title="置顶主题"></span><?php } ?>
									
					<?php if(!empty($forum['types'])) { foreach($forum['types'] as $cateid=>&$types) {?>
						<?php if($cateid == 1 && $thread['typeid1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" target="_blank" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
						<?php if($cateid == 2 && $thread['typeid2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" target="_blank" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
						<?php if($cateid == 3 && $thread['typeid3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" target="_blank" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
						<?php if($cateid == 4 && $thread['typeid4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" target="_blank" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
					<?php }}?>
					
						<?php echo isset($thread['subject']) ? $thread['subject'] : '';?>
						
						
					</h2>
					<?php } ?>
					
					
					
					<div id="message_<?php echo isset($post['pid']) ? $post['pid'] : '';?>" class="message"><?php echo isset($post['message']) ? $post['message'] : '';?></div>
					
					
					
					<?php if(!empty($post['attachlist'])) { ?>
					<br />
					<div class="attachlist">
						<table width="100%" cellpadding="2" class="noborder">
							<tr>
								<td class="bold"><span class="red" style="font-size: 18px"><?php echo isset($post['attachnum']) ? $post['attachnum'] : '';?> </span>个附件</td>
								<td width="70" class="grey">售价</td>
								<td width="70" class="grey">大小</td>
								<td width="70" class="grey">下载</td>
								<td width="70" class="grey">时间</td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php if(!empty($post['attachlist'])) { foreach($post['attachlist'] as &$attach) {?>
							<tr>
								<td>
									<a href="http://localhost/forum/?attach-dialog-fid-<?php echo isset($fid) ? $fid : '';?>-aid-<?php echo isset($attach['aid']) ? $attach['aid'] : '';?>-ajax-1.htm" class="ajaxdialog" ajaxdialog="{showtitle: false, cache: true, position: 6, modal: false}" onclick="return false;" target="_blank" rel="nofollow"><img src="http://localhost/forum/view/image/filetype/<?php echo isset($attach['filetype']) ? $attach['filetype'] : '';?>.gif" width="16" height="16" /><?php echo isset($attach['orgfilename']) ? $attach['orgfilename'] : '';?></a>
								</td>
								<td class="red"><?php echo isset($attach['golds']) ? $attach['golds'] : '';?> 金币</td>
								<td class="grey"><?php echo isset($attach['filesize_fmt']) ? $attach['filesize_fmt'] : '';?></td>
								<td><?php echo isset($attach['downloads']) ? $attach['downloads'] : '';?> 次</td>
								<td class="grey"><?php echo isset($attach['dateline_fmt']) ? $attach['dateline_fmt'] : '';?></td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php }} ?>
						</table>
					</div>
					<?php } ?>
					
					<?php if($ismod && $thread['firstpid'] == $post['pid'] && $thread['modnum'] > 0) { ?>
					<br />
					<div class="modlist">
						<table width="100%" cellpadding="2" class="noborder">
							<tr>
								<td width="100" class="bold"><span class="red" style="font-size: 18px"><?php echo isset($thread['modnum']) ? $thread['modnum'] : '';?> </span>条管理记录</td>
								<td width="50" class="grey">操作</td>
								<td width="50" class="grey">积分</td>
								<td width="50" class="grey">金币</td>
								<td class="grey">备注</td>
								<td width="70" class="grey">时间</td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php if(!empty($modlist)) { foreach($modlist as &$mod) {?>
							<tr>
								<td>
									<a href_real="http://localhost/forum/?you-index-uid-<?php echo isset($mod['user']['uid']) ? $mod['user']['uid'] : '';?>.htm" target="_blank" href="http://localhost/forum/?you-profile-uid-<?php echo isset($mod['user']['uid']) ? $mod['user']['uid'] : '';?>-ajax-1.htm" class="ajaxdialog" ajaxdialog="{position: 5, modal: false, timeout: 1000, showtitle: false}" onclick="return false;" style="display: block" rel="nofollow">
										<span class="avatar_small bg1" <?php if($mod['user']['avatar_small']) { ?>style="background-image: url(<?php echo isset($mod['user']['avatar_small']) ? $mod['user']['avatar_small'] : '';?>)"<?php } ?>></span>
										<span><?php echo isset($mod['user']['username']) ? $mod['user']['username'] : '';?></span>
									</a>
								</td>
								<td class="grey"><?php echo isset($mod['action_fmt']) ? $mod['action_fmt'] : '';?></td>
								<td><?php echo isset($mod['credits_fmt']) ? $mod['credits_fmt'] : '';?></td>
								<td class="red"><?php echo isset($mod['golds_fmt']) ? $mod['golds_fmt'] : '';?></td>
								<td class="grey"><?php echo isset($mod['comment']) ? $mod['comment'] : '';?></td>
								<td class="grey"><?php echo isset($mod['dateline_fmt']) ? $mod['dateline_fmt'] : '';?></td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php }} ?>
						</table>
					</div>
					<?php } ?>
					
					<?php if($post['rates'] > 0) { ?>
					<br />
					<div class="ratelist">
						<table width="100%" cellpadding="2" class="noborder">
							<tr>
								<td width="100" class="bold"><span class="red" style="font-size: 18px"><?php echo isset($post['rates']) ? $post['rates'] : '';?> </span>条评分记录</td>
								<td width="50" class="grey">操作</td>
								<td width="50" class="grey">积分</td>
								<td width="50" class="grey">金币</td>
								<td class="grey">点评</td>
								<td width="70" class="grey">时间</td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php if(!empty($post['ratelist'])) { foreach($post['ratelist'] as &$rate) {?>
							<tr>
								<td>
									<a href_real="http://localhost/forum/?you-index-uid-<?php echo isset($rate['user']['uid']) ? $rate['user']['uid'] : '';?>.htm" target="_blank" href="http://localhost/forum/?you-profile-uid-<?php echo isset($rate['user']['uid']) ? $rate['user']['uid'] : '';?>-ajax-1.htm" class="ajaxdialog" ajaxdialog="{position: 5, modal: false, timeout: 1000, showtitle: false}" onclick="return false;" style="display: block" rel="nofollow">
										<span class="avatar_small bg1" <?php if($rate['user']['avatar_small']) { ?>style="background-image: url(<?php echo isset($rate['user']['avatar_small']) ? $rate['user']['avatar_small'] : '';?>)"<?php } ?>></span>
										<span class=""><?php echo isset($rate['user']['username']) ? $rate['user']['username'] : '';?></span>
									</a>
								</td>
								<td class="grey">评分</td>
								<td><?php echo isset($rate['credits_fmt']) ? $rate['credits_fmt'] : '';?></td>
								<td class="red"><?php echo isset($rate['golds_fmt']) ? $rate['golds_fmt'] : '';?></td>
								<td class="grey"><?php echo isset($rate['comment']) ? $rate['comment'] : '';?></td>
								<td class="grey"><?php echo isset($rate['dateline_fmt']) ? $rate['dateline_fmt'] : '';?></td>
							</tr>
							<tr><td colspan="6"><hr /></td></tr>
							<?php }} ?>
						</table>
					</div>
					<?php } ?>
					
					
					
					<div class="grey mod" pid="<?php echo isset($post['pid']) ? $post['pid'] : '';?>" style="zoom: 1;">
						<div>
							<?php if($thread['firstpid'] != $post['pid']) { ?>
							<span style="width: 150px; float: left; text-align: left;" class="small"><?php echo isset($post['dateline_fmt']) ? $post['dateline_fmt'] : '';?></span>
							<?php } ?>
							
							<?php if($_user['uid']) { ?>
							<a href="http://localhost/forum/?post-post-fid-<?php echo isset($fid) ? $fid : '';?>-tid-<?php echo isset($post['tid']) ? $post['tid'] : '';?>-pid-<?php echo isset($post['pid']) ? $post['pid'] : '';?>.htm" class="ajaxdialog" ajaxdialog="{cache: true}" onclick="return false;">引用</a>
							<?php } ?>
							
							<?php if($ismod) { ?>	
							<a href="http://localhost/forum/?mod-rate-fid-<?php echo isset($fid) ? $fid : '';?>-pid-<?php echo isset($post['pid']) ? $post['pid'] : '';?>.htm" class="ajaxdialog" ajaxdialog="{position: 1, modal: false, cache: false}">评分</a>
							<?php } ?>
							
							<?php if($ismod || $_user['uid'] == $post['uid']) { ?>	
							<a href="http://localhost/forum/?post-update-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-pid-<?php echo isset($post['pid']) ? $post['pid'] : '';?>-ajax-1.htm" class="ajaxdialog" ajaxdialog="{modal: false, cache: false}" onclick="return false;">编辑</a>
							<a href="http://localhost/forum/?post-delete-fid-<?php echo isset($fid) ? $fid : '';?>-pid-<?php echo isset($post['pid']) ? $post['pid'] : '';?>.htm" class="ajaxconfirm" ajaxconfirm="{message: '确定删除吗？'}" onclick="return false;">删除</a>
							<?php } ?>
							
							#<?php echo isset($post['floor']) ? $post['floor'] : '';?>楼
						</div>
					</div>
				</div>
			</td>
		</tr>
		<?php if($thread['firstpid'] == $post['pid']) { ?>
		<tr>
			<td></td>
			<td></td>
			<td>
				<div class="bg2 border" style="margin-top: 1px; padding: 8px;">
					<span class="grey">发帖时间：</span><b><?php echo isset($post['dateline_fmt']) ? $post['dateline_fmt'] : '';?></b> &nbsp; <span class="grey2">|</span> &nbsp; 
					<span class="grey">查看数：</span><span id="thread_views" class="bold"><?php echo isset($thread['views']) ? $thread['views'] : '';?></span> &nbsp; <span class="grey2">|</span> &nbsp; 
					<span class="grey">回复数：</span><b><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?></b>
				</div>
			</td>
		</tr>
		<?php } ?>
	</table>
	
	<?php }} ?>
	
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top: 4px;" class="post_table">
		<tr>
			<td width="70" valign="top">
				<div>
					<?php if($_user['uid']) { ?><a href_real="http://localhost/forum/?you-index-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" href="http://localhost/forum/?you-profile-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>-ajax-1.htm" class="ajaxdialog_hover" ajaxdialog="{position: 5, modal: false, timeout: 1000, showtitle: false}" onclick="return false;" style="display: block" rel="nofollow"><?php } ?>
						<span class="avatar_middle border bg1" <?php if(!empty($_user['avatar_middle'])) { ?>style="background-image: url(<?php echo isset($_user['avatar_middle']) ? $_user['avatar_middle'] : '';?>)"<?php } ?>></span>
					<?php if($_user['uid']) { ?></a><?php } ?>
				</div>
				<div style="word-break:break-all;"><?php echo isset($_user['username']) ? $_user['username'] : '';?></div>
				<div class="grey small"><?php echo isset($_user['groupname']) ? $_user['groupname'] : '';?></div>
			</td>
			<td width="15"></td>
			<td class="post_td" valign="top">
				<span class="icon icon-left-arrow" style="position: absolute; z-index: 9; float: left; margin-left: -9px; margin-top: 10px;"></span>
				<div class="bg1 border shadow" style="padding: 8px;">
					<form action="http://localhost/forum/?post-post-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-ajax-1-quickpost-1.htm" method="post" id="quick_post_form" target="_blank">
						<input type="hidden" name="FORM_HASH" value="<?php echo FORM_HASH;?>" />
						
						<textarea name="message" id="quick_message" style="width: 100%; height: 60px; font-size: 14px; overflow: hidden;" aria-label="快速回复内容"></textarea>
						<div style="margin-top: 4px;">
							<div style="width: 50%; float: left;">
								<a type="submit" class="button smallblue" id="quick_post_submit" value="快速回复" href="javascript:void(0)" role="button"><span>快速回复</span></a>
								
							</div>
							<div style="width: 50%; float: left; text-align: right;">
								<a href="http://localhost/forum/?post-post-fid-<?php echo isset($fid) ? $fid : '';?>-tid-<?php echo isset($tid) ? $tid : '';?>-ajax-1.htm" class="grey ajaxdialog" ajaxdialog="{cache: true}" onclick="return false;" id="create_post" >高级回复</a>
							</div>
						</div>
					</form>
				</div>
			</td>
		</tr>
	</table>
	
	
	<div class="box">
		<div class="page" style="text-align: center;"><?php echo isset($pages) ? $pages : '';?></div>
		<?php if($ismod) { ?>
		<div style="text-align: center;">
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" checked="checked" style="display: none;" />
			<a type="button" class="button smallblue" id="mod_top" value="置顶" href="javascript:void(0)" role="button"><span>置顶</span></a>
			<?php if($forum['typecates']) { ?>
			<a type="button" class="button smallblue" id="mod_type" value="主题分类" href="javascript:void(0)" role="button"><span>主题分类</span></a>
			<?php } ?>
			<a type="button" class="button smallblue" id="mod_digest" value="精华" href="javascript:void(0)" role="button"><span>精华</span></a>
			<a type="button" class="button smallblue" id="mod_move" value="移动" href="javascript:void(0)" role="button"><span>移动</span></a>
			
			<a type="button" class="button smallblue" id="mod_delete" value="删除" href="javascript:void(0)" role="button"><span>删除</span></a>
			
		</div>
		<?php } ?>
		<p style="text-align: center; padding: 8px;">
			<?php if(!empty($referer_other)) { ?>
			<a type="button" value=" 返回上一页" class="button bigblue" onclick="window.location='<?php echo isset($referer_other) ? $referer_other : '';?>';return false;" href="javascript:void(0)" role="button"><span> 返回上一页</span></a>
			<?php } ?>
			<a type="button" value=" 返回【<?php echo isset($forum['name']) ? $forum['name'] : '';?>】" class="button bigblue" id="return_back" href="javascript:void(0)" role="button"><span> 返回【<?php echo isset($forum['name']) ? $forum['name'] : '';?>】</span></a>
		</p>
	</div>
	
	
	
</div>

		
		</div>
		
	</div>
	
</div>




<!-- <div id="footer" role="contentinfo">
	
	<table class="width">
		<tr>
			<td class="left">
				<?php echo isset($conf['app_copyright']) ? $conf['app_copyright'] : '';?><br />
				Powered by  <a href="http://bbs.xiuno.com" target="_blank" class="grey">Xiuno BBS <b><?php echo isset($conf['version']) ? $conf['version'] : '';?></b></a>
				
			</td>
			<td class="right">
				<?php echo isset($conf['china_icp']) ? $conf['china_icp'] : '';?><br />
				<?php echo isset($_SERVER['time_fmt']) ? $_SERVER['time_fmt'] : '';?>, 耗时:<?php echo number_format(microtime(1) - $_SERVER['starttime'], 4);?>s
				
			</td>
		</tr>
	</table>
	
</div>
 -->
	<!-- footer----------------------------------- -->

	<div class="footer">
		<div class="f_content">
			<div class="f_head">
				<div class="f_pic" id="f_pic_1"></div>
				<li><a href="/index.php?route=about/zheng/">正品保证</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_2"></div>
				<li><a href="/index.php?route=about/zheng/zhuanjia">专家评估</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_3"></div>
				<li><a href="/index.php?route=about/zheng/quanwei">权威保证</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_4"></div>
				<li><a href="/index.php?route=about/zheng/qitian">7天退货</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_5"></div>
				<li><a href="/index.php?route=about/zheng/wuxing">五星物流服务</a></li>
			</div>
		</div>
	</div>
	<div class="footer_2">
		<div class="f2_content">
			<div class="num">服务热线：010-64814142</div>
			<div class="f2_texts">
					<ul class="nav">
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/gouwu">购物流程</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/changjian">常见问题</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/liansuo">连锁查询</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/mianze">免责声明</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/tuihuo">退货说明</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="/index.php?route=about/zheng/guanyu">关于我们</a></li>
						
					</ul>
				</div>
		</div>

	</div>

<div style="width:150px;height:80px;position:fixed;top:230px;right:10px;border:1px solid #673413;">
    <div style="height: 31px;padding:3px 0 0 8px;background-color:#673413;color: white;font-size:19px;font-weight: bolder;">服务热线</div>
    <div style="padding:9px 0 0 4px;color:#673413;font-size:20px;font-weight:bolder;">010-64814142</div>
</div>


<?php if(DEBUG == 1 && $_user['groupid'] == 1 || DEBUG == 2) { ?>

<div class="box">
<h3>Debug Information: </h3>
<pre>

<b>Memory</b> = <?php echo memory_get_usage();?>

<b>Processtime</b> = <?php echo number_format(microtime(1) - $_SERVER['starttime'], 4);?>

<b>REQUEST_URI:</b> = <a href="<?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';?>" target="_blank" style="color: #888888"><?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';?></a>

<b>_GET</b> = <?php echo htmlspecialchars(print_r($_GET, 1));?>

<b>_POST</b> = <?php echo htmlspecialchars(print_r($_POST, 1));?>

<b>_COOKIE</b> = <?php echo htmlspecialchars(print_r($_COOKIE, 1));?>

<b>SQL:</b> = <?php isset($_SERVER['sqls']) && print_r($_SERVER['sqls']);?>

<?php if(DEBUG == 2) { ?>
<b>time:</b> = <?php echo isset($_SERVER['time']) ? $_SERVER['time'] : '';?><br />
<b>_user</b> = <?php print_r($_user);?>
<b>conf</b> = <?php unset($conf['db'], $conf['cache']);print_r($conf);?>
<?php } ?>

<b>include:</b> = <?php print_r(get_included_files());?>

</pre>
	
</div>

<?php } ?>

<?php if(DEBUG) { ?>
<script src="http://localhost/forum/view/js/jquery-1.4.full.js" type="text/javascript" ></script>
<?php } else { ?>
<script src="http://localhost/forum/view/js/jquery-1.4.min.js" type="text/javascript" ></script>
<?php } ?>
<script src="http://localhost/forum/view/js/baoku/common.js" type="text/javascript"></script>
<script src="http://localhost/forum/view/js/common.js" type="text/javascript"></script>

<script src="http://localhost/forum/view/js/dialog.js" type="text/javascript"></script>

<script type="text/javascript">

$('#search input').focus(function() {$('#search').addClass('hover');});
$('#search input').blur(function() {$('#search').removeClass('hover');});
$('#search input').keyup(function(e) {
	if(e.which == 13 || e.which == 10) {
		var val = encodeURIComponent($(this).val());
		$('#search_form').attr('action', 'http://localhost/forum/?search-index-keyword-'+val+'.htm');
		$('#search_form').submit();
		return false;
	}
});

// 登陆后才能发帖
$('#create_thread').click(function() {
	if(g_uid == 0) {
		window.location.href="/index.php?route=account/login";
		// ajaxdialog_request('http://localhost/forum/?user-login.htm', function() {
		// 	$('#create_thread').unbind('click');
		// 	ajaxdialog_request($('#create_thread').attr('href'));
		// 	$('#create_thread').click(function() {
		// 		ajaxdialog_request($('#create_thread').attr('href'));
		// 	});
		// }, {fullicon: 1});
		return false;
	} else {
		ajaxdialog_request($('#create_thread').attr('href'), null);
		return false;
	}
});

$('a.ajaxdialog, input.ajaxdialog').die('click').live('click', ajaxdialog_click);
$('a.ajaxtoggle').die('click').live('click', ajaxtoggle_event);

//$('div.list .table tr:odd').not('tr.header').addClass('odd');	/* 奇数行的背景色 */
//$('div.list .table tr:last').addClass('last');	/* 奇数行的背景色 */

<?php if($_user['uid']) { ?>
// ------------------------> 短消息 start
	
	function userlist_to_html(userlist) {
		var s = '<div id="pm_userlist">';
		for(k in userlist) {
			var user = userlist[k];
			s += '<a href="http://localhost/forum/?pm-ajaxlist-uid-'+user.uid+'-ajax-1.htm" uid="'+user.uid+'" class="ajaxdialog" ajaxdialog="{position: \'center\', modal: false, cache: false}"><span class="avatar_small" style="'+(user.avatar_small ? 'background-image: url('+user.avatar_small+')' : '')+'"></span> '+user.username+' (<b class="red">'+user.newpms+'</b>)</a>';
		}
		s += '</div>';
		return s;
	}
	
	// 如果有新短消息，除了全局提示以外，再做一个全局标记，实现模拟即时聊天。
	var g_newpm_userlist = null;	// 全局变量
	
	// 心跳频率  根据负载来调整，如果PV <10W: 1秒, <100w 2秒, <600w 3秒, 600w+, 5秒
	var g_newpm_delay = <?php echo isset($pm_delay) ? $pm_delay : '';?>;
	
	function newpm() {
		var _this = this;
		_this.delay = g_newpm_delay;
		_this.t = null;
		_this.stop = function() {
			if(_this.t) clearTimeout(_this.t);
		};
		_this.run = function() {
			_this.stop();
			_this.t = setTimeout(function() {
				//print_r('http://localhost/forum/?pm-new-ajax-1.htm');
				$.get('http://localhost/forum/?pm-new-ajax-1.htm', function(s) {
					var json = json_decode(s);
					if(error = json_error(json)) {return false;}
					// alert(error);
					
					if(json.status == 1) {
						

						
						var userlist = json.message;
						g_newpm_userlist = userlist;
						var s = userlist_to_html(userlist);
						$('#pm a.pm').hide();
						$('#pm a.newpm').show().unbind('mouseover').mouseover(function() {
							$('#pm a.newpm').alert(s, {"width": 150, "pos": 7, "delay": 1000, "alerticon": 0});
						});
						_this.delay = g_newpm_delay;
						_this.run();
					} else if(json.status == 2) {
						g_newpm_userlist = null;
						_this.delay = _this.delay * 2;
						_this.run();
					} else if(json.status == -1) {
						// 退出登录，什么都不做
					} else {
						// 发生错误，不提示，否则太频繁，影响用户体验。可以在后台查看PHP错误日志
						// alert(json.message);
					}
				});
			}, _this.delay);
		};
		return this;
	}
	
	
	var newpm_instance = new newpm(); 
	newpm_instance.run();
	
	<?php if(DEBUG == 2) { ?>
	//newpm_instance.stop();
	<?php } ?>
	// ----------------> 短消息 end
	
	// 鼠标放在上面，显示最后联系的5个人。

<?php } ?>

</script>

<?php echo isset($conf['footer_js']) ? $conf['footer_js'] : '';?>



<?php if($ismod) { ?>
<script type="text/javascript">
// copy from forum_index.htm
// 置顶 弹出 dialog 设置为置顶
$('#mod_top').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-top-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
});

// 主题分类 
$('#mod_type').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-type-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
});

// 精华
$('#mod_digest').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-digest-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
});

// 删除
$('#mod_delete').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-delete-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location = 'http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>.htm';
	});
});

// 移动
$('#mod_move').click(function() {
	var fid_tids = '';
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		fid_tids += (fid_tids ? '__' : '') + v.value;
	});
	if(fid_tids == '') {
		alert('请选择主题！');
		return false;
	}
	var url = url_add_arg('http://localhost/forum/?mod-move-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location = 'http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>.htm';
	});
});

</script>
<?php } ?>

<script type="text/javascript">

tid_add_read(<?php echo isset($tid) ? $tid : '';?>, <?php echo isset($_SERVER['time']) ? $_SERVER['time'] : '';?>);

$('#create_post').click(function() {
	if(g_uid == 0) {
		ajaxdialog_request('http://localhost/forum/?user-login.htm', function() {
			$('#create_post').unbind('click');
			ajaxdialog_request($('#create_post').attr('href'));
			$('#create_post').click(function() {
				ajaxdialog_request($('#create_post').attr('href'));
			});
		});
		return false;
	} else {
		return true;
	}
});

// 点击数服务器
$.getScript('<?php echo isset($click_server) ? $click_server : '';?>&'+Math.random(), function() {
	if(typeof xn_json == 'undefined') return;
	var json = xn_json;
	$('#thread_views').html(json['<?php echo isset($tid) ? $tid : '';?>']);
});

// 自动伸缩，自动提交
$('#quick_message').keyup(function(e) {
	if((e.ctrlKey && (e.which == 13 || e.which == 10)) || (e.altKey && e.which == 83)) {
		$('#quick_post_submit').trigger('click');
		return false;
	}
        
	var h = $(this)[0].scrollHeight;
	if(h <= 100) {
		return true;
	} else {
		$(this).height($(this)[0].scrollHeight);
		return true;
	}
});

// 快速回复
$('#quick_post_submit').click(function() {
	if(!$('#quick_message').val()) {
		$('#quick_message').alert('请填写内容！', {width: 150, delay: 3000}).focus();
		return false;
	}
	$('#quick_post_submit').disable();
	
	function quick_post_submit_func() {
		var postdata = $("#quick_post_form").serialize();
		$.post($('#quick_post_form').attr('action'), postdata,  function(s){
			var json = json_decode(s);
			if(error = json_error(json)) {alert(error); return false;}
			if(json.status <= 0) {
				alert(json.message);
				return false;
			} else {
				json = json.message;
				if(json.message) {
					$('#quick_message').alert(json.message, {width:250, delay: 3000}).focus();
					return false;
				}

				
				//var page = Math.max(1, intval(json.page));
				//window.location= 'http://localhost/forum/?thread-index-fid-<?php echo isset($fid) ? $fid : '';?>-tid-<?php echo isset($tid) ? $tid : '';?>-page-'+page+'-scrollbottom-1.htm';
				
				var post = json.post;
				// 结果直接显示在上面，不再跳转
				var s = '<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" class="post_table">\
					<tr>\
						<td width="70" valign="top">\
							<div>\
								<a href_real="http://localhost/forum/?you-index-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>.htm" target="_blank" href="http://localhost/forum/?you-profile-uid-<?php echo isset($_user['uid']) ? $_user['uid'] : '';?>-ajax-1.htm" class="ajaxdialog_hover" ajaxdialog="{position: 5, modal: false, timeout: 1000, showtitle: false}" onclick="return false;" style="display: block" rel="nofollow">\
									<span class="avatar_middle border bg1" <?php if(!empty($_user['avatar_middle'])) { ?>style="background-image: url(<?php echo isset($_user['avatar_middle']) ? $_user['avatar_middle'] : '';?>)"<?php } ?>></span>\
								</a>\
							</div>\
							<div style="word-break:break-all;" aria-label="'+post.username+' '+post.posts+'楼">'+post.username+'</div>\
						</td>\
						<td width="15"></td>\
						<td class="post_td" valign="top">\
							<span class="icon icon-left-arrow" style="position: absolute; z-index: 9; float: left; margin-left: -9px; margin-top: 10px;"></span>\
							<div class="bg1 border post">\
								<div id="message_'+post.pid+'" class="message">'+post.message+'</div>\
							</div>\
						</td>\
					</tr>\
				</table>';
				var jtable = $(s);
				$('table.post_table:last').before(jtable);
				//jtable.message = post.message;
				$('#quick_message').val('').focus();
				
				$('#quick_post_submit').enable();
			}
		});
	}

	if(g_uid == 0) {
		ajaxdialog_request('http://localhost/forum/?user-login.htm', function() {
			quick_post_submit_func();
			return false;
		});
	} else {
		quick_post_submit_func();
		return false;
	}
});

// 滚动回复的到最底部
<?php if($scrollbottom) { ?>
var offset = $('#quick_message').offset();
document.documentElement.scrollTop = offset.top - 300;
$('#quick_message').focus();
<?php } ?>

// 记录当前页码
var fid_page = $.parseJSON($.pdata(cookie_pre + 'fid_page'));
var page = fid_page ? fid_page[''+<?php echo isset($fid) ? $fid : '';?>] : 1;
var href = $('#forum_link').attr('href').replace(/page-1/ig, "page-"+page);
$('#forum_link').attr('href', href);
$('#return_back').click(function() {
	window.location = href;
});

// 鼠标放在头像上弹出用户信息 ajaxdialog_hover
var jajaxdialoglinks = $('a.ajaxdialog_hover');
jajaxdialoglinks.die('click').live('click', function() {window.open($(this).attr('href_real'))});
jajaxdialoglinks.die('mouseover').live('mouseover', ajaxdialog_mouseover);
jajaxdialoglinks.die('mouseout').live('mouseout', ajaxdialog_mouseout);
$('a.ajaxconfirm').die('click').live('click', ajaxdialog_confirm);

// post_td 下的图片调整大小
$(function() {
	var td_width = $('td.post_td').width() - 28;
	td_width = Math.min($('#body').width() - 170, td_width);
	$('td.post_td img').each(function() {
		if($(this).width() > td_width) {
			this.height = Math.ceil((this.height /this.width) * td_width);
			this.width = Math.ceil(td_width);
			
			this.style.cursor = 'pointer';
			this.onclick = function() {
				window.open(this.src);
			}
		}
	});
});

// 快捷键翻页
bind_document_keyup_page();
$('div.post').each(function(i) {
	var _this = this;
	$(_this).hover(
		function() {
			$(_this).find('div.mod div').show().css('opacity', 0).stop().animate({opacity:1}, 500);
		},
		function() {
			$(_this).find('div.mod div').animate({opacity:0}, 500);
		}
	)
});
</script>



</body>

</html>