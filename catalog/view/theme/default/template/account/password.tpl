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
            <a href="/index.php?route=account/wishlist/postgoods&type=1"><li class="userinfo-2 <?php if($type==1) echo 'userinfo-choose'; ?>">已发布的宝贝<span class="goods-num">(<?php echo$postnum['up'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=2"><li class="userinfo-2 <?php if($type==2) echo 'userinfo-choose'; ?>">已下架的宝贝<span class="goods-num">(<?php echo$postnum['down'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=3"><li class="userinfo-2 <?php if($type==3) echo 'userinfo-choose'; ?>">未鉴定的宝贝<span class="goods-num">(<?php echo$postnum['uniden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist/postgoods&type=4"><li class="userinfo-2 <?php if($type==4) echo 'userinfo-choose'; ?>">已鉴定的宝贝<span class="goods-num">(<?php echo$postnum['iden'];?>)</span></li></a>
            <a href="/index.php?route=account/wishlist"><li class="userinfo-2 <?php if(!isset($type)) echo 'userinfo-choose'; ?>">收藏宝贝<span class="goods-num">(<?php echo$postnum['wishlist'];?>)</span></li></a>
            <a href="/index.php?route=account/edit"><li class="userinfo-1">编辑个人资料</li></a>
            <a href="/index.php?route=account/password"><li class="userinfo-1">账户安全</li></a>
        </ul>
    </div>

       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="form-content">

         <div class="row">
             
                   <span class="nes-tip">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">旧密码</div>
                   <input type="text" class="price input-content" name="oldpassword" value="<?php echo $oldpassword; ?>" >
                   <?php if ($error_oldpassword) { ?>
                    <span class="error"><?php echo $error_oldpassword; ?></span>
                  <?php } ?></td>

          </div>   
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
          <div class="row">
               <span class="nes-tip"></span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <div class="input-title"><a href="javascript:passfor()" style="text-decoration: underline;">忘记密码？</a></div>
          </div>
            <input type="submit" value="提交修改" class="submit-btn">
          </div>
       </form>

    </div>  
<script type="text/javascript">
  function passfor(){
    $.MsgBox.Alert("消息提醒","忘记密码了？不要担心！<br/>赶紧联系我们为您解决：010-64814142");
  }

</script>
<?php echo $footer; ?>