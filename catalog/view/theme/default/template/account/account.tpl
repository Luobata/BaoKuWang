<?php echo $header; ?>      
<!-- <?php echo $column_right; ?>-->
<?php echo $column_left; ?>
<!-- <div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <h2><?php echo $text_my_account; ?></h2>
  <div class="content">
    <ul>
      <li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
      <li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
      <li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
      <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
    </ul>
  </div>
  <h2><?php echo $text_my_orders; ?></h2>
  <div class="content">
    <ul>
      <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
      <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
      <?php if ($reward) { ?>
      <li><a href="<?php echo $reward; ?>"><?php echo $text_reward; ?></a></li>
      <?php } ?>
      <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
      <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
      <li><a href="<?php echo $recurring; ?>"><?php echo $text_recurring; ?></a></li>
    </ul>
  </div>
  <h2><?php echo $text_my_newsletter; ?></h2>
  <div class="content">
    <ul>
      <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
    </ul>
  </div>
  <?php echo $content_bottom; ?></div> -->

  <div class="content">
       <ul class="bread">
          <li><a href="/index.php?route=common/home">首页</a>&nbsp;>&nbsp;</li>
          <li><a href="javascript:void(0)">个人中心</a></li>
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

       <form>
          <div class="form-content">

          <?php if ($success) { ?>
              <div class="row" style="color:red;position:relative;bottom:10px;padding-left:65px;">
                <div class="success"><?php echo $success; ?></div>
              </div>
          <?php } ?>

          <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">用户名：</div>
                   <input type="text" class="htitle input-content" value="<?php echo $customer_info['email'];?>" style="color:#ccc"readonly>
                    
          </div>
          <div class="row">
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">真实姓名：</div>
                   <span class="customer_info"><?php echo $customer_info['name'] ;?></span>
          </div>

              <div class="row">
                  <span class="nes-tip none">*</span>
                  &nbsp;&nbsp;&nbsp;
                  <div class="input-title">宝友昵称：</div>
                  <span class="customer_info"><?php echo $customer_info['nickname'] ;?></span>
              </div>

                <div class="row">
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <span class="input-title">性别：</span>
                   <span class="customer_info"><?php echo ($customer_info['sex']==1)?'男':'女'; ?></span>
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">所在区域：</span>
                        <span class="customer_info"><?php echo $customer_info['zone'] ;?></span>
                      <!--
                       <select class="input-content area-select">
                        <option>省份</option>
                        <option>北京</option>
                        <option>上海</option>
                       </select>
                       -->

                       <!--  
                       <select class="input-content area-select">
                        <option>城市</option>
                        <option>北京</option>
                       
                       </select>

                         <select class="input-content area-select">
                        <option>区/县</option>
                        <option>北京</option> -->
                       
                       </select>
                  </div>

                   
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">详细地址：</span>
                       <span class="customer_info"><?php echo $customer_info['place'] ;?></span>
                       <!-- <input type="text" class="input-content"> -->
                     
                  </div>
                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">联系电话：</span>
                      <span class="customer_info"><?php echo $customer_info['telephone'] ;?></span>
                      <!--
                      <input type="text" class="input-content">
                       <span class="input-tip">* 请填写真实号码，以便买家联系您</span>
                       -->
                  </div>
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">QQ&nbsp;号码：</span>
                       <span class="customer_info"><?php echo $customer_info['qq'] ;?></span>
                       <!--<input type="text" class="input-content">
                       <span class="input-tip">* 用于商品页面买家与您临时沟通</span>-->
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">微&nbsp;信&nbsp;&nbsp;号：</span>
                      <span class="customer_info"><?php echo $customer_info['wechat'] ;?></span>
                      <!--
                       <input type="text" class="input-content">
                       <span class="input-tip">* 用于在商品页面显示，方便买家与您沟通</span>-->
                  </div>




                  <!-- <input type="submit" value="提交个人资料" class="submit-btn"> -->


          </div>
       </form>

    </div>  
<?php echo $footer; ?> 