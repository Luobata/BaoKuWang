window.mySwipe = new Swipe(document.getElementById('slider'), {
startSlide: 0,
speed: 400,
auto: 3000,
continuous: true,
disableScroll: false,
stopPropagation: false,
callback: function(index, elem) {},
transitionEnd: function(index, elem) {}
});

// function nextpics(){
// 	$('#head1').attr("style", "background-color:#fff");
// 	$('.pic_head .head1').attr('style', 'color:#000');
// 	$('#head2').attr('style', 'background-color:#673413');
// 	$('.pic_head .head2').attr('style', 'color:#fff');
// }
//var nextpics=function(){


	$(".head2").bind("click",function(e){
        $(this).attr('style', 'color:#fff');
        var b=(this.parentElement.parentElement);
        $(b).attr('style', 'background-color:#673413');
        var a=(b.previousElementSibling);
        $(a).attr('style', 'background-color:#fff');
        $(a.firstElementChild.firstChild).attr('style', 'color:#000');
        $('.s_content').attr("style","display:none");
        $('#s_content_2').attr("style","display:block");
	});

	$(".head1").bind("click",function(e){
        $(this).attr('style', 'color:#fff');
        var b=(this.parentElement.parentElement);
        $(b).attr('style', 'background-color:#673413');
        var a=(b.nextElementSibling);
        $(a).attr('style', 'background-color:#fff');
        $(a.firstElementChild.firstChild).attr('style', 'color:#000');
        $('.s_content').attr("style","display:none");
        $('#s_content_1').attr("style","display:block");
	});



//};


// 点击按钮切换颜色，更改图片路径

$('.head_category li').bind("click",function(){
    // 改变颜色
    var wrap = $(this).parents('.third');
    wrap.find('.t_nav .text a').css('color','#999999');
    // 根据获取的点击value将前台数据展示的改变内容替换
    var pid = $(this).attr('pid');
    var products = parent_polular_product[pid];
    //console.log(parent_polular_product);
    //console.log(products);

    var content = '';
    content += '<tr class="t_row">';
    var i = 1;
    for( id in products ) {
        content += '<td><div class="t_row_jew" >';
        content +=     '<div class="t_row_pic" id="t_row_pic1">';
        content +=     '<a href="/index.php?route=product/product&product_id='+id+'">';
        content +=     '<img src="/image/' + products[id]['image'] + '"></a>';
        content +=     '</div>';
        content +=     '<li class="desc">' + products[id]['title'] + '</li>';
        content +=     '<li class="savep">价格：<span class="savep-price">' + products[id]['price'] + '</span>元</li>';
        content += '</div></td>';
        if( i==4 ) {
            content += '</tr><tr class="t_row">';
        }
        i++;
    }
    content += '</tr>';
    wrap.find('.t_content tbody').html(content);
});

$('.t_nav .text').bind("click",function(){
    // 改变颜色
    var wrap = $(this).parents('.third');
    wrap.find('.t_nav .text a').css('color','#999999');
    $(this).children('a').css('color','#ad813f');
    // 根据获取的点击value将前台数据展示的改变内容替换
    //console.log(products);
    var pid = $(this).attr('pid');
    var products = children_polular_product[pid][this.value];

    var content = '';
    content += '<tr class="t_row">';
    var i = 1;
    for( id in products ) {
        content += '<td><div class="t_row_jew" >';
        content +=     '<div class="t_row_pic" id="t_row_pic1">';
        content +=     '<a href="/index.php?route=product/product&product_id='+id+'">';
        content +=     '<img src="/image/' + products[id]['image'] + '"></a>';
        content +=     '</div>';
        content +=     '<li class="desc">' + products[id]['title'] + '</li>';
        content +=     '<li class="savep">价格：<span class="savep-price">' + products[id]['price'] + '</span>元</li>';
        content += '</div></td>';
        if( i==4 ) {
            content += '</tr><tr class="t_row">';
        }
        i++;
    }
    content += '</tr>';
    wrap.find('.t_content tbody').html(content);
});