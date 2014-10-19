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
		<div class="head">
			<div class="logo">
				
			</div>

			<div class="search">
				<form>
					<input type="text" class="text">
<!--					<a type="button" class="buttons" value="搜 索" href="javascript:void(0)" role="button"><span>搜 索</span></a>-->
<div class="buttons">
    搜索
</div>
				</form>
				<div class="hot">
				<p ><a href="">热门宝贝 :</a></p>
				<p ><a href="">字画</a></p>
				<p ><a href="">瓷器</a></p>
				<p ><a href="">玛瑙</a></p>
				</div>
			</div>

			<div class="login">
				<p><a href="">登陆</a></p>
				<p><a href="">注册</a></p>
			</div>

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
						<li class="text"><a href="index.html">首页</a></li>
						<li class="line">|</li>
						<li class="text"><a href="woyaoxunbao.html">我要寻宝</a></li>
						<li class="line">|</li>
						<li class="text"><a href="woyaojimai.html">我要寄卖</a></li>
						<li class="line">|</li>
						<li class="text"><a href="">我要鉴定</a></li>
						<li class="line">|</li>
						<li class="text"><a href="">我要估值</a></li>
						<li class="line">|</li>
						<li class="text"><a href="">我要交流</a></li>
						<li class="line">|</li>
						<li class="text"><a href="">宝库自营</a></li>
						<li class="line">|</li>
						<li class="text"><a href="">限时特卖</a></li>
						
						      <img src="http://localhost/forum/view/image/qidai.png">
						     
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
		
		