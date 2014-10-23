<?php echo $header; ?>
<!-- <?php echo $column_left; ?>
<?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1> -->
  <div class="content" 
style="border: 1px;
border-color: #e9dcc5;
border-style: solid;
margin-top:20px;
padding:10px;">
    <?php echo $text_error; ?>
  <div class="buttons"style="margin-top: 10px;">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo "点击按钮返回首页"; ?></a>
    </div>
  </div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>