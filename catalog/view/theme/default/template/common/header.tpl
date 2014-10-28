<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
    <base href="<?php echo $base; ?>" />
    <?php if ($description) { ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php } ?>
    <?php if ($keywords) { ?>
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <?php } ?>
    <?php if ($icon) { ?>
    <link href="<?php echo $icon; ?>" rel="icon" />
    <?php } ?>
    <?php foreach ($links as $link) { ?>
    <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
    <?php } ?>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSS文件 -->
    <link rel="stylesheet" type="text/css" href="/catalog/view/theme/default/stylesheet/baoku/common.css" />
    <!--
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/stylesheet.css" />
    -->
    <?php foreach ($styles as $style) { ?>
    <link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>

    <!-- JS文件 -->
    <script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
    <script type="text/javascript" src="catalog/view/javascript/common.js"></script>
    <script type="text/javascript" src="catalog/view/javascript/baoku/common.js"></script>
    <?php foreach ($scripts as $script) { ?>
    <script type="text/javascript" src="<?php echo $script; ?>"></script>
    <?php } ?>

    <!-- 其它文件 -->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie7.css" />
    <![endif]-->
    <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie6.css" />
    <script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">
    DD_belatedPNG.fix('#logo img');
    </script>
    <![endif]-->
    <?php if ($stores) { ?>
    <script type="text/javascript">
    $(document).ready(function() {
    <?php foreach ($stores as $store) { ?>
    $('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
    <?php } ?>
    });
    </script>
    <?php } ?>
    <?php echo $google_analytics; ?>
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
    <img src="catalog/view/theme/default/image/baoku/sound.png">
<div style="width:100%;height:30px;margin:0 auto;white-space: nowrap;overflow:hidden;left: 28px;
position: relative;" id="scroll_div" class="scroll_div"> 
<div id="scroll_begin"> 
眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室眯眼工作室
</div> 
<div id="scroll_end"></div> 
</div> 
</div>  -->
        <div class="head">

            <?php if ($logo) { ?>
            <div class="logo">
                <a href="<?php echo $home; ?>">
                    <img style="width:100%;<!-- height:100%; -->border:0;"
                         src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
                </a>
            </div>
            <?php } ?>

            <div class="search">

                <form action="/" method="get" enctype="multipart/form-data">
                    <select class="search_sel">
                        <option>商城</option>
                        <option>论坛</option>
                        <option>序列号</option>
                    </select>
                    <input type="hidden" name="route" class="route" value="product/list"/>
                    <input type="text" name="search" class="text" value="<?php echo $search; ?>" />
                    <input type="submit" class="button button-search" value="搜 索">
                    

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


                <?php if (!$logged) { ?>
            <div class="login">
                <?php echo $text_welcome; ?>
                <?php } else { ?>
            <div class="login" style="margin-left: 15px;">
                <?php echo $text_logged; ?>
                <?php } ?>
            </div>

            <div class="qbcode"></div>

        </div>
    </header>

    <div class="title">
        <div class="index">
            <div class="all">
                <li><a href="">全部宝贝分类</a></li>
                <div class="content_head" style="position:absolute;z-index:100;display:none;">
                    <?php foreach( $category_head as $cat ) { ?>
                    <div class="goods">
                        <div class="goods_line">
                            <a href="index.php?route=product/list&filter_category=<?php echo $cat['parent']['id']; ?>">
                            <li><?php echo $cat['parent']['name']; ?></li></a>
                        </div>
                        <div class="item" id="item">
                        <?php foreach( $category_head as $cat ) { ?>
                        <div class="goods">
                            <div class="goods_line">
                                <a href="index.php?route=product/list&filter_category=<?php echo $cat['parent']['id']; ?>">
                                <li><?php echo $cat['parent']['name']; ?></li></a>
                            </div>
                        </div>    
                        <?php } ?>
                        </div>
                    </div>
                        
                    <?php } ?>
                </div>
            </div>
            <div class="others">
                <ul class="nav">
                    <li class="text <?php if((!$_GET['route'])||($_GET['route']=='common/home')){ echo 'thispage'; } ?>"><a href="/index.php?route=common/home">首页</a></li>
                    <?php if(($_GET['route'])&&($_GET['route']!='common/home')&&($_GET['route']!='product/list')){ ?> <li class="line">|</li> <?php } ?>
                    <li class="text <?php if($_GET['route']=='product/list'){ echo 'thispage'; } ?>"><a href="/index.php?route=product/list">我要寻宝</a></li>
                    <?php if(($_GET['route'])&&($_GET['route']!='product/list')&&($_GET['route']!='account/new')){ ?> <li class="line">|</li> <?php } ?>
                    <li class="text <?php if($_GET['route']=='account/new'){ echo 'thispage'; } ?>"><a href="/index.php?route=account/new">我要寄卖</a></li>
                    <?php if(($_GET['route'])&&($_GET['route']!='account/new')&&($_GET['route']!='product/identify')){ ?> <li class="line">|</li> <?php } ?>
                    <li class="text <?php if($_GET['route']=='product/identify'){ echo 'thispage'; } ?>"><a href="/index.php?route=product/identify">我要鉴定</a></li>
                    <?php if(($_GET['route'])&&($_GET['route']!='product/identify')&&($_GET['route']!='product/valuation')){ ?> <li class="line">|</li> <?php } ?>
                    <li class="text <?php if($_GET['route']=='product/valuation'){ echo 'thispage'; } ?>"><a href="/index.php?route=product/valuation">我要估值</a></li>
                    <?php if(($_GET['route'])&&($_GET['route']!='product/valuation')){ ?> <li class="line">|</li> <?php } ?>
                    <li class="text"><a href="/forum">我要交流</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="javascript:void(0)">宝库自营</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="javascript:void(0)">限时特卖</a></li>
                    <img src="/catalog/view/theme/default/image/baoku/qidai.png">
                </ul>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="catalog/view/javascript/baoku/common.js"></script>

    <!--
    <div class="links"><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></div>

    <?php if ($categories) { ?>
    <div id="menu">
        <ul>
            <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
                <?php if ($category['children']) { ?>
                <div>
                    <?php for ($i = 0; $i < count($category['children']);) { ?>
                    <ul>
                        <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
                        <?php for (; $i < $j; $i++) { ?>
                        <?php if (isset($category['children'][$i])) { ?>
                        <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php } ?>
            </li>
            <?php } ?>
            <li><a href="/forum" target="_blank">论坛</a></li>
        </ul>
    </div>
    <?php } ?>


    <?php if ($error) { ?>

    <div class="warning"><?php echo $error ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>

    <?php } ?>
    -->