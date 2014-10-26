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
	<link rel="shortcut icon" href="favicon.ico" />
	
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
           ScrollImgLeft();
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
		<div class="head">

					
            <div class="logo">
                <a href="<?php echo isset($home) ? $home : '';?>">
                    <img style="width:100%;height:100%;border:0;"src="<?php echo isset($conf['logo_url']) ? $conf['logo_url'] : '';?>" title="<?php echo isset($name) ? $name : '';?>" alt="<?php echo isset($name) ? $name : '';?>" />
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
                <div class="login">
                    <p><a href="/index.php?route=account/login">登录</a></p>
                    <p><a href="/index.php?route=account/register">注册</a></p>
                </div>
            <?php } else { ?>
                <div class="login" style="margin-left: 15px;">
                    <p><a href="/index.php?route=account/account">个人中心</a></p>
                    <p><a href="/index.php?route=account/logout">退出</a></p>
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
                    <li class="line">|</li>
                    <li class="text"><a href="/forum">我要交流</a></li>
                    <li class="line">|</li>
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
			<td class="center">
				<a class="icon icon-home" href="./"></a>
				<span class="sep"></span>
				
				<span><?php echo isset($forum['name']) ? $forum['name'] : '';?></span>
				
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
						<a href="http://localhost/forum/?my-pm.htm" class="pm"><!--<span class="icon icon-pm"></span>-->联系人</a>
                        <a href="http://localhost/forum/?my-profile.htm" class="pm"><!--<span class="icon icon-pm"></span>-->设置</a>
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
				<!-- <a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread" rel="nofollow"><span class="icon icon-post-newthread"></span> 发新帖</a> -->
			</td>
			<td class="right"></td>
		</tr>
	</table>
         
<!-- 	<span class="sep"></span>
	<a href="./" <?php echo isset($_checked['index']) ? $_checked['index'] : '';?>>首页</a>
        
        <?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
        Test
	<span class="sep"></span>
	<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>	
          <?php }}?> -->
	
	
	
	<?php if(!empty($forum['types'])) { ?>
	<div class="tab" id="threadtype">
		<?php if(!empty($forum['types'])) { foreach($forum['types'] as $cateid=>&$types) {?>
		<?php if($types) { ?>
		<div>
			<table>
				<tr>
					<td valign="top" style="white-space: nowrap"><?php if(!empty($forum["typecates"]["$cateid"])) { ?><span class="grey"><?php echo isset($forum["typecates"]["$cateid"]) ? $forum["typecates"]["$cateid"] : '';?>：</span><?php } ?></td>
					<td>
					<?php if($cateid == 1) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-0-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部1</a><?php } ?>
					<?php if($cateid == 2) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-0-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部2</a><?php } ?>
					<?php if($cateid == 3) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-0-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部3</a><?php } ?>
					<?php if($cateid == 4) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-0.htm" <?php echo isset($_checked["typecates"]["$cateid"]) ? $_checked["typecates"]["$cateid"] : '';?> rel="nofollow" class="all">全部4</a><?php } ?>
					<?php if(!empty($types)) { foreach($types as $typeid=>&$typename) {?>
					<?php if($cateid == 1) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid) ? $typeid : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 5</a><?php } ?>
					<?php if($cateid == 2) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid) ? $typeid : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 6</a><?php } ?>
					<?php if($cateid == 3) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid) ? $typeid : '';?>-typeid4-<?php echo isset($typeid4) ? $typeid4 : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 7</a><?php } ?>
					<?php if($cateid == 4) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($typeid1) ? $typeid1 : '';?>-typeid2-<?php echo isset($typeid2) ? $typeid2 : '';?>-typeid3-<?php echo isset($typeid3) ? $typeid3 : '';?>-typeid4-<?php echo isset($typeid) ? $typeid : '';?>.htm" rel="nofollow" <?php echo isset($_checked["types"]["$typeid"]) ? $_checked["types"]["$typeid"] : '';?>><?php echo isset($typename) ? $typename : '';?> 8</a><?php } ?>
					<?php }}?>
					</td>
				</tr>
			</table>
		</div>
		<?php } ?>
		<?php }}?>
	</div>
	<?php } ?>
	
	  <link rel="stylesheet" href="http://localhost/forum/view/css/forum.css"></link>
<div class="page_content">
<div class="page_left">
	

