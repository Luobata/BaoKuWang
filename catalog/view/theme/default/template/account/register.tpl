<?php echo $header; ?>

<div class="content">

    <ul class="bread">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>

    <div class="login-content">
        <form action="<?php echo $action; ?>" id="account_form" onsubmit="validate();return false;" method="post" enctype="multipart/form-data">
            <div class="left">
                <input name="email" class="login-input name-input" placeholder="请输入邮箱作为账号" value="<?php echo $email;?>"><br/>
                <input name="password" type="password" class="login-input name-input"  placeholder="请输入密码" value="<?php echo $password;?>"><br/>
                <input name="confirm" type="password" class="login-input password-input"  placeholder="请再次输入密码" value="<?php echo $confirm;?>"><br/>
                <!-- 验证码部分-->
                <input id="yanzhengma" type="text" class="login-input" placeholder="请输入验证码" style="width: 160px" />
                <img onclick="$(this).attr('src','/system/helper/yanzhengma.php?' + Math.random());" src="/system/helper/yanzhengma.php" style="height: 25px;position: relative;left: 30px;top: 6px;cursor: pointer;"/>
                <a style="position:relative;left: 40px;">点击图片刷新</a>
                <!-- <input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged" style="width: 80px"  /><br />-->
                <!-- 错误提示 -->
                <?php if(!empty($error)) { echo '<div style="height:18px;color:red;font-size:16px;margin-left:43px;padding-top:22px;">'.$error[0].'</div>'; } ?>
                <br/><input type="submit" class="submit" value='注&nbsp;&nbsp;册' />
                <!-- 隐藏submit框通过js submit-->
                <!-- <input type="submit" class="submit2"  value='登&nbsp;&nbsp;录' style="display:none;" />-->
            </div>
        </form>
        <div class="right">
            <div style="color:#ad8140">已有宝库账户?</div>
            <div style="margin-top:14px;"><a style="color:#673413;text-decoration:underline" href="/index.php?route=account/login">立即登录</a></div>
        </div>
    </div>

</div>
 
<?php echo $footer; ?>