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
        <li><a href="/index.php?route=common/home">首页</a>&nbsp;>&nbsp;</li>
        <li><a href="javascript:void(0)">账户安全</a></li>
    </ul>

    <div id="left-wrap">
        <ul class="home-nav">
            <a href="/index.php?route=account/account"><li class="userinfo-1">个人中心</li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=1"><li class="userinfo-2">已发布的宝贝<span class="goods-num"></span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=2"><li class="userinfo-2">已下架的宝贝</li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=3"><li class="userinfo-2">未鉴定的宝贝<span class="goods-num"></span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=4"><li class="userinfo-2">已鉴定的宝贝<span class="goods-num"></span></li></a>
            <a href="/index.php?route=account/wishlist"><li class="userinfo-2">收藏宝贝<span class="goods-num"></span></li></a>
            <a href="/index.php?route=account/edit"><li class="userinfo-1">编辑个人资料</li></a>
            <a href="/index.php?route=account/password"><li class="userinfo-1 userinfo-choose">账户安全</li></a>
        </ul>
    </div>

       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="form-content">

         
          <div class="row">
             
                   <span class="nes-tip">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">新密码</div>
                   <input type="text" class="price input-content" name="password" value="<?php echo $password; ?>" >
                   <?php if ($error_password) { ?>
                    <span class="error"><?php echo $error_password; ?></span>
                  <?php } ?></td>

          </div>
          <div class="row">
             
                   <span class="nes-tip">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">再次输入</div>
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