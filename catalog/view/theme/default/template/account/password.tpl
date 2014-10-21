<?php echo $header; ?><?php echo $column_left; ?>      <?php echo $column_right; ?>
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
  <?php echo $content_bottom; ?></div>

  <div class="content">
       <ul class="bread">
      <li><a href="">首页 >&nbsp</a></li>
      <li><a href="">个人中心 >&nbsp</a></li>
      <li><a href="">编辑个人资料</a></li>
       </ul>  

              <div class="left">
        <ul class="home-nav">
          <li id="user-name"><a href="userhome.html">于先生的宝贝</a></li>
          <li><a href="">已发布的宝贝</a><span class="goods-num">5</span></li>
          <li><a href="">已鉴定的宝贝</a></li>
          <li><a href="">未鉴定的宝贝</a><span class="goods-num">20</span></li>
          <li><a href="">已下架的宝贝</a><span class="goods-num">5</span></li>
          <li ><a href="">收藏宝贝</a><span class="goods-num">5</span></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="<?php echo $edit; ?>">编辑个人资料</a></li>
          <li class="userinfo" style="height: 60px;line-height: 60px;"><a href="<?php echo $password; ?>">账户安全</a></li>
        </ul>
 </div> 

       <form>
          <div class="form-content">

          <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">用户名</div>
                   <input type="text" class="htitle input-content" value="余先生" style="color:#ccc"readonly>
                
          </div>
          <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <div class="input-title">真实姓名</div>
                   <input type="text" class="price input-content">
                 

          </div>

                <div class="row">
             
                   <span class="nes-tip none">*</span>
                   &nbsp;&nbsp;&nbsp;
                   <span class="input-title">性别</span>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;">男</input>
                   <input type="radio" style="margin-left: 20px;margin-right: 10px;">女</input>
                  </div>


                

                  <div class="row" style="margin-top:10px">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">所在区域</span>
                       <select class="input-content area-select">
                        <option>省份</option>
                        <option>北京</option>
                        <option>上海</option>
                       </select>

                        
                       <select class="input-content area-select">
                        <option>城市</option>
                        <option>北京</option>
                       
                       </select>

                         <select class="input-content area-select">
                        <option>区/县</option>
                        <option>北京</option>
                       
                       </select>
                  </div>

                   
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">详细地址</span>
                       <input type="text" class="input-content">
                     
                  </div>
                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">联系电话</span>
                       <input type="text" class="input-content">
                       <span class="input-tip">* 请填写真实号码，以便买家联系您</span>
                  </div>
                   <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">QQ&nbsp;号码</span>
                       <input type="text" class="input-content">
                       <span class="input-tip">* 用于商品页面买家与您临时沟通</span>
                  </div>

                  <div class="row">
                             <span class="nes-tip none">*</span>
                        &nbsp;&nbsp;&nbsp;
                       <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                       <input type="text" class="input-content">
                       <span class="input-tip">* 用于在商品页面显示，方便买家与您沟通</span>
                  </div>




                  <input type="submit" value="提交个人资料" class="submit-btn">


          </div>
       </form>

    </div>  
<?php echo $footer; ?>