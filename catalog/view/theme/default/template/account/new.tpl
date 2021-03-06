<?php echo $header; ?>

<div class="content">

    <ul class="bread">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>

    <form action="<?php echo $form_action; ?>" onsubmit="return product_validate();" method="post" enctype="multipart/form-data">

        <?php if(isset($product_id)) echo '<input type="hidden" name="product_id" value="' . $product_id . '" />'; ?>

        <div class="form-content">

            <!-- 商品分类 -->
            <div class="row">
                <div class="col">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">一级分类</span>
                    <select class="input-content" id="category_parent">
                        <?php
                            if( $category ) {
                                // 编辑商品
                                if( $category_pid == '0' ) {
                                    // 为一级
                                    foreach( $categories as $branch ) {
                                        echo '<option value="' . $branch['parent']['id'] . '" ' . (($category==$branch['parent']['id'])?('selected="selected"'):'') . ' >' . $branch['parent']['name'] . '</option>';
                                    }
                                } else {
                                    // 为二级
                                    foreach( $categories as $branch ) {
                                    echo '<option value="' . $branch['parent']['id'] . '" ' . (($category_pid==$branch['parent']['id'])?('selected="selected"'):'') . ' >' . $branch['parent']['name'] . '</option>';
                                    }
                                }
                            } else {
                                // 新建商品
                                foreach( $categories as $branch ) {
                                    echo '<option value="' . $branch['parent']['id'] . '">' . $branch['parent']['name'] . '</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">二级分类</span>
                    <select class="input-content" id="category_children" name="category">
                        <?php
                            if( $category ) {
                                // 编辑商品
                                if( $category_pid == '0' ) {
                                    // 为一级
                                    echo '<option value="' . $category . '" selected="selected">--无--</option>';
                                    foreach( $categories as $branch ) {
                                        if( $branch['parent']['id'] == $category ) {
                                            foreach( $branch['children'] as $child ) {
                                                echo '<option value="' . $child['id'] . '">' . $child['name'] . '</option>';
                                            }
                                        }
                                    }
                                } else {
                                    // 为二级
                                    foreach( $categories as $branch ) {
                                        if( $branch['parent']['id'] == $category_pid ) {
                                            foreach( $branch['children'] as $child ) {
                                            echo '<option value="' . $child['id'] . '" ' . (($category==$child['id'])?('selected="selected"'):'') . ' >' . $child['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                            } else {
                                // 新建商品
                                if(!empty($categories[0]['children'])) {
                                    echo '<option value="' . $categories[0]['parent']['id'] . '" selected="selected">--无--</option>';
                                    foreach( $categories[0]['children'] as $child ) {
                                        echo '<option value="' . $child['id'] . '">' . $child['name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="' . $categories[0]['parent']['id'] . '" selected="selected">--无--</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <script> // 分类
                $(document).ready(function(){
                    var categories = <?php echo json_encode($categories); ?>;
                    $('#category_parent').change(function(){
                        //alert(this.value);
                        var options = '';
                        for( x in categories ) {
                            if( categories[x]['parent']['id'] == this.value ) {
                                var category_child = categories[x]['children'];
                                for( y in category_child ) {
                                    options += '<option value="' + category_child[y]['id'] + '">' + category_child[y]['name'] + '</option>';
                                }
                                break;
                            }
                        }
                        //alert(options);
                        if( options=='' ) {
                            options = '<option value="' + this.value + '">--无--</option>';
                        }
                        $('#category_children').html(options);
                    });
                });
                </script>
            </div>

            <!-- 标题 -->
            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" class="htitle input-content" name="title" id="product_title" value="<?php if($title) echo $title; ?>" />
                <a class="tip-btn" target="_blank" href="/index.php?route=product/identify">免费鉴定</a>
                <span id="error_title" class="error_prompt"></span>
            </div>

            <!-- 转让价格 -->
            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">转让价格</span>
                <input type="text" class="price input-content" name="price" id="product_price" value="<?php if($price) echo $price; ?>" />
                <span style="margin-left:16px;">元</span>
                <a class="tip-btn" target="_blank" href="/index.php?route=product/valuation">免费估值</a>
                <span id="error_price" class="error_prompt"></span>
            </div>

            <!-- 商品主图 -->
            <div class="row" style="height: auto;">
                <div>
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">物品主图</span>
                </div>
                <div style="position: relative; top: -44px;">
                    <!-- 为了布局 -->
                    <div style="display: inline-block; visibility: hidden;">
                        <span class="nes-tip">*</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="input-title">物品主图</span>
                    </div>
                    <!-- 事件按钮 -->
                    <div style="display: inline-block;width:600px;">
                        <div id="product_image_main" class="product_image">
                            <?php if($image) echo '<img src="/image/'.$image.'" />'; ?>
                        </div>
                        <input id="image_main_btn" type="button" class="pic input-content" value="选择图片" />&nbsp;&nbsp;<span>（图片大小限制为5M内）</span>
                        <span id="error_image_main" class="error_prompt"></span>
                    </div>
                </div>
                <!-- 隐藏域 -->
                <input type="hidden" name="image" id="product_image" value="<?php if($image) echo $image; ?>"/>
            </div>

            <!-- 更多图片 -->
            <div class="row" style="height: auto;position: relative; top: -35px;">
                <div><span class="input-title">更多图片</span></div>
                <div style="position: relative; top: -44px;">
                    <!-- 为了布局 -->
                    <div style="display: inline-block; visibility: hidden;">
                        <span class="nes-tip">*</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="input-title">更多图片</span>
                    </div>
                    <!-- 按钮事件 -->
                    <div style="display: inline-block;">
                        <div id="product_image_more" class="product_image">
                            <?php
                                if( isset($product_image) && !empty($product_image) ) {
                                    foreach( $product_image as $image_single ) {
                                        echo '<img src="/image/' . $image_single['image'] . '" />';
                                    }
                                }
                            ?>
                        </div>
                        <input id="image_more_btn" type="button" class="pic input-content" value="选择更多图片" />&nbsp;&nbsp;<span>（最多4张）</span>
                    </div>
                </div>
                <!-- 隐藏域 -->
                <input type="hidden" name="product_image[0][image]" id="product_image_0" value="<?php if(isset($product_image[0])) echo $product_image[0]['image']; ?>" class="product_image_arr"/>
                <input type="hidden" name="product_image[1][image]" id="product_image_1" value="<?php if(isset($product_image[1])) echo $product_image[1]['image']; ?>" class="product_image_arr"/>
                <input type="hidden" name="product_image[2][image]" id="product_image_2" value="<?php if(isset($product_image[2])) echo $product_image[2]['image']; ?>" class="product_image_arr"/>
                <input type="hidden" name="product_image[3][image]" id="product_image_3" value="<?php if(isset($product_image[3])) echo $product_image[3]['image']; ?>" class="product_image_arr"/>
                <input type="hidden" name="product_image[0][sort_order]" value="1" />
                <input type="hidden" name="product_image[1][sort_order]" value="2" />
                <input type="hidden" name="product_image[2][sort_order]" value="3" />
                <input type="hidden" name="product_image[3][sort_order]" value="4" />
            </div>

            <!-- 详细说明 -->
            <div class="row edit" style="position: relative; top: -50px;">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">详细说明</span>
                <span id="error_description" class="error_prompt"></span>
                <textarea name="detail_content"><?php if($detail) echo $detail; ?></textarea>
                <input id="product_description_data" name="detail" type="hidden" />
            </div>

            <!-- 所在地 -->
            <div class="row">
                <div class="col">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">所&nbsp;在&nbsp;&nbsp;地</span>
                    <select class="input-content" name="place" id="product_place">
                        <?php
                            $place = ( $place ? $place : '北京' );
                            foreach( $zones as $zone ) {
                                if( $zone['name'] == $place ) {
                                    echo '<option selected="selected" value="' . $zone['name'] . '">' . $zone['name'] . '</option>';
                                } else {
                                    echo '<option value="' . $zone['name'] . '">' . $zone['name'] . '</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <span id="error_place" class="error_prompt"></span>
            </div>

            <!-- 联系人 -->
            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">联&nbsp;系&nbsp;&nbsp;人</span>
                <input type="text" class="input-content" name="owner" id="product_owner" value="<?php if($owner) echo $owner; ?>" />
                <span id="error_owner" class="error_prompt"></span>
            </div>

            <!-- 手机号码 -->
            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">手&nbsp;机&nbsp;&nbsp;号</span>
                <input type="text" class="input-content" name="mobile" id="product_mobile" value="<?php if($mobile) echo $mobile; ?>"/>
                <span id="error_mobile" class="error_prompt"></span>
            </div>

            <!-- QQ号码 -->
            <div class="row">
                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">QQ&nbsp;号码</span>
                <input type="text" class="input-content" name="qq" value="<?php if($qq) echo $qq; ?>" />
            </div>

            <!-- 微信号 -->
            <div class="row">
                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                <input type="text" class="input-content" name="wechat" value="<?php if($wechat) echo $wechat; ?>" />
            </div>

            <input type="submit" value="提交并发布" class="submit-btn">

        </div>
    </form>

    <!-- kindEditor配置 -->
    <script src="/image/kindeditor/kindeditor.js"></script>
    <script src="/image/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function (K) {
            editor = K.create('textarea[name="detail_content"]', {
                resizeType: 1,
                allowImageUpload: true,
                allowFileManager: true,
                width: 910,
                height: 360,
                items: [ 'undo', 'redo', '|', 'copy', 'cut', 'paste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'selectall', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', '|', 'table', 'multiimage', 'insertfile', 'emoticons', 'link', 'unlink', '|', 'fullscreen' ]
            });
            // 商品主图事件
            K('#image_main_btn').click(function () {
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        showRemote : false,
                        imageUrl: K('#product_image').val(),
                        clickFn: function (url) {
                            K('#product_image').val(url);
                            K('#product_image_main').html('<img src="' + url + '"/>');
                            url = url.substr(url.indexOf('kindeditor'));
                            document.getElementById('product_image').value = url;
                            editor.hideDialog();
                        }
                    });
                });
            });
            // 商品更多图片事件
            K('#image_more_btn').click(function () {
                editor.loadPlugin('multiimage', function () {
                    editor.plugin.multiImageDialog({
                        clickFn: function (urlList) {
                            var product_image_more = K('#product_image_more');
                            product_image_more.html('');
                            K('.product_image_arr').val('');
                            K.each(urlList, function(i, data) {
                                if(i>=4) return;
                                //最多只能四张图
                                product_image_more.append('<img src="' + data.url + '"/>');
                                var url = data.url;
                                url = url.substr(url.indexOf('kindeditor'));
                                document.getElementById('product_image_'+i).value = url;
                            });
                            editor.hideDialog();
                        }
                    });
                });
            });
        });

        // 表单验证
        function product_validate() {

            var error = false;

            // 标题
            var titleLen = document.getElementById('product_title').value.length;
            if( titleLen <= 0 || titleLen > 20 ) {
                $('#error_title').html('商品标题不能为空且不大于20个字');
                error = true;
            } else {
                $('#error_title').html('');
            }

            // 价格
            if( (document.getElementById('product_price').value.length <= 0) ||
                (document.getElementById('product_price').value.length >  9) ||
                isNaN(document.getElementById('product_price').value) ) {
                $('#error_price').html('价格必须是1-9位整数数字');
                error = true;
            } else {
                $('#error_price').html('');
            }

            // 主图片
            if( document.getElementById('product_image').value.length == 0 ) {
                $('#error_image_main').html('请上传物品主图');
                error = true;
            } else {
                $('#error_image_main').html('');
            }

            // 详细说明

            if( editor.html().length == 0 ) {
                $('#error_description').html('详细说明不能为空');
                error = true;
            } else {
                $('#error_description').html('');
                $('#product_description_data').val(editor.html());
            }

            // 所在地
            if( document.getElementById('product_place').value.length == 0 ) {
                $('#error_place').html('所在地不能为空');
                error = true;
            } else {
                $('#error_place').html('');
            }

            // 联系人
            if( document.getElementById('product_owner').value.length == 0 ) {
                $('#error_owner').html('所在地不能为空');
                error = true;
            } else {
                $('#error_owner').html('');
            }

            // 手机
            if( (document.getElementById('product_mobile').value.length != 11) ||
                isNaN(document.getElementById('product_mobile').value) ) {
                $('#error_mobile').html('手机必须是11位数字');
                error = true;
            } else {
                $('#error_mobile').html('');
            }

            if ( error ) {
                $('html, body').animate({ scrollTop: 200 }, 'slow');
                return false;
            } else {
                return true;
            }
        }
    </script>

</div>

<?php echo $footer; ?>