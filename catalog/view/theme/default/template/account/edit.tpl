<?php echo $header; ?>

        <!--
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
 <div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <h2><?php echo $text_your_details; ?></h2>
    <div class="content">
      <table class="form">
        <tr>
          <td><span class="required">*</span> <?php echo $entry_firstname; ?></td>
          <td><input type="text" name="firstname" value="<?php echo $firstname; ?>" />
            <?php if ($error_firstname) { ?>
            <span class="error"><?php echo $error_firstname; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_lastname; ?></td>
          <td><input type="text" name="lastname" value="<?php echo $lastname; ?>" />
            <?php if ($error_lastname) { ?>
            <span class="error"><?php echo $error_lastname; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_email; ?></td>
          <td><input type="text" name="email" value="<?php echo $email; ?>" />
            <?php if ($error_email) { ?>
            <span class="error"><?php echo $error_email; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_telephone; ?></td>
          <td><input type="text" name="telephone" value="<?php echo $telephone; ?>" />
            <?php if ($error_telephone) { ?>
            <span class="error"><?php echo $error_telephone; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $entry_fax; ?></td>
          <td><input type="text" name="fax" value="<?php echo $fax; ?>" /></td>
        </tr>
      </table>
    </div>
    <div class="buttons">
      <div class="left"><a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a></div>
      <div class="right">
        <input type="submit" value="<?php echo $button_continue; ?>" class="button" />
      </div>
    </div>
  </form> -->
  <div class="content">

      <ul class="bread">
          <li><a href="/index.php?route=common/home">首页</a>&nbsp;>&nbsp;</li>
          <li><a href="javascript:void(0)">编辑个人资料</a></li>
      </ul>

      <div id="left-wrap">
        <ul class="home-nav">
            <a href="/index.php?route=account/account"><li class="userinfo-1">个人中心</li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=1"><li class="userinfo-2">已发布的宝贝<span class="goods-num">(<?php echo$postnum['up'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=2"><li class="userinfo-2">已下架的宝贝<span class="goods-num">(<?php echo$postnum['down'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=3"><li class="userinfo-2">未鉴定的宝贝<span class="goods-num">(<?php echo$postnum['uniden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=4"><li class="userinfo-2">已鉴定的宝贝<span class="goods-num">(<?php echo$postnum['iden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist"><li class="userinfo-2">收藏宝贝<span class="goods-num">(<?php echo$postnum['wishlist'];?>)</span></li></a>
            <a href="/index.php?route=account/edit"><li class="userinfo-1">编辑个人资料</li></a>
            <a href="/index.php?route=account/password"><li class="userinfo-1">账户安全</li></a>
        </ul>
    </div>

          <div class="form-content">


        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

            <div class="row">

                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <div class="input-title">用户名</div>
                <input type="text" name="email" class="htitle input-content" value="<?php echo$email;?>" style="color:#ccc"readonly>

            </div>

          <div class="row">
               <span class="nes-tip none">*</span>
               &nbsp;&nbsp;&nbsp;
               <div class="input-title">真实姓名</div>
               <input type="text" class="price input-content" name="name" value="<?php echo $name;?>" />
                <?php if($error_name) { ?>
                <br/><div class="error"><?php echo $error_name; ?></div>
                <?php } ?>
          </div>

            <div class="row">
                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <div class="input-title">宝友昵称</div>
                <input type="text" class="price input-content" name="nickname" value="<?php echo $nickname;?>" />
                <?php if($error_nickname) { ?>
                <br/><div class="error"><?php echo $error_nickname; ?></div>
                <?php } ?>
            </div>

                <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <span class="input-title">性别</span>  
                   <?php if($sex){;?>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="1" checked>男</input>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="0" >女</input>
                 <?php }else{ ;?>
                 <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="1" >男</input>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="0" checked>女</input>
                   <?php };?>
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">所在区域</span>
                       <select class="input-content area-select" name="zone">
                       <?php foreach ($zones as $zone) { ?>
                       <option value="<?php echo $zone['name'];?>" <?php if($zone['name']=='北京') echo 'selected="selected"';?>><?php echo $zone['name'];?></option>
                       <?php }?>
                       </select>

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
                       <span class="input-title">详细地址</span>
                       <input type="text" class="input-content" name="place"value="<?php echo $place; ?>">
                      <?php if($error_place) { ?>
                        <br/><div class="error"><?php echo $error_place; ?></div>
                        <?php } ?>
                  </div>
                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">联系电话</span>
                       <input type="text" name="telephone" class="input-content" value="<?php echo $telephone; ?>" />
                       <span class="input-tip">* 请填写真实号码，以便买家联系您</span>
                        <?php if ($error_telephone) { ?>
                      <br/><div class="error"><?php echo $error_telephone; ?></div>
                        <?php } ?>
                  </div>
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">QQ&nbsp;号码</span>
                       <input type="text" class="input-content" name="qq" value="<?php echo $qq; ?>">
                       <span class="input-tip">* 用于商品页面买家与您临时沟通</span>
                       <?php if($error_qq) { ?>
                       <br/><div class="error"><?php echo $error_qq; ?></div>
                        <?php } ?>
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                       <input type="text" class="input-content" name="wechat" value="<?php echo $wechat; ?>">
                       <span class="input-tip">* 用于在商品页面显示，方便买家沟通</span>
                       <?php if($error_wechat) { ?>
                       <br/><div class="error"><?php echo $error_wechat; ?></div>
                        <?php } ?>
                  </div>

                  <input type="submit" value="提交个人资料" class="submit-btn">

          </div>
       </form>

    </div>  
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>