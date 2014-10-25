<?php echo $header; ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<!--<?php echo $column_left; ?><?php echo $column_right; ?>
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
      <li><a href="">首页 >&nbsp</a></li>
      <li><a href="">个人中心 >&nbsp</a></li>
      <li><a href="">编辑个人资料</a></li>
       </ul>  
     <div class="left">
        <ul class="home-nav">
          <li id="user-name"><a href="./index.php?route=account/account">个人中心</a></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=1">已发布的宝贝</a><span class="goods-num"></span></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=2">已下架的宝贝</a></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=3">未鉴定的宝贝</a><span class="goods-num"></span></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=4">已鉴定的宝贝</a><span class="goods-num"></span></li>
          <li ><a href="./index.php?route=account/wishlist">收藏宝贝</a><span class="goods-num"></span></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="./index.php?route=account/edit">编辑个人资料</a></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="./index.php?route=account/password">账户安全</a></li>
        </ul>
 </div>

       
          <div class="form-content">

          <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">用户名</div>
                   <input type="text" class="htitle input-content" value="<?php echo$email;?>" style="color:#ccc"readonly>
                
          </div>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">真实姓名</div>
                   <input type="text" class="price input-content" name="name" value="<?php echo $name;?>">
                    <?php if($error_name) {?>
                        <span class="error"><?php echo $error_name; ?></span>
                        <?php } ?></td>

          </div>

                <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <span class="input-title">性别</span>  
                   <?php if($sex){;?>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="0" >男</input>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="1" checked>女</input>
                 <?php }else{ ;?>
                 <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="0" checked>男</input>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;"name="sex" value="1" >女</input>
                   <?php };?>
                  </div>


                

                  <div class="row" style="margin-top:10px">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">所在区域</span>
                       <select class="input-content area-select" name="zone">
                        <option><?php echo $zone;?></option>
                     <!--    <option>北京</option>
                        <option>上海</option> -->
                        <?php foreach ($zones as $zone) {?>
                          <option><?php echo$zone['name'];?></option>
                       <?php  }?>
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
                      <?php if($error_place) {?>
                        <span class="error"><?php echo $error_place; ?></span>
                        <?php } ?></td>
                  </div>
                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">联系电话</span>
                       <input type="text" name="telephone" class="input-content" value="<?php echo $telephone; ?>" />
                       <span class="input-tip">* 请填写真实号码，以便买家联系您</span>
                        <?php if ($error_telephone) { ?>
                        <span class="error"><?php echo $error_telephone; ?></span>
                        <?php } ?></td>
                  </div>
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">QQ&nbsp;号码</span>
                       <input type="text" class="input-content" name="qq" value="<?php echo $qq; ?>">
                       <span class="input-tip">* 用于商品页面买家与您临时沟通</span>
                       <?php if($error_qq) {?>
                        <span class="error"><?php echo $error_qq; ?></span>
                        <?php } ?></td>
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                       <input type="text" class="input-content" name="wechat" value="<?php echo $wechat; ?>">
                       <span class="input-tip">* 用于在商品页面显示，方便买家沟通</span>
                       <?php if($error_wechat) {?>
                        <span class="error"><?php echo $error_wechat; ?></span>
                        <?php } ?></td>
                  </div>




                  <input type="submit" value="提交个人资料" class="submit-btn">


          </div>
       </form>

    </div>  
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>