<?php echo $header;?>

<script>
    // 设置搜索url
</script>

<div class="content">

    <!--面包屑-->
    <ul class="bread">
        <li><a href="">首页 >&nbsp</a></li>
        <li><a href="">我要寻宝</a></li>
    </ul>

    <!--筛选条件-->
    <div class="nav-category-group">

        <?php if( !empty($selected) ) { ?>
        <div class="nav-category selected">
            <h4 title="已选择">已选择 <span>：</span></h4>
            <div class="nav-category-wrap">
                <?php foreach( $selected as $key => $value ) { ?>
                    <span class="button-selected"><?php echo $value; ?><a class="delete-select" href="<?php echo $url[$key]; ?>"> x </a></span>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <div class="nav-category">
            <h4 title="分类">分类<span>：</span></h4>
            <div class="nav-category-wrap">
                <ul class="nav-category-content">
                <?php foreach( $categories as $cat ) { ?>
                    <li><a href="<?php echo $url['category'].'&filter_category='.$cat['parent']['id']; ?>"><b><?php echo $cat['parent']['name']; ?></b></a></li>
                <?php   foreach( $cat['children'] as $child ) { ?>
                        <li><a href="<?php echo $url['category'].'&filter_category='.$child['id']; ?>"><?php echo $child['name']; ?></a></li>
                <?php   }
                      } ?>
                </ul>
            </div>
        </div>

        <div class="nav-category">
            <h4 title="地区">地区<span>：</span></h4>
            <div class="nav-category-wrap">
                <ul class="nav-category-content">
                <?php foreach( $zones as $zone ) { ?>
                    <li><a href="<?php echo $url['place'].'&filter_place='.$zone['name']; ?>"><?php echo $zone['name'];?></a></li>
                <?php } ?>
                </ul>
            </div>
        </div>

        <div class="nav-category">
            <h4 title="鉴定结果">鉴定结果<span>：</span></h4>
            <div class="nav-category-wrap">
                <ul class="nav-category-content">
                    <li><a href="<?php echo $url['identify'].'&filter_identify=1'; ?>">已鉴定</a></li>
                    <li><a href="<?php echo $url['identify'].'&filter_identify=0'; ?>">未鉴定</a></li>
                </ul>
            </div>
        </div>

        <div class="nav-category lastline">
            <h4 title="价格">价格<span>：</span></h4>
            <div class="nav-category-wrap">
                <ul class="nav-category-content">
                <?php foreach( $price as $k => $p ) { ?>
                      <li><a href="<?php echo $url['price'].'&filter_price='.$k; ?>">
                      <?php echo $p['low']; ?><?php echo ($p['high'])?('-'.$p['high'].'元'):('元以上'); ?>
                      </a></li>
                <?php } ?>
                </ul>
            </div>
        </div>

    </div>

    <!--筛选排序-->
    <div class="sortbar">
        <ul class="sort-btn">
            <!--默认-->
            <li <?php if($order_default){ ?>class="active"<?php } ?>>
            <a href="<?php echo $url['order'];?>">默认排序</a></li>
            <!--热度-->
            <li <?php if($order_hot){ ?>class="active"<?php } ?>>
            <a href="<?php echo $url['order'].'&order=hot_desc';?>">最热</a></li>
            <!--价格-->
            <li <?php if($order_price){ ?>class="active"<?php } ?>>
            <?php if($order_price) {
                      if($order_price_desc){ ?>
                      <a style="margin-left:30px;float:left" href="<?php echo $url['order'].'&order=price_esc';?>">价格</a>
                      <a style="float:left;margin-left:2px;"href="<?php echo $url['order'].'&order=price_esc';?>">
                      <img src="/image/data/select_up.png"/>
            <?php     } else { ?>
                      <a style="margin-left:30px;float:left" href="<?php echo $url['order'].'&order=price_desc';?>">价格</a>
                      <a style="float:left;margin-left:2px;"href="<?php echo $url['order'].'&order=price_desc';?>">
                      <img src="/image/data/select_down.png"/>
            <?php     }
                  } else { ?>
                  <a style="margin-left:30px;float:left" href="<?php echo $url['order'].'&order=price_desc';?>">价格</a>
                  <a style="float:left;margin-left:2px;"href="<?php echo $url['order'].'&order=price_desc';?>">
                  <img src="/image/data/unselect.png"/>
            <?php } ?>
            </a></li>
        </ul>
    </div>

    <!--商品展示-->
    <div class="item-content">
        <div class="row">
            <?php foreach( $products as $key => $product ) { ?>
            <div class="col<?php if((($key+1)%4)==0){ ?> col-last<?php } ?>">
                <div class="col_img"><a href="/index.php?route=product/product&product_id=<?php echo $product['product_id'];?>">
                <img src="/image/<?php echo $product['image'];?>"></img></a></div>
                <h3 class="item-title"><a href="/index.php?route=product/product&product_id=<?php echo $product['product_id'];?>"><?php echo $product['title'];?></a></h3>
                <div class="price-info"><span class="price"><b>￥<?php echo $product['price'];?></b></span></div>
            </div>
            <?php if( (($key+1)%4) == 0 && ($key+1) != count($products) ) { ?> </div><div class="row"> <?php } ?>
            <?php } ?>
        </div>
    </div>

    <!--分页按钮-->
    <div class="goods-page">
        <!--<a href="#" ><span><</span></a>-->

        <?php if(!isset($page)) { ?>
              <!-- 未传页码参数的 -->
              <a><span><</span></a>
              <a class="active"><span>1</span></a>
        <?php     $i = 2;
                  while( $i <= $products_page_number && $i<= 5 ) { ?>
                      <a href="<?php echo $url['page'].'&page='.$i; ?>"><span><?php echo $i; ?></span></a>
        <?php         $i++;
                  }
                  if($products_page_number>=2) {  ?>
                  <a href="<?php echo $url['page'].'&page=2'; ?>" ><span>></span></a>
        <?php     } else { ?>
                  <a><span>></span></a>
        <?php     }
              } else { ?>
              <!-- 已传页码参数的 -->
        <?php     if($products_page_number<=5) { ?>
                      <!-- 总页码不大于五 -->
                      <a<?php if($page>1) { echo ' href="'.$url['page'].'&page='.($page-1).'"'; } ?>><span><</span></a>
        <?php         $i=1;
                      while($i<=$products_page_number) { ?>
                          <a <?php if($i==$page) { echo 'class="active"'; } ?> href="<?php echo $url['page'].'&page='.$i; ?>"><span><?php echo $i;?></span></a>
        <?php             $i++;
                      } ?>
                      <a<?php if($page<$products_page_number){ echo ' href="'.$url['page'].'&page='.($page+1).'"'; } ?>><span>></span></a>
        <?php     } else { ?>
                      <!-- 总页码大于五 -->
        <?php         if( $page<=3 ) { ?>
                          <a<?php if($page>1){ echo ' href="'.$url['page'].'&page='.($page-1).'"'; } ?>><span><</span></a>
        <?php             $i=1;
                          while($i<=5) { ?>
                              <a <?php if($i==$page) { echo 'class="active"'; } ?> href="<?php echo $url['page'].'&page='.$i; ?>"><span><?php echo $i; ?></span></a>
        <?php                 $i++;
                          } ?>
                          <a href="<?php echo $url['page'].'&page='.($page+1);?>"><span>></span></a>
        <?php         } elseif ( ($products_page_number-$page)<3 ) { ?>
                          <a href="<?php echo $url['page'].'&page='.($page-1);?>"><span><</span></a>
        <?php             $i=4;
                          while($i>=0) { ?>
                          <a <?php if(($products_page_number-$i)==$page) { echo 'class="active"'; } ?> href="<?php echo $url['page'].'&page='.($products_page_number-$i); ?>"><span><?php echo ($products_page_number-$i); ?></span></a>
        <?php             $i--;
                          } ?>
                          <a<?php if($page<$products_page_number){ echo ' href="'.$url['page'].'&page='.($page+1).'"'; } ?>><span>></span></a>
        <?php         } else { ?>
                          <a href="<?php echo $url['page'].'&page='.($page-1);?>"><span><</span></a>
        <?php             $i = -2;
                          while($i<3) { ?>
                          <a <?php if($i==0) { echo 'class="active"'; } ?> href="<?php echo $url['page'].'&page='.($page+$i); ?>"><span><?php echo ($page+$i); ?></span></a>
        <?php             $i++;
                          } ?>
                          <a href="<?php echo $url['page'].'&page='.($page+1);?>"><span>></span></a>
        <?php         }
                  }
              } ?>

        <!--
        <?php $i = $products_page_number;
              while( $i ) {
                  $thePage = $products_page_number-$i+1; ?>
                  <a <?php if((!isset($page)&&$thePage==1)||(isset($page)&&$thePage==$page)) echo 'class="active"'; ?> href="<?php echo $url['page'].'&page='.$thePage; ?>">
                  <span><?php echo $thePage; ?></span></a>
        <?php     $i--;
              } ?>

        <a href="#" ><span>></span></a>-->

        &nbsp;&nbsp;&nbsp;
        <span>共</span><span><?php echo $products_page_number; ?></span><span>页</span>
        &nbsp;&nbsp;&nbsp;
        <span>到</span>&nbsp;
        <form style="display: inline-block;" onsubmit="Gotopage(this);return false;">
            <input class="page-input" type="text"/>&nbsp;<span>页</span>
            &nbsp;&nbsp;&nbsp;
            <input class="page-sel-btn" type="submit" value="确定">
        </form>
        <script>
        function Gotopage( thisObj ){
            var MAX = <?php echo $products_page_number; ?>;
            var aim = parseInt($(thisObj).children('input').val());
            if( aim > MAX || aim < 1 || isNaN(aim) ) {
                alert('页数不符合要求哦');
                return false;
            }
            var url = '<?php echo $url['page'];?>'+'&page='+aim;
            location = url;
        }
        </script>
    </div>
</div>

<?php echo $footer;?>