<div class="div">
	
	<div class="header" style="font-weight: normal;">
		<table width="100%" cellspacing="0" cellpadding="0" style="word-break: break-all" >
			<tr align="left">
				<td valign="middle" class="subject indextitle">
				<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>.htm" rel="nofollow" <?php if(!core::gpc('digest')) { ?>class="grey"<?php } ?>>普通主题</a>  
					<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-digest-1.htm" rel="nofollow" <?php if(core::gpc('digest')) { ?>class="grey"<?php } ?>>精华主题</a>
					
					<?php if(!core::gpc('digest') && !core::gpc('typeid1') && !core::gpc('typeid2') && !core::gpc('typeid3') && !core::gpc('typeid4')) { ?>
					<span id="nav_orderby">
						<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-0  <?php echo isset($_checked['orderby'][0]) ? $_checked['orderby'][0] : '';?>" title="顶帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 8px;"></a><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($fid) ? $fid : '';?>-page-<?php echo isset($page) ? $page : '';?>.htm" class="icon icon-orderby-1  <?php echo isset($_checked['orderby'][1]) ? $_checked['orderby'][1] : '';?>" title="发帖时间排序" rel="nofollow" style="vertical-align: top; margin-left: 4px;"></a>
					</span>
					<?php } ?>
				<?php } else { ?>
					宝库论坛
				<?php } ?>
					
				</td>
				
				<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>
				<td width="80" class="username fatie">发帖</td>
				<td width="80" class="lastpost huitie">回帖</td>
				<td width="80" class="views chakan" align="center">回复/查看</td>
                
                
                
                <?php } else { ?>
                
				<td>
				<span class="grey today">今日：</span><span class="todayposts "><?php echo isset($conf['todayposts']) ? $conf['todayposts'] : '';?></span>
                                                                       
				<span class="grey today">主题：</span><span class="todayposts"><?php echo isset($conf['threads']) ? $conf['threads'] : '';?></span>
				
                 </td>
                 <?php } ?>                                                 
				
			</tr>
		</table>
	</div>
	<div class="body threadlist" id="threadlist">
	
		
		<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>

		<?php if(!empty($toplist)) { foreach($toplist as &$thread) {?>
			<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>


 <!--------------------- 替换整个table------------------------------------------------- -->
<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
			

			

			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			
 <!--------------------- --此处将原来的最新帖子替换为板块信息------------------------------------------------- -->                           
                        <a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?>&nbsp;</a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow">&nbsp;&nbsp;<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2">&nbsp;&nbsp;<?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />





<?php } else { ?>
	<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject blank_pic">
			
			<!--添加图片-->
			<img src="http://localhost/forum/view/image/blank_icon.png" class="blank_icon">
			
					
		</td>
		<td class="blan_name">
			<li>
				<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>
				<span class="my_Y">(<span class="my_Y"><?php echo isset($blank["$_fid"]["threads"]) ? $blank["$_fid"]["threads"] : '';?></span>)</span>
			</li>
			<li><span class="my_grey">版主:<span class="my_grey"><?php echo isset($blank["$_fid"]["modnames"]) ? $blank["$_fid"]["modnames"] : '';?></span></span></li>		
		</td>
		
		<td min-width="80" class="username">
			<li>
				<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($_fid) ? $_fid : '';?>-tid-<?php echo isset($blank["$_fid"]["lasttid"]) ? $blank["$_fid"]["lasttid"] : '';?>.htm" style="color:#b38b52"><?php echo isset($blank["$_fid"]["subject"]) ? $blank["$_fid"]["subject"] : '';?></a>
			</li>
			<li>
				<span class="my_grey"><?php echo isset($blank["$_fid"]["date"]) ? $blank["$_fid"]["date"] : '';?> <span class="my_grey"><?php echo isset($blank["$_fid"]["author"]) ? $blank["$_fid"]["author"] : '';?></span></span>
			</li>
		</td>
		<!-- <td width="80" class="lastpost">
			
		</td>
		<td width="80" class="views" align="center">
		</td> -->
		
	</tr>
</table>

<hr />
<?php } ?>




		<?php }} ?> 
		

		<!--如果是首页则展示板块，否则展示-->
		<?php } else { ?>
		<!--展示板块-->
		<?php if(!empty($conf['forumarr'])) { foreach($conf['forumarr'] as $_fid=>&$_name) {?>
			<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>


 <!--------------------- 替换整个table------------------------------------------------- -->
<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
			

			

			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			
 <!--------------------- --此处将原来的最新帖子替换为板块信息------------------------------------------------- -->                           
                        <a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?>&nbsp;</a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow">&nbsp;&nbsp;<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2">&nbsp;&nbsp;<?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />





<?php } else { ?>
	<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject blank_pic">
			
			<!--添加图片-->
			<img src="http://localhost/forum/view/image/blank_icon.png" class="blank_icon">
			
					
		</td>
		<td class="blan_name">
			<li>
				<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>
				<span class="my_Y">(<span class="my_Y"><?php echo isset($blank["$_fid"]["threads"]) ? $blank["$_fid"]["threads"] : '';?></span>)</span>
			</li>
			<li><span class="my_grey">版主:<span class="my_grey"><?php echo isset($blank["$_fid"]["modnames"]) ? $blank["$_fid"]["modnames"] : '';?></span></span></li>		
		</td>
		
		<td min-width="80" class="username">
			<li>
				<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($_fid) ? $_fid : '';?>-tid-<?php echo isset($blank["$_fid"]["lasttid"]) ? $blank["$_fid"]["lasttid"] : '';?>.htm" style="color:#b38b52"><?php echo isset($blank["$_fid"]["subject"]) ? $blank["$_fid"]["subject"] : '';?></a>
			</li>
			<li>
				<span class="my_grey"><?php echo isset($blank["$_fid"]["date"]) ? $blank["$_fid"]["date"] : '';?> <span class="my_grey"><?php echo isset($blank["$_fid"]["author"]) ? $blank["$_fid"]["author"] : '';?></span></span>
			</li>
		</td>
		<!-- <td width="80" class="lastpost">
			
		</td>
		<td width="80" class="views" align="center">
		</td> -->
		
	</tr>
</table>

<hr />
<?php } ?>




			
        <?php }}?>
		<?php } ?>	

		
		<?php if(!empty($toplist)) { ?>
		<div class="bg2" style="line-height: 12px; height: 12px;">
			<div style="width: 56px; float: left;" class="grey"></div>
		</div>
		<hr />
		<?php } ?>
		<!-- 这里好像有点问题-->
		<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>

		<?php if(!empty($threadlist)) { foreach($threadlist as &$thread) {?>
			<?php if(isset($keyword)?$fid||$keyword:$fid) { ?>


 <!--------------------- 替换整个table------------------------------------------------- -->
<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject">
			<?php if($fid && $ismod) { ?>
			<input type="checkbox" name="fid_tid[]" value="<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>_<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" />
			<?php } ?>
			

			

			
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" target="_blank" title="点击图标，新窗口打开" class="thread_icon" style="margin-right: 1px;" rel="nofollow"><span class="icon <?php echo isset($thread['icon']) ? $thread['icon'] : '';?>" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>"></span></a>
			
			
			<?php if(!$fid) { ?>
			<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>.htm" target="_blank" class="grey">【<?php echo isset($thread['forumname']) ? $thread['forumname'] : '';?>】</a>
			<?php } ?>
			
		<?php if(!empty($thread['forum_types'])) { foreach($thread['forum_types'] as $cateid=>&$types) {?>
			<?php if($cateid == 1 && $thread['typename1']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename1']) ? $thread['typename1'] : '';?>]</a><?php } ?>
			<?php if($cateid == 2 && $thread['typename2']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename2']) ? $thread['typename2'] : '';?>]</a><?php } ?>
			<?php if($cateid == 3 && $thread['typename3']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename3']) ? $thread['typename3'] : '';?>]</a><?php } ?>
			<?php if($cateid == 4 && $thread['typename4']) { ?><a href="http://localhost/forum/?forum-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>.htm" class="grey middle subject_type" rel="nofollow">[<?php echo isset($thread['typename4']) ? $thread['typename4'] : '';?>]</a><?php } ?>
		<?php }}?>
	
			
			
 <!--------------------- --此处将原来的最新帖子替换为板块信息------------------------------------------------- -->                           
                        <a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>.htm" class="subject_link <?php echo isset($thread['color']) ? $thread['color'] : '';?>"><?php echo isset($thread['subject']) ? $thread['subject'] : '';?></a>
			
			
			<?php if($thread['imagenum']) { ?><span class="icon icon-image" title="<?php echo isset($thread['imagenum']) ? $thread['imagenum'] : '';?>"></span><?php } ?><?php if($thread['attachnum']) { ?><span class="icon icon-attach" title="<?php echo isset($thread['attachnum']) ? $thread['attachnum'] : '';?>"></span><?php } ?>
			
			
			
			<?php if($thread['lastpage'] > 1) { ?>
			<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($thread['fid']) ? $thread['fid'] : '';?>-tid-<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>-page-<?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?>.htm" class="grey2 small"><span class="icon icon-lastpage"></span><?php echo isset($thread['lastpage']) ? $thread['lastpage'] : '';?></a>
			<?php } ?>
			
			
			
		</td>
		
		<td width="80" class="username">
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['uid']) ? $thread['uid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['username']) ? $thread['username'] : '';?>" rel="nofollow"><?php echo isset($thread['username']) ? $thread['username'] : '';?>&nbsp;</a></span>
			<br /><span class="small <?php if($thread['color'] == 'thread-new') { ?>new<?php } else { ?>grey2<?php } ?>"><?php echo isset($thread['dateline_fmt']) ? $thread['dateline_fmt'] : '';?></span>
		</td>
		<td width="80" class="lastpost">
			<?php if($thread['lastuid']) { ?>
			<span class="grey"><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($thread['lastuid']) ? $thread['lastuid'] : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" title="<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?>" rel="nofollow">&nbsp;&nbsp;<?php echo isset($thread['lastusername']) ? $thread['lastusername'] : '';?></a></span>
			<br /><span class="small grey2">&nbsp;&nbsp;<?php echo isset($thread['lastpost_fmt']) ? $thread['lastpost_fmt'] : '';?></span>
			<?php } ?>
		</td>
		<td width="80" class="views" align="center"><span class="small grey"><?php echo isset($thread['posts_fmt']) ? $thread['posts_fmt'] : '';?> / </span><span class="small grey views" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>"></span></td>
		
	</tr>
</table>

<hr />





<?php } else { ?>
	<table width="100%" cellspacing="0" cellpadding="0" tid="<?php echo isset($thread['tid']) ? $thread['tid'] : '';?>" class="thread" lastpost="<?php echo isset($thread['lastpost']) ? $thread['lastpost'] : '';?>" style="table-layout: fixed;">
	<tr height="32">
		<td valign="middle" class="subject blank_pic">
			
			<!--添加图片-->
			<img src="http://localhost/forum/view/image/blank_icon.png" class="blank_icon">
			
					
		</td>
		<td class="blan_name">
			<li>
				<a href="http://localhost/forum/?forum-index-fid-<?php echo isset($_fid) ? $_fid : '';?>.htm" <?php echo isset($_checked["forum_$_fid"]) ? $_checked["forum_$_fid"] : '';?>><?php echo isset($_name) ? $_name : '';?></a>
				<span class="my_Y">(<span class="my_Y"><?php echo isset($blank["$_fid"]["threads"]) ? $blank["$_fid"]["threads"] : '';?></span>)</span>
			</li>
			<li><span class="my_grey">版主:<span class="my_grey"><?php echo isset($blank["$_fid"]["modnames"]) ? $blank["$_fid"]["modnames"] : '';?></span></span></li>		
		</td>
		
		<td min-width="80" class="username">
			<li>
				<a href="http://localhost/forum/?thread-index-fid-<?php echo isset($_fid) ? $_fid : '';?>-tid-<?php echo isset($blank["$_fid"]["lasttid"]) ? $blank["$_fid"]["lasttid"] : '';?>.htm" style="color:#b38b52"><?php echo isset($blank["$_fid"]["subject"]) ? $blank["$_fid"]["subject"] : '';?></a>
			</li>
			<li>
				<span class="my_grey"><?php echo isset($blank["$_fid"]["date"]) ? $blank["$_fid"]["date"] : '';?> <span class="my_grey"><?php echo isset($blank["$_fid"]["author"]) ? $blank["$_fid"]["author"] : '';?></span></span>
			</li>
		</td>
		<!-- <td width="80" class="lastpost">
			
		</td>
		<td width="80" class="views" align="center">
		</td> -->
		
	</tr>
</table>

<hr />
<?php } ?>




		<?php }} ?>
		<?php } ?>
		
		
</div>
	</div>
	<!-- <div class="footer"></div> -->
	</div>
	<?php if(isset($keyword)) { ?>
	<div class="page_right" style="display:none">
		<?php } else { ?>
		<div class="page_right">
			<?php } ?>
		<?php if(!$fid) { ?>
		<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread"  rel="nofollow">
		<?php } else { ?>
		<a href="http://localhost/forum/?post-thread-fid-<?php echo isset($fid) ? $fid : '';?>-typeid1-<?php echo isset($thread['typeid1']) ? $thread['typeid1'] : '';?>-typeid2-<?php echo isset($thread['typeid2']) ? $thread['typeid2'] : '';?>-typeid3-<?php echo isset($thread['typeid3']) ? $thread['typeid3'] : '';?>-typeid4-<?php echo isset($thread['typeid4']) ? $thread['typeid4'] : '';?>-ajax-1.htm" target="_blank" onclick="return false;" id="create_thread" rel="nofollow">
			<?php } ?>
		<div class="newt">
			发布新话题
		</div>
		</a>
		<div class="recommand">
			<div class="rec">
				推荐
			</div>
			<div class="rec_content">
				<li class="fir">
					<a href="./?search-index-keyword-鉴定.htm"><span class="twotext left">鉴定</span></a>
					<a href="./?search-index-keyword-地下交易.htm"><span class="fourtext right">线下交易</span></a>
				</li>
				<li class="sec">
					<a href="./?search-index-keyword-古玩知识.htm"><span class="fourtext left">古玩知识</span></a>
					<a href="./?search-index-keyword-估值.htm"><span class="twotext right">估值</span></a>
				</li>
			</div>
		</div>
		
	</div>
</div>
<?php if(!empty($pages)) { ?>
<div class="page" style="margin: auto; margin-top: 8px; text-align: center; clear: both;"><?php echo isset($pages) ? $pages : '';?></div>
<?php } ?>


<?php if($fid && $ismod) { ?>
<div style="text-align: center; margin-top: 8px;width:715px;">
	<input type="checkbox" name="checkall" id="mod_checkall" /><label for="mod_checkall">全选</label>
	<a type="button" class="button smallblue" id="mod_top" value="置顶" href="javascript:void(0)" role="button"><span>置顶</span></a>
	<?php if(!empty($forum['typecates'])) { ?>
	<a type="button" class="button smallblue" id="mod_type" value="主题分类" href="javascript:void(0)" role="button"><span>主题分类</span></a>
	<?php } ?>
	<a type="button" class="button smallblue" id="mod_digest" value="精华" href="javascript:void(0)" role="button"><span>精华</span></a>
	<a type="button" class="button smallblue" id="mod_move" value="移动" href="javascript:void(0)" role="button"><span>移动</span></a>
	
	<a type="button" class="button smallblue" id="mod_delete" value="删除" href="javascript:void(0)" role="button"><span>删除</span></a>
	
</div>
<?php } ?>



	
	<?php if($page == 1) { ?>
	<!-- <div class="div" style="margin-top: 8px;">
		<div class="header">版块信息</div>
		<div class="body">
			<p>
				<span>
					<span class="grey">版块名称s：</span><b><?php echo isset($forum['name']) ? $forum['name'] : '';?></b> &nbsp; <span class="grey2">|</span> 
					<span class="grey">主题：</span><b><?php echo isset($forum['threads']) ? $forum['threads'] : '';?></b> &nbsp;  <span class="grey2">|</span> 
					<span class="grey">帖子：</span><b><?php echo isset($forum['posts']) ? $forum['posts'] : '';?></b> &nbsp;  <span class="grey2">|</span> 
					<span class="grey">今日帖子：</span><span class="new bold"><?php echo isset($forum['todayposts']) ? $forum['todayposts'] : '';?></span> &nbsp;
					<?php if($forum['modlist']) { ?>
					  <span class="grey2">|</span> 
					  <span class="grey">版主：</span><?php if(!empty($forum['modlist'])) { foreach($forum['modlist'] as $modid=>&$modname) {?><a href="http://localhost/forum/?you-profile-uid-<?php echo isset($modid) ? $modid : '';?>-ajax-1.htm" target="_blank" class="ajaxdialog" ajaxdialog="{position: 6, modal: false}" rel="nofollow"><?php echo isset($modname) ? $modname : '';?></a> <?php }}?>
					<?php } ?>
				</span>
			</p>
			<?php if($forum['brief']) { ?>
			<p style="margin-top: 8px;">
				<span class="grey">版块介绍：<?php echo isset($forum['brief']) ? $forum['brief'] : '';?></span>
			</p>
			<?php } ?>
		</div>
		<div class="footer"></div>
	</div> -->
	<?php } ?>
	
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
				<li><a href="">正品保证</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_2"></div>
				<li><a href="">专家评估</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_3"></div>
				<li><a href="">权威保证</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_4"></div>
				<li><a href="">7天退货</a></li>
			</div>
			<div class="f_head">
				<div class="f_pic" id="f_pic_5"></div>
				<li><a href="">五星物流服务</a></li>
			</div>
		</div>
	</div>
	<div class="footer_2">
		<div class="f2_content">
			<div class="num"></div>
			<div class="f2_texts">
					<ul class="nav">
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">购物流程</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">常见问题</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">连锁查询</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">免责声明</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">退货说明</a></li>
						<li class="f2_line">|</li>
						<li class="f2_text"><a href="">关于我们</a></li>
						
					</ul>
				</div>
		</div>

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



<?php if($fid && $ismod) { ?>
<script type="text/javascript">

// 二级置顶，三级置顶，检查 fid，如果fid不等于当前fid，则只能选择一篇
$('#mod_checkall').click(function() {
	$('#body input[name="fid_tid[]"]').attr('checked', this.checked);
});

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
	return false;
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

// 主题分类 
$('#mod_type').click(function() {
	var other_forum_flag = 0;
	$.each($('#body input[name="fid_tid[]"]:checked'), function(k, v) {
		var currfid = $(this).val().split('_')[0];
		if(currfid != <?php echo isset($fid) ? $fid : '';?>) {
			$(this).attr('checked', '');
			other_forum_flag = 1;
		}
	});
	if(other_forum_flag) {
		alert('批量设置主题分类只能选择当前版块的主题，已经取消了非当前版块的主题（全局置顶主题）');
	}
	
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
	// 删除 dialog
	var url = url_add_arg('http://localhost/forum/?mod-delete-fid-<?php echo isset($fid) ? $fid : '';?>.htm', 'fid_tids', fid_tids);
	ajaxdialog_request(url, function() {
		window.location.reload();
	});
	return false;
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
		window.location.reload();
	});
	return false;
});

</script>
<?php } ?>


