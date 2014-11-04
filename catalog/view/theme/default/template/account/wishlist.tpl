<?php echo $header; ?>
<!--<?php if ($success) { ?>
<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <?php if ($products) { ?>
  <div class="wishlist-info">
    <table>
      <thead>
        <tr>
          <td class="image"><?php echo $column_image; ?></td>
          <td class="name"><?php echo $column_name; ?></td>
          <td class="model"><?php echo $column_model; ?></td>
          <td class="stock"><?php echo $column_stock; ?></td>
          <td class="price"><?php echo $column_price; ?></td>
          <td class="action"><?php echo $column_action; ?></td>
        </tr>
      </thead>
      <?php foreach ($products as $product) { ?>
      <tbody id="wishlist-row<?php echo $product['product_id']; ?>">
        <tr>
          <td class="image"><?php if ($product['thumb']) { ?>
            <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
            <?php } ?></td>
          <td class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
          <td class="model"><?php echo $product['model']; ?></td>
          <td class="stock"><?php echo $product['stock']; ?></td>
          <td class="price"><?php if ($product['price']) { ?>
            <div class="price">
              <?php if (!$product['special']) { ?>
              <?php echo $product['price']; ?>
              <?php } else { ?>
              <s><?php echo $product['price']; ?></s> <b><?php echo $product['special']; ?></b>
              <?php } ?>
            </div>
            <?php } ?></td>
          <td class="action"><img src="catalog/view/theme/default/image/cart-add.png" alt="<?php echo $button_cart; ?>" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" />&nbsp;&nbsp;<a href="<?php echo $product['remove']; ?>"><img src="catalog/view/theme/default/image/remove.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" /></a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?> -->
  <div class="content">

    <ul class="bread">
        <li><a href="/index.php?route=common/home">首页</a>&nbsp;>&nbsp;</li>
        <li><a href="javascript:void(0)">我的宝贝</a></li>
    </ul>

    <div id="left-wrap">
        <ul class="home-nav">
            <a href="/index.php?route=account/account"><li class="userinfo-1">个人中心</li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=1"><li class="userinfo-2 <?php if($type==1) echo 'userinfo-choose'; ?>">已发布的宝贝<span class="goods-num">(<?php echo$postnum['up'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=2"><li class="userinfo-2 <?php if($type==2) echo 'userinfo-choose'; ?>">已下架的宝贝<span class="goods-num">(<?php echo$postnum['down'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=3"><li class="userinfo-2 <?php if($type==3) echo 'userinfo-choose'; ?>">未鉴定的宝贝<span class="goods-num">(<?php echo$postnum['uniden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=4"><li class="userinfo-2 <?php if($type==4) echo 'userinfo-choose'; ?>">已鉴定的宝贝<span class="goods-num">(<?php echo$postnum['iden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist"><li class="userinfo-2 <?php if(!isset($type)) echo 'userinfo-choose'; ?>">收藏宝贝<span class="goods-num">(<?php echo$postnum['wishlist'];?>)</span></li></a>
            <a href="/index.php?route=account/edit"><li class="userinfo-1">编辑个人资料</li></a>
            <a href="/index.php?route=account/password"><li class="userinfo-1">账户安全</li></a>
        </ul>
    </div>

       <div class="goods-list right">
        <table>
                 <thead>
                     <tr>
                         <th style="width:475px;text-align:left;padding-left:10px;border-right: 1px solid #ddd;">商品</th>
                         <th style="width:69px;border-right: 1px solid #ddd;">状态</th>
                         <th style="width:110px;border-right: 1px solid #ddd;">发布时间</th>
                         <th style="width:107px;">操作</th>
                     </tr>
                  </thead>

                     <?php if(isset($products)) { ?>
                     <?php foreach ($products as $product) { ?>
                     <?php //var_dump($products); ?>
                <tbody id="wishlist-row<?php echo $product['product_id']; ?>">
                  <tr class="items">
                       <td class="pic" style="border-right: 1px solid #ddd;">
                          <?php if ($product['thumb']) { ?>
                          <a target="_blank" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
                          <?php } ?>
                          <div class="goods-info">
                            <div class="goods-title"><a target="_blank" href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
                            <div class="goods-price"><?php echo $product['price'];?></div>
                          </div>
                       </td>
  
                       <td style="border-right: 1px solid #ddd;text-align: center;">
                        <?php echo $product['identify'];?>
                       </td>

                       <td style="border-right: 1px solid #ddd;text-align: center;">
                        <?php echo $product['date_added'];?>
                       </td>

                       <td style="border-right: 1px solid #ddd;text-align: center;">
                         
                         <a href="<?php echo $product['remove']; ?>">删除</a>
                       </td>
                  </tr>

                </tbody>
              <?php     } ?>
              <?php }else{ ?>

              <!--打印已上架 下架 鉴定 未鉴定等信息-->
                    <?php for ($i=0; $i <sizeof($product) ; $i++) { ;?>
                      <tbody id="wishlist-row<?php echo $product[$i]['product_id']; ?>">
                  <tr class="items">
                       <td class="pic" style="border-right: 1px solid #ddd;">
                         <a target="_blank" href="/index.php?route=product/product&product_id=<?php echo$product[$i]['product_id'];?>"><img src="./image/<?php echo $product[$i]['image']; ?>" alt="<?php echo $product[$i]['title']; ?>" title="<?php echo $product[$i]['title']; ?>" /></a>
                          <div class="goods-info">
                            <div class="goods-title"><a target="_blank" href="/index.php?route=product/product&product_id=<?php echo$product[$i]['product_id'];?>">
                              <?php echo $product[$i]['title']; ?></a></div>
                            <div class="goods-price">￥<?php echo $product[$i]['price'];?></div>
                          </div>
                       </td>

                       <td style="border-right: 1px solid #ddd;text-align: center;">

                        <?php echo $product[$i]['identify'];?>
                       </td>

                       <td style="border-right: 1px solid #ddd;text-align: center;">
                        <?php echo $product[$i]['date_added'];?>
                       </td>

                       <td style="border-right: 1px solid #ddd;text-align: center;">
                             <?php if($type==4){ ?>
                             <a href="/index.php?route=product/identify">鉴定</a>&nbsp;&nbsp;
                             <?php } elseif ($type==2) { ?>
                             <a href="/index.php?route=account/wishlist/changestatus&type=<?php echo$type;?>&product_id=<?php echo $product[$i]['product_id'];?>">上架</a>&nbsp;&nbsp;
                             <?php } elseif ($type==1) { ?>
                             <a target="_blank" href="/index.php?route=account/new&product_id=<?php echo $product[$i]['product_id'];?>">编辑</a><br/>
                             <a href="/index.php?route=account/wishlist/changestatus&type=<?php echo$type;?>&product_id=<?php echo $product[$i]['product_id'];?>">下架</a>&nbsp;&nbsp;
                             <?php } ?>
                         <a href="/index.php?route=account/new/delete&product_id=<?php echo $product[$i]['product_id']; ?>&type=<?php echo $type;?>">删除</a>
                       </td>
                  </tr>

                </tbody>
                    <?php } ?>
               <?php } ?>

                 </thead>
        </table>
       </div>
       
</div><!--end of cpmtent-->
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>