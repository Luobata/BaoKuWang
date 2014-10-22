<?php echo $header; ?><?php echo $column_left; ?>     
 <!--<?php echo $column_right; ?>
 <div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <h2><?php echo $text_password; ?></h2>
    <div class="content">
      <table class="form">
        <tr>
          <td><span class="required">*</span> <?php echo $entry_password; ?></td>
          <td><input type="password" name="password" value="<?php echo $password; ?>" />
            <?php if ($error_password) { ?>
            <span class="error"><?php echo $error_password; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_confirm; ?></td>
          <td><input type="password" name="confirm" value="<?php echo $confirm; ?>" />
            <?php if ($error_confirm) { ?>
            <span class="error"><?php echo $error_confirm; ?></span>
            <?php } ?></td>
        </tr>
      </table>
    </div>
    <div class="buttons">
      <div class="left"><a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a></div>
      <div class="right"><input type="submit" value="<?php echo $button_continue; ?>" class="button" /></div>
    </div>
  </form>
  <?php echo $content_bottom; ?></div> -->

  <div class="content">
       <ul class="bread">
      <li><a href="">首页 >&nbsp</a></li>
      <li><a href="">个人中心 >&nbsp</a></li>
      <li><a href="">编辑个人资料</a></li>
       </ul>  
<div class="left">
        <ul class="home-nav">
          <li id="user-name"><a href="userhome.html">于先生的宝贝</a></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=1">已发布的宝贝</a><span class="goods-num"></span></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=2">已下架的宝贝</a></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=3">未鉴定的宝贝</a><span class="goods-num"></span></li>
          <li><a href="./index.php?route=account/wishlist/postgoods&type=4">已鉴定的宝贝</a><span class="goods-num"></span></li>
          <li ><a href="./index.php?route=account/wishlist">收藏宝贝</a><span class="goods-num"></span></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="./index.php?route=account/edit">编辑个人资料</a></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="./index.php?route=account/password">账户安全</a></li>
        </ul>
 </div>

       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="form-content">

         
          <div class="row">
             
                   <span class="nes-tip">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">输入密码</div>
                   <input type="text" class="price input-content" name="password" value="<?php echo $password; ?>" >
                   <?php if ($error_password) { ?>
                    <span class="error"><?php echo $error_password; ?></span>
                  <?php } ?></td>

          </div>
          <div class="row">
             
                   <span class="nes-tip">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">确认密码</div>
                   <input type="text" class="price input-content"  name="confirm" value="<?php echo $confirm; ?>">
                   <?php if ($error_confirm) { ?>
            <span class="error"><?php echo $error_confirm; ?></span>
            <?php } ?></td>
          </div>
                  <input type="submit" value="提交修改" class="submit-btn">
          </div>
       </form>

    </div>  
<?php echo $footer; ?>