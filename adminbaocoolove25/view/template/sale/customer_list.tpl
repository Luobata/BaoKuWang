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
      <h1><img src="view/image/customer.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><!--<a onclick="$('form').attr('action', '<?php echo $approve; ?>'); $('form').submit();" class="button"><?php echo $button_approve; ?></a>--><a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a><a onclick="$('form').attr('action', '<?php echo $delete; ?>'); $('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data" id="form">
        <table class="list">


          <thead>
            <tr>
                <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
                <td class="left">账户</td>
                <td class="left">姓名</td>
                <td class="left">性别</td>
                <td class="left">地区</td>
                <td class="left">详细地址</td>
                <td class="left">联系电话</td>
                <td class="left">QQ</td>
                <td class="left">微信号</td>
                <td class="left">状态</td>
                <td class="right">操作</td>
              <!--
              <td class="left"><?php if ($sort == 'c.email') { ?>
                <a href="<?php echo $sort_email; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_email; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_email; ?>"><?php echo $column_email; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'customer_group') { ?>
                <a href="<?php echo $sort_customer_group; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_customer_group; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_customer_group; ?>"><?php echo $column_customer_group; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'c.status') { ?>
                <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'c.approved') { ?>
                <a href="<?php echo $sort_approved; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_approved; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_approved; ?>"><?php echo $column_approved; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'c.ip') { ?>
                <a href="<?php echo $sort_ip; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_ip; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_ip; ?>"><?php echo $column_ip; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'c.date_added') { ?>
                <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                <?php } ?></td>
              <td class="left"><?php echo $column_login; ?></td>
              <td class="right"><?php echo $column_action; ?></td>
              -->
            </tr>
          </thead>


          <tbody>
            <tr class="filter">
                <td></td>
                <td><input type="text" style="width:160px;" name="filter_email" value="<?php echo $filter_email; ?>" /></td>
                <td><input type="text" style="width:70px;" name="filter_name" value="<?php echo $filter_name; ?>" /></td>
                <td><input type="text" style="width:35px;" name="filter_sex" value="<?php echo $filter_sex; ?>" /></td>
                <td><input type="text" style="width:60px;" name="filter_zone" value="<?php echo $filter_zone; ?>" /></td>
                <td><input type="text" name="filter_place" value="<?php echo $filter_place; ?>" /></td>
                <td><input type="text" style="width:110px;" name="filter_telephone" value="<?php echo $filter_telephone; ?>" /></td>
                <td><input type="text" style="width:130px;" name="filter_qq" value="<?php echo $filter_qq; ?>" /></td>
                <td><input type="text" style="width:100px;" name="filter_wechat" value="<?php echo $filter_wechat; ?>" /></td>
                <td><input type="text" style="width:35px;" name="filter_status" value="<?php echo $filter_status; ?>" /></td>
                <td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>

              <!--
              <td><input type="text" name="filter_name" value="<?php echo $filter_name; ?>" /></td>
              <td><input type="text" name="filter_email" value="<?php echo $filter_email; ?>" /></td>
              <td><select name="filter_customer_group_id">
                  <option value="*"></option>
                  <?php foreach ($customer_groups as $customer_group) { ?>
                  <?php if ($customer_group['customer_group_id'] == $filter_customer_group_id) { ?>
                  <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
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
              <td><select name="filter_approved">
                  <option value="*"></option>
                  <?php if ($filter_approved) { ?>
                  <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_yes; ?></option>
                  <?php } ?>
                  <?php if (!is_null($filter_approved) && !$filter_approved) { ?>
                  <option value="0" selected="selected"><?php echo $text_no; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_no; ?></option>
                  <?php } ?>
                </select></td>
              <td><input type="text" name="filter_ip" value="<?php echo $filter_ip; ?>" /></td>
              <td><input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" size="12" id="date" /></td>
              <td></td>
              <td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>-->
            </tr>



            <?php if ($customers) { ?>
            <?php foreach ($customers as $customer) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($customer['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $customer['customer_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $customer['customer_id']; ?>" />
                <?php } ?></td>

              <td class="left"><?php echo $customer['email']; ?></td>
              <td class="left"><?php echo $customer['name']; ?></td>
              <td class="left"><?php echo $customer['sex']; ?></td>
              <td class="left"><?php echo $customer['zone']; ?></td>
              <td class="left"><?php echo $customer['place']; ?></td>
              <td class="left"><?php echo $customer['telephone']; ?></td>
              <td class="left"><?php echo $customer['qq']; ?></td>
              <td class="left"><?php echo $customer['wechat']; ?></td>
              <td class="left"><?php echo $customer['status']; ?></td>
              <td class="right"><?php foreach ($customer['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>

              <!--
              <td class="left"><select onchange="((this.value !== '') ? window.open('index.php?route=sale/customer/login&token=<?php echo $token; ?>&customer_id=<?php echo $customer['customer_id']; ?>&store_id=' + this.value) : null); this.value = '';">
                  <option value=""><?php echo $text_select; ?></option>
                  <option value="0"><?php echo $text_default; ?></option>
                  <?php foreach ($stores as $store) { ?>
                  <option value="<?php echo $store['store_id']; ?>"><?php echo $store['name']; ?></option>
                  <?php } ?>
                </select></td>-->

            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="11"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>


<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=sale/customer&token=<?php echo $token; ?>';

    var filter_email = $('input[name=\'filter_email\']').attr('value');

    if (filter_email) {
        url += '&filter_email=' + encodeURIComponent(filter_email);
    }

	var filter_name = $('input[name=\'filter_name\']').attr('value');
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}

    var filter_sex = $('input[name=\'filter_sex\']').attr('value');

    if (filter_sex) {
        url += '&filter_sex=' + encodeURIComponent(filter_sex);
    }

    var filter_zone = $('input[name=\'filter_zone\']').attr('value');

    if (filter_zone) {
        url += '&filter_zone=' + encodeURIComponent(filter_zone);
    }

    var filter_place = $('input[name=\'filter_place\']').attr('value');

    if (filter_place) {
        url += '&filter_place=' + encodeURIComponent(filter_place);
    }

    var filter_telephone = $('input[name=\'filter_telephone\']').attr('value');

    if (filter_telephone) {
        url += '&filter_telephone=' + encodeURIComponent(filter_telephone);
    }

    var filter_qq = $('input[name=\'filter_qq\']').attr('value');

    if (filter_qq) {
        url += '&filter_qq=' + encodeURIComponent(filter_qq);
    }

    var filter_wechat = $('input[name=\'filter_wechat\']').attr('value');

    if (filter_wechat) {
        url += '&filter_wechat=' + encodeURIComponent(filter_wechat);
    }

    var filter_status = $('input[name=\'filter_status\']').attr('value');

    if (filter_status) {
        url += '&filter_status=' + encodeURIComponent(filter_status);
    }

    /*
	var filter_customer_group_id = $('select[name=\'filter_customer_group_id\']').attr('value');
	
	if (filter_customer_group_id != '*') {
		url += '&filter_customer_group_id=' + encodeURIComponent(filter_customer_group_id);
	}	

	var filter_approved = $('select[name=\'filter_approved\']').attr('value');
	
	if (filter_approved != '*') {
		url += '&filter_approved=' + encodeURIComponent(filter_approved);
	}	
	
	var filter_ip = $('input[name=\'filter_ip\']').attr('value');
	
	if (filter_ip) {
		url += '&filter_ip=' + encodeURIComponent(filter_ip);
	}
		
	var filter_date_added = $('input[name=\'filter_date_added\']').attr('value');
	
	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}
	*/
	
	location = url;
}
//--></script>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script>
<?php echo $footer; ?> 