<script type="text/javascript">

// 鼠标背景变色
$('#threadlist tr').bind('mouseover', function() {$(this).removeClass('bg1').addClass('bg2');});
$('#threadlist tr').bind('mouseout', function() {$(this).removeClass('bg2').addClass('bg1');});

// 最新帖，已读帖，比较最后阅读时间和帖子的最后回复时间
$('#body table.thread').each(function() {
	var tid = intval($(this).attr('tid'));
	var lastpost = intval($(this).attr('lastpost'));
	var k = tid_is_read(tid, lastpost);
	if(tid_is_read(tid, lastpost)) {
		$('.subject_type', this).addClass('read');
		$('a.subject_link', this).addClass('read');
		$('a.thread_icon', this).addClass('xgrey');
	}
});

// 点击服务器，火帖
$.getScript('<?php echo isset($click_server) ? $click_server : '';?>&'+Math.random(), function() {
	if(!xn_json) return;
	var json = xn_json;
	for(tid in json) {
		var viewspan = $('span.views[tid='+tid+']');
		viewspan.html(json[tid]);
		if(json[tid] > <?php echo isset($conf['threadlist_hotviews']) ? $conf['threadlist_hotviews'] : '';?>) {
			viewspan.addClass('red bold');
			//$('table[tid='+tid+'] a.subject_link').after(' <span class="icon icon-post-fire" title="火帖"></span>'); // 根据回复数
			//viewspan.html(viewspan.html() + '<span class="icon icon-post-fire"></span>');
		}
	}
});

// 记录当前页码
<?php if($fid) { ?>
var fid_page = $.parseJSON($.pdata(cookie_pre + 'fid_page'));
if(!fid_page) fid_page = {};
fid_page[''+<?php echo isset($fid) ? $fid : '';?>] = <?php echo isset($page) ? $page : '';?>;
$.pdata(cookie_pre + 'fid_page', $.toJSON(fid_page));

// orderby 切换
$('#nav_orderby a').click(function() {
	// 设置 cookie, 重新刷新页面
	$.cookie('orderby', intval($.cookie('orderby')) == 1 ? 0 : 1);
	window.location.reload();
});
<?php } ?>

$('div.div div.body').find('hr:last').hide();// 隐藏最后一个 hr

// 键盘翻页
bind_document_keyup_page();

</script>



<script type="text/javascript">

</script>


</body>
</html>