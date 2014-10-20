<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/product.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a><!--<a onclick="$('#form').attr('action', '<?php echo $copy; ?>'); $('#form').submit();" class="button"><?php echo $button_copy; ?></a>--><a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
                <td class="center">图片</td>
                <td class="left">ID</td>
                <td class="left">序列号</td>
                <td class="left">名称</td>
                <td class="left">价格</td>
                <td class="left">寄卖人</td>
                <td class="left">手机</td>
                <td class="left">QQ</td>
                <td class="left">微信号</td>
                <td class="left">特卖</td>
                <td class="left">鉴定</td>
              <!--
              <td class="center"><?php echo $column_image; ?></td>
              <td class="left"><?php if ($sort == 'pd.name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'p.model') { ?>
                <a href="<?php echo $sort_model; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_model; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_model; ?>"><?php echo $column_model; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'p.price') { ?>
                <a href="<?php echo $sort_price; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_price; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_price; ?>"><?php echo $column_price; ?></a>
                <?php } ?></td>
              <td class="right"><?php if ($sort == 'p.quantity') { ?>
                <a href="<?php echo $sort_quantity; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_quantity; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_quantity; ?>"><?php echo $column_quantity; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'p.status') { ?>
                <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                <?php } ?></td>
              -->
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
                <td></td>
                <td></td>
                <td><input type="text" style="width:50px;" name="filter_id" value="<?php echo $filter_id; ?>" /></td>
                <td><input type="text" style="width:240px;" name="filter_serial" value="<?php echo $filter_serial; ?>" /></td>
                <td><input type="text" name="filter_title" value="<?php echo $filter_title; ?>" /></td>
                <td><input type="text" style="width:60px;" name="filter_price" value="<?php echo $filter_price; ?>" /></td>
                <td><input type="text" style="width:60px;" name="filter_owner" value="<?php echo $filter_owner; ?>" /></td>
                <td><input type="text" style="width:85px;" name="filter_mobile" value="<?php echo $filter_mobile; ?>" /></td>
                <td><input type="text" style="width:95px;" name="filter_qq" value="<?php echo $filter_qq; ?>" /></td>
                <td><input type="text" style="width:80px;" name="filter_wechat" value="<?php echo $filter_wechat; ?>" /></td>
                <td><input type="text" style="width:15px;" name="filter_sale" value="<?php echo $filter_sale; ?>" /></td>
                <td><input type="text" style="width:15px;" name="filter_identify" value="<?php echo $filter_identify; ?>" /></td>
                <td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>

              <!--
              <td><input type="text" name="filter_name" value="<?php echo $filter_name; ?>" /></td>
              <td><input type="text" name="filter_model" value="<?php echo $filter_model; ?>" /></td>
              <td align="left"><input type="text" name="filter_price" value="<?php echo $filter_price; ?>" size="8"/></td>
              <td align="right"><input type="text" name="filter_quantity" value="<?php echo $filter_quantity; ?>" style="text-align: right;" /></td>
              <td><select name="filter_status">
                  <option value="*"></option>
                  <?php if ($filter_status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <?php } ?>
                  <?php if (!is_null($filter_status) && !$filter_status) { ?>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              -->
            </tr>
            <?php if ($products) { ?>
            <?php foreach ($products as $product) { ?>
            <tr>
                <td style="text-align: center;"><?php if ($product['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $product['id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $product['id']; ?>" />
                <?php } ?>
                </td>
                <td class="center"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="padding: 1px; border: 1px solid #DDDDDD;" /></td>
                <td class="left"><?php echo $product['id']; ?></td>
                <td class="left"><?php echo $product['serial']; ?></td>
                <td class="left"><?php echo $product['title']; ?></td>
                <td class="left"><?php echo $product['price']; ?></td>
                <td class="left"><?php echo $product['owner']; ?></td>
                <td class="left"><?php echo $product['mobile']; ?></td>
                <td class="left"><?php echo $product['qq']; ?></td>
                <td class="left"><?php echo $product['wechat']; ?></td>
                <td class="left"><?php echo $product['sale']; ?></td>
                <td class="left"><?php echo $product['identify']; ?></td>
                <td class="right"><?php foreach ($product['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>

              <!--
              <td class="left"><?php echo $product['name']; ?></td>
              <td class="left"><?php echo $product['model']; ?></td>
              <td class="left"><?php if ($product['special']) { ?>
                <span style="text-decoration: line-through;"><?php echo $product['price']; ?></span><br/>
                <span style="color: #b00;"><?php echo $product['special']; ?></span>
                <?php } else { ?>
                <?php echo $product['price']; ?>
                <?php } ?></td>
              <td class="right"><?php if ($product['quantity'] <= 0) { ?>
                <span style="color: #FF0000;"><?php echo $product['quantity']; ?></span>
                <?php } elseif ($product['quantity'] <= 5) { ?>
                <span style="color: #FFA500;"><?php echo $product['quantity']; ?></span>
                <?php } else { ?>
                <span style="color: #008000;"><?php echo $product['quantity']; ?></span>
                <?php } ?></td>
              <td class="left"><?php echo $product['status']; ?></td>
              <td class="right"><?php foreach ($product['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>
              -->
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="13"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript">
function filter() {
    //设置链接
	url = 'index.php?route=catalog/product&token=<?php echo $token; ?>';

    var filter_id = $('input[name=\'filter_id\']').attr('value');
    if (filter_id) {
        url += '&filter_id=' + encodeURIComponent(filter_id);
    }

    var filter_serial = $('input[name=\'filter_serial\']').attr('value');
    if (filter_serial) {
        url += '&filter_serial=' + encodeURIComponent(filter_serial);
    }

    var filter_title = $('input[name=\'filter_title\']').attr('value');
    if (filter_title) {
        url += '&filter_title=' + encodeURIComponent(filter_title);
    }

    var filter_price = $('input[name=\'filter_price\']').attr('value');
    if (filter_price) {
        url += '&filter_price=' + encodeURIComponent(filter_price);
    }

    var filter_owner = $('input[name=\'filter_owner\']').attr('value');
    if (filter_owner) {
        url += '&filter_owner=' + encodeURIComponent(filter_owner);
    }

    var filter_mobile = $('input[name=\'filter_mobile\']').attr('value');
    if (filter_mobile) {
        url += '&filter_mobile=' + encodeURIComponent(filter_mobile);
    }

    var filter_qq = $('input[name=\'filter_qq\']').attr('value');
    if (filter_qq) {
        url += '&filter_qq=' + encodeURIComponent(filter_qq);
    }

    var filter_wechat = $('input[name=\'filter_wechat\']').attr('value');
    if (filter_wechat) {
        url += '&filter_wechat=' + encodeURIComponent(filter_wechat);
    }

    var filter_sale = $('input[name=\'filter_sale\']').attr('value');
    if (filter_sale) {
        url += '&filter_sale=' + encodeURIComponent(filter_sale);
    }

    var filter_identify = $('input[name=\'filter_identify\']').attr('value');
    if (filter_identify) {
        url += '&filter_identify=' + encodeURIComponent(filter_identify);
    }

    //跳转页面
    location = url;
}
</script>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		filter();
	}
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_name\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('input[name=\'filter_name\']').val(ui.item.label);
						
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});

$('input[name=\'filter_model\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_model=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.model,
						value: item.product_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('input[name=\'filter_model\']').val(ui.item.label);
						
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
//--></script> 
<?php echo $footer; ?>