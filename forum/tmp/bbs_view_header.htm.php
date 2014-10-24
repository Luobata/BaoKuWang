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
<div id="gongao"> 
<div style="width:100%;height:30px;margin:0 auto;white-space: nowrap;overflow:hidden;left: 10px;
position: relative;" id="scroll_div" class="scroll_div"> 
<div id="scroll_begin"> 
眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室
</div> 
<div id="scroll_end"></div> 
</div> 
</div> 
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
				<form action="/" method="get" enctype="multipart/form-data" id="s_search">
                    <select class="search_sel">
                        <option>商城</option>
                        <option>论坛</option>
                        <option>序列号</option>
                    </select>
                    <input type="hidden" name="route" class="route" value="product/list"/>
                    <input type="text" name="search" class="text" value="<?php echo isset($keyword) ? $keyword : '';?>" />
                    <a type="submit" class="button button-search" value="搜 索" style="display:none;" href="javascript:void(0)" role="button"><span>搜 索</span></a>
                    <div class="buttons" onclick="submit">
					    搜索
					</div>

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

			<div class="login">
				<?php if(($_user['uid']==0)) { ?>
				<p><a href="/index.php?route=account/login">登陆</a></p>

				<p><a href="/index.php?route=account/register">注册</a></p>
				<?php } else { ?>
				<p><a href="/index.php?route=account/account">个人中心</a></p>
				<p><a href="/index.php?route=account/logout">退出</a></p>
				<?php } ?>
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
		
		