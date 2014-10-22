<?php echo $header; ?>

<div class="content">

    <ul class="bread">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>

    <div class="login-content">
        <form id="login" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="left">
                <?php if( isset($_GET['do']) && $_GET['do']=='active' )    echo '<div style="color:red;font-size:16px;margin-left:43px;margin-bottom:26px;">账户激活成功，赶快登录吧！</div><input type="hidden" name="do" value="active"/>';?>
                <?php if( isset($_GET['do']) && $_GET['do']=='active_no' ) echo '<div style="color:red;font-size:16px;margin-left:43px;margin-bottom:26px;">此为非法链接或已过期！</div>';?>
                <!-- 邮箱账号 -->
                <input type="text" name="email" value="<?php echo $email; ?>" class="login-input name-input" placeholder="请输入您的邮箱" /></br>
                <!-- 密码 -->
                <input type="password" name="password" value="<?php echo $password; ?>" class="login-input"  placeholder="请输入密码" />
                <!-- 错误提示 -->
                <?php if( $error_warning ) { echo '<div style="height:18px;color:red;font-size:16px;margin-left:43px;padding-top:22px;">'.$error_warning.'</div>'; } ?>
                <!-- 登录 -->
                <input type="submit" class="submit" value='登&nbsp;&nbsp;录' />
                <!-- 记住账号 <div class="extra"><input type="checkbox"><span class="remember">记住我</span></div>-->
            </div>
        </form>
        <div class="right">
            <div style="color:#ad8140">还没有宝库账户?</div>
            <div style="margin-top:14px;"><a style="color:#673413;text-decoration:underline" href="<?php echo $register; ?>">立即注册</a></div>
        </div>
    </div>

    <script type="text/javascript">
        $('#login input').keydown(function(e) {
            if (e.keyCode == 13) {
                $('#login').submit();
            }
        });
    </script>

</div>

<?php echo $footer; ?>