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
        <div class="head">

            <?php if ($logo) { ?>
            <div class="logo">
                <a href="<?php echo $home; ?>">
                    <img style="width:100%;height:100%;border:0;"
                         src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
                </a>
            </div>
            <?php } ?>

            <div class="search">
                <form>
                    <input type="text" class="text" name="search" value="<?php echo $search; ?>" />
                    <input type="button" class="button button-search" value="搜 索">
                </form>
                <div class="hot">
                    <p ><a href="">热门宝贝 :</a></p>
                    <p ><a href="">字画</a></p>
                    <p ><a href="">瓷器</a></p>
                    <p ><a href="">玛瑙</a></p>
                </div>
            </div>

            <div class="login">
                <?php if (!$logged) { ?>
                <?php echo $text_welcome; ?>
                <?php } else { ?>
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
            </div>
            <div class="others">
                <ul class="nav">
                    <li class="text"><a href="">首页</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="woyaoxunbao.html">我要寻宝</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="woyaojimai.html">我要寄卖</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="">我要鉴定</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="">我要估值</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="./forum">我要交流</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="">宝库自营</a></li>
                    <li class="line">|</li>
                    <li class="text"><a href="">限时特卖</a></li>
                    <img src="/catalog/view/theme/default/image/baoku/qidai.png">

                </ul>
            </div>
        </div>
    </div>

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