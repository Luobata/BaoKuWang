<?php echo $header; ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
<!-- <div id="content"><?php echo $content_top; ?>
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
      <li><a href="">首页 >&nbsp;</a></li>
      <li><a href="">个人中心</a></li>
       </ul>  


       <div class="left">
        <ul class="home-nav">
          <li id="user-name"><a href="userhome.html">于先生的宝贝</a></li>
          <li><a href="">已发布的宝贝</a><span class="goods-num">5</span></li>
          <li><a href="">已鉴定的宝贝</a></li>
          <li><a href="">未鉴定的宝贝</a><span class="goods-num">20</span></li>
          <li><a href="">已下架的宝贝</a><span class="goods-num">5</span></li>
          <li ><a href="">收藏宝贝</a><span class="goods-num">5</span></li>
          <li id="last" class="userinfo" style="height: 60px;line-height: 60px;"><a href="userinfo.html">编辑个人资料</a></li>
        </ul>
       </div>
         
       <div class="goods-list right">
        <table>
                 <thead>
                     <tr>
                         <th style="width:320px;text-align:left;padding-left:10px">商品</th>
                         <th style="width:140px;">状态</th>
                         <th style="width:140px;">发布时间</th>
                         <th style="width:174px;">操作</th>
                     </tr>
                     <?php if(isset($products)) {;?>
                     <?php foreach ($products as $product) { ?>
                <tbody id="wishlist-row<?php echo $product['product_id']; ?>">
                  <tr class="item">
                       <th class="pic">
                        <?php if ($product['thumb']) { ?>
            <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
            <?php } ?>
                        <div class="goods-info">
                          <div class="goods-title"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
                          <div class="goods-price"><?php echo $product['price'];?></div>
                        </div>
                       </th>

                       <th>
                        <?php echo$product['identify'];?>
                       </th>

                       <th>
                        <?php echo$product['date_added'];?>
                       </th>

                       <th>
                         
                         <a href="<?php echo $product['remove']; ?>">删除</a>
                       </th>
                  </tr>

                </tbody>
              <?php } ?>
               <?php }else{ ?>
                    <?php for ($i=0; $i <sizeof($product) ; $i++) { ;?>
                      <tbody id="wishlist-row<?php echo $product[$i]['product_id']; ?>">
                  <tr class="item">
                       <th class="pic">
                        
            <a href="./route"><img src="./image/<?php echo $product[$i]['image']; ?>" alt="<?php echo $product[$i]['title']; ?>" title="<?php echo $product[$i]['title']; ?>" /></a>
 
                        <div class="goods-info">
                          <div class="goods-title"><a href="<?php echo "a" ;?>">
                            <?php echo $product[$i]['title']; ?></a></div>
                          <div class="goods-price"><?php echo $product[$i]['price'];?></div>
                        </div>
                       </th>

                       <th>
                        
                        <?php echo$product[$i]['identify']==0?"未鉴定":"已鉴定";?>
                       </th>

                       <th>
                        <?php echo$product[$i]['date_added'];?>
                       </th>

                       <th>
                         
                         <a href="<?php echo $product['remove']; ?>">删除</a>
                       </th>
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