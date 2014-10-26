<?php echo $header; ?>
<?php //echo $column_left; ?><?php //echo $column_right; ?><?php //echo $content_top; ?>

<!--隐藏input框判断是否为首页-->
<input type="text" value="index" name="index" id="index"style="display:none">
<div class="content">
    
    <div class="first">

        <div class="content_head">
        <?php foreach( $categories as $cat ) { ?>
        <div class="goods">
            <div class="goods_line">
                <a href="index.php?route=product/list&filter_category=<?php echo $cat['parent']['id']; ?>">
                <li><?php echo $cat['parent']['name']; ?></li></a>
            </div>
            <div class="item" id="item">
            <?php foreach( $categories as $cat ) { ?>
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

        <div class="pic">
           <div id="slider" class="swipe">
                <div class="swipe-wrap">
                <?php foreach( $banner_images as $image ) { ?>
                <div><a href="<?php echo $image['link']; ?>"><img src="/image/<?php echo $image['image']; ?>"></a></div>
                <?php } ?>
                </div>
           </div>
        </div>

    </div>

    <form>
        <div class="second">
            <div class="s_head">
                <div class="pic_head" id="head1">
                    <li><a href="javascript:void(0)" class="head1">宝库推荐</a></li>
                </div>
                <div class="pic_head" id="head2">
                    <li><a href="javascript:void(0)" class="head2">最热宝贝</a></li>
                </div>
            </div>
            <div class="s_content" id="s_content_1">
                <div class="row">
                    <?php foreach( $recommend_images as $key =>$image ) { ?>
                    <div class="pics" id="pic<?php echo ($key+1);?>">
                        <a href="<?php echo $image['link']; ?>"><img src="/image/<?php echo $image['image']; ?>"></a>
                    </div>
                    <?php if($key==2) { ?>
                    </div><div class="row">
                    <?php }} ?>
                </div>
            </div>
            <div class="s_content" id="s_content_2" style="display:none">
                <div class="row">
                    <?php foreach( $hot_images as $key =>$image ) { ?>
                    <div class="pics" id="pic<?php echo ($key+1);?>">
                        <a href="<?php echo $image['link']; ?>"><img src="/image/<?php echo $image['image']; ?>"></a>
                    </div>
                    <?php if($key==2) { ?>
                </div><div class="row">
                    <?php }} ?>
                </div>
            </div>
        </div>
    </form>

    <script>
    // 初始化产品数据
    var parent_polular_product = <?php echo json_encode($parent_polular_product); ?>;
    var children_polular_product = <?php echo json_encode($children_polular_product); ?>;
    </script>


    <?php foreach( $parent_category_id_list as $parent_category_id ) {
              // 获取该父类的名称
              foreach( $categories as $cat ) {
                  if( $cat['parent']['id'] == $parent_category_id ) {
                      $parent_category_name = $cat['parent']['name'];
                  }
              } ?>

        <form>
            <div class="third">
                <div class="t_head">
                    <div class="pic_head head_category" id="head3">
                        <li pid="<?php echo $parent_category_id;?>"><a href="javascript:void(0)" class="head3"><?php echo $parent_category_name; ?></a></li>
                    </div>
                    <div class="jew">
                        <ul class="t_nav">

                            <?php foreach( $categories as $cat ) {
                                    if( $cat['parent']['id'] == $parent_category_id ) {
                                        foreach( $cat['children'] as $child ) { ?>
                            <li class="text" pid="<?php echo $parent_category_id;?>" value="<?php echo $child['id']; ?>">
                                <a href="javascript:void(0)"><?php echo $child['name'];?></a>
                            </li>
                            <li class="line" >|</li>
                            <?php       }
                                    }
                                  }   ?>

                            <li class="text" id="more"><a href="/index.php?route=product/list&filter_category=63" target="_blank">更多></a></li>
                        </ul>
                    </div>
                </div>

                <table class="t_content">
                    <tr class="t_row">
                        <?php $count = 1; //var_dump($parent_polular_product[$parent_category_id]); ?>
                        <?php foreach ( $parent_polular_product[$parent_category_id] as $id => $info ) { ?>
                        <td><div class="t_row_jew" >
                                <div class="t_row_pic" id="t_row_pic1">
                                    <a id="url_<?php echo $count; ?>" href="/index.php?route=product/product&product_id=<?php echo $id;?>">
                                        <img id="img_<?php echo $count; ?>" src="/image/<?php echo $info['image'];?>"></a></div>
                                <li class="desc" id="text_<?php echo $count; ?>"><?php echo $info['title']?></li>
                                <li class="savep">价格：<span class="savep-price" id="sprice_<?php echo $count; ?>"><?php echo $info['price']?></span>元</li>
                                <!--<li class="farmp">市场价: <span id="bprice_1">12999</span>元</li>-->
                            </div></td>
                        <?php   if($count==4) { ?>
                        </tr><tr class="t_row">
                        <?php   }
                              $count++;
                              } ?>
                    </tr>
                </table>
            </div>
        </form>

    <?php } ?>

</div>

<h1 style="display: none;"><?php //echo $heading_title; ?></h1>
<?php //echo $content_bottom; ?>
<?php echo $footer; ?>