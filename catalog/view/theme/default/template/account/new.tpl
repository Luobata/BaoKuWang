<?php echo $header; ?>

<div id="content">

    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>

    <div class="content">

        <form>
            <div class="form-content">

                <div class="row">
                    <div class="col">
                        <span class="nes-tip">*</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="input-title">一级分类</span>
                        <select class="input-content">
                            <option>古董古玩</option>
                        </select>
                        <!-- <select name="choose" id="choose">
                                                        <option value="选择风格" selected="selected">选择风格</option>
                                                        <option value="复古风">复古风</option>
                                                        <option value="摇滚风">摇滚风</option>
                                                        <option value="怀旧风">怀旧风</option>
                                                    </select> -->

                    </div>

                    <div class="col">
                        <span class="nes-tip">*</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="input-title">二级分类</span>
                        <select class="input-content">
                            <option>青铜器</option>
                        </select>

                    </div>

                </div>

                <div class="row">

                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="text" class="htitle input-content">
                    <a class="tip-btn" href="">免费鉴定</a>
                </div>
                <div class="row">

                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">转让价格</span>
                    <input type="text" class="price input-content">
                    <span style="margin-left:16px;">元</span>
                    <a class="tip-btn" href="">免费估值</a>

                </div>

                <div class="row">

                    <span class="nes-tip none">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">物品图片</span>
                    <input type="button" class="pic input-content" value="上传图片">

                    <span style="margin-left:50px;color:#c5a57f">最多上传五张</span>

                </div>


                <div class="row edit">

                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">详细说明</span>
                    <div class="info-edit">
                        <div class="edit-bar">
                            <a href="#"><img src="image/bold.png"></img></a>
                            <a href="#"><img src="image/underline.png"></img></a>
                            <a href="#"><img src="image/left.png"></img></a>
                            <a href="#"><img src="image/right.png"></img></a>
                        </div>
                        <textarea></textarea>
                    </div>

                </div>

                <div class="row" style="margin-top:10px">
                    <span class="nes-tip none">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">所在区域</span>
                    <select class="input-content">
                        <option>东城区</option>
                        <option>西城区</option>
                        <option>海淀区</option>
                    </select>
                </div>

                <div class="row">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">联&nbsp;系&nbsp;&nbsp;人</span>
                    <input type="text" class="input-content">
                </div>
                <div class="row">
                    <span class="nes-tip">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">联系电话</span>
                    <input type="text" class="input-content">
                </div>
                <div class="row">
                    <span class="nes-tip none">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">QQ&nbsp;号码</span>
                    <input type="text" class="input-content">
                </div>

                <div class="row">
                    <span class="nes-tip none">*</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="input-title">微&nbsp;信&nbsp;&nbsp;号</span>
                    <input type="text" class="input-content">
                </div>




                <input type="submit" value="提交并发布" class="submit-btn">


            </div>
        </form>

    </div>

</div>

<?php echo $footer; ?>