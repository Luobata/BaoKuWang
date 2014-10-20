<?php echo $header; ?>

<div class="content">

    <ul class="bread">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
    </ul>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-content">

            <div class="row">

                <div class="col">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">一级分类</span>
                    <select class="input-content" id="category_parent">
                        <?php
                            foreach( $categories as $branch ) {
                                echo '<option value="' . $branch['parent']['id'] . '">' . $branch['parent']['name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">二级分类</span>
                    <select class="input-content" id="category_children">
                        <?php
                            foreach( $categories[0]['children'] as $child ) {
                                echo '<option value="' . $child['id'] . '">' . $child['name'] . '</option>';
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

            <div class="row">

                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" class="htitle input-content" name="title"/>
                <a class="tip-btn" href="">免费鉴定</a>
            </div>
            <div class="row">

                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">转让价格</span>
                <input type="text" class="price input-content" name="price">
                <span style="margin-left:16px;">元</span>
                <a class="tip-btn" href="">免费估值</a>

            </div>

            <div class="row" style="height: auto;">
                <div>
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">物品图片</span>
                </div>

                <div style="position: relative; top: -44px;">
                    <div style="display: inline-block; visibility: hidden;">
                        <span class="nes-tip">*</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="input-title">物品图片</span>
                    </div>
                    <div style="display: inline-block;">

                        <div id="product_image_1" class="product_image"></div>
                        <input onclick="BrowseServer('1');" type="button" class="pic input-content" value="上传第一张图片" /><br/>

                        <div id="product_image_2" class="product_image"></div>
                        <input onclick="BrowseServer('2');" type="button" class="pic input-content" value="上传第二张图片" /><br/>

                        <div id="product_image_3" class="product_image"></div>
                        <input onclick="BrowseServer('3');" type="button" class="pic input-content" value="上传第三张图片" /><br/>

                        <div id="product_image_4" class="product_image"></div>
                        <input onclick="BrowseServer('4');" type="button" class="pic input-content" value="上传第四张图片" /><br/>

                        <div id="product_image_5" class="product_image"></div>
                        <input onclick="BrowseServer('5');" type="button" class="pic input-content" value="上传第五张图片" />

                    </div>
                </div>

                <input type="hidden" name="image1" id="product_image_one" />
                <input type="hidden" name="image2" id="product_image_two" />
                <input type="hidden" name="image3" id="product_image_three" />
                <input type="hidden" name="image4" id="product_image_four" />
                <input type="hidden" name="image5" id="product_image_five" />

                <script type="text/javascript" src="/image/ckfinder/ckfinder.js"></script>
                <script type="text/javascript">
                function BrowseServer( imageId )
                {
                    var finder = new CKFinder();
                    finder.basePath = '/image/ckfinder/';
                    finder.selectActionFunction = SetFileField;
                    finder.selectActionData = imageId;
                    finder.popup();
                }
                function SetFileField( fileUrl, data )
                {
                    var number  = new Array('one','two','three','four','five');
                    var imageId = data["selectActionData"];
                    $('#product_image_'+imageId).html('<img src="' + fileUrl + '"/>');
                    document.getElementById( 'product_image_'+number[imageId-1] ).value = fileUrl;
                }
                </script>

            </div>

            <div class="row edit" style="position: relative; top: -33px;">

                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">详细说明</span>
                <!--
                <div class="info-edit">
                    <div class="edit-bar">
                        <a href="#"><img src="image/bold.png"></img></a>
                        <a href="#"><img src="image/underline.png"></img></a>
                        <a href="#"><img src="image/left.png"></img></a>
                        <a href="#"><img src="image/right.png"></img></a>
                    </div>
                    <textarea></textarea>
                </div>
                -->
                <textarea id="description" name="detail"></textarea>
                <script type="text/javascript" src="/admin/view/javascript/ckeditor/ckeditor.js"></script>
                <script type="text/javascript">
                CKEDITOR.replace('description', {
                    filebrowserBrowseUrl : '/image/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : '/image/ckfinder/ckfinder.html?Type=Images',
                    filebrowserflashBrowseUrl : '/image/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserUploadUrl : '/image/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : '/image/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '/image/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                </script>
            </div>

            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">所&nbsp;在&nbsp;&nbsp;地</span>
                <input type="text" class="input-content" name="place"/>
            </div>

            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">联&nbsp;系&nbsp;&nbsp;人</span>
                <input type="text" class="input-content" name="owner"/>
            </div>
            <div class="row">
                <span class="nes-tip">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">手&nbsp;机&nbsp;&nbsp;号</span>
                <input type="text" class="input-content" name="mobile"/>
            </div>
            <div class="row">
                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">QQ&nbsp;号码</span>
                <input type="text" class="input-content" name="qq"/>
            </div>

            <div class="row">
                <span class="nes-tip none">*</span>
                &nbsp;&nbsp;&nbsp;
                <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                <input type="text" class="input-content" name="wechat"/>
            </div>

            <input type="submit" value="提交并发布" class="submit-btn">

        </div>
    </form>

</div>

<?php //echo $footer; ?>