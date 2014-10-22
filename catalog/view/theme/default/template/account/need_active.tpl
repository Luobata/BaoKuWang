<?php echo $header;?>
    <div class="content" style="color:#673413;text-align: center;font-weight: bolder;height: 200px;">
        <span style="font-size: 30px;position: relative;top: 65px;">注册成功！账户激活链接已发送至您的邮箱，请速速查收！</span><br/>
        <span id="count" style="font-size: 30px;position: relative;top: 80px;">10</span>
    </div>
    <script>
        function counting() {
            if( parseInt($('#count').html())>0 ) {
                $('#count').html( parseInt($('#count').html())-1 );
            } else {
                location = '<?php echo $url;?>';
            }
            setTimeout(counting,1000);
        }
        $(document).ready(function(){
            setTimeout(counting,1000);
        });
    </script>
<?php echo $footer;?>