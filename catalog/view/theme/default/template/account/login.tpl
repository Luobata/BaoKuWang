<?php echo $header; ?>

<div class="content">

    <ul class="bread">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>

    <div class="login-content" >
        <form action="<?php echo $action; ?>" id="account_form" onsubmit="validate();return false;" method="post" enctype="multipart/form-data">
            <div class="left">
                <?php if( isset($_GET['do']) && $_GET['do']=='active' )    echo '<div style="color:red;font-size:16px;margin-left:43px;margin-bottom:26px;">账户激活成功，赶快登录吧！</div><input type="hidden" name="do" value="active"/>';?>
                <?php if( isset($_GET['do']) && $_GET['do']=='active_no' ) echo '<div style="color:red;font-size:16px;margin-left:43px;margin-bottom:26px;">此为非法链接或已过期！</div>';?>
                <!-- 邮箱账号 -->
                <input type="text" name="email" value="<?php echo $email; ?>" class="login-input name-input" placeholder="请输入您的邮箱" /></br>
                <!-- 密码 -->
                <input type="password" name="password" value="<?php echo $password; ?>" class="login-input password-input"  placeholder="请输入密码" />
                <!-- 验证码部分-->
                <input id="yanzhengma" type="text" class="login-input" placeholder="请输入验证码" style="width: 160px" />
                <img onclick="$(this).attr('src','/system/helper/yanzhengma.php?' + Math.random());" src="/system/helper/yanzhengma.php" style="cursor: pointer;height: 25px;position: relative;left: 30px;top: 6px;"/>
                <a style="position:relative;left: 40px;">点击图片刷新</a>
                <!--<input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged" style="width: 80px"  /><br />-->
                <!-- 错误提示 -->
                <?php if( $error_warning ) { echo '<div style="height:18px;color:red;font-size:16px;margin-left:43px;padding-top:22px;">'.$error_warning.'</div>'; } ?>
                <!-- 登录 -->
                <br/><input type="submit" class="submit" value='登&nbsp;&nbsp;录' />
                <!-- 隐藏submit框通过js submit-->
                <!-- <input type="submit" class="submit2"  value='登&nbsp;&nbsp;录'/>-->
                <!-- 记住账号 <div class="extra"><input type="checkbox"><span class="remember">记住我</span></div>-->
            </div>
        </form>
        <div class="right">
            <div style="color:#ad8140">还没有宝库账户?</div>
            <div style="margin-top:14px;"><a style="color:#673413;text-decoration:underline" href="<?php echo $register; ?>">立即注册</a></div>
        </div>
    </div>

</div>

<?php echo $footer; ?>