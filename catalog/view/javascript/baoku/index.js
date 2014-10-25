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
	})

	$(".head1").bind("click",function(e){
	
	$(this).attr('style', 'color:#fff');
   	var b=(this.parentElement.parentElement);
   	$(b).attr('style', 'background-color:#673413');
   	var a=(b.nextElementSibling);
   	$(a).attr('style', 'background-color:#fff');
   	$(a.firstElementChild.firstChild).attr('style', 'color:#000');
   	$('.s_content').attr("style","display:none");
   	$('#s_content_1').attr("style","display:block");
	})



//};


// 点击按钮切换颜色，更改图片路径

$('#head3 li').bind("click",function(){
    // 改变颜色
    $('.t_nav .text a').css('color','#999999');
    // 根据获取的点击value将前台数据展示的改变内容替换
    var i = 1;
    for( id in parent_polular_product ) {
        $(".t_row #url_"+i).attr('href','/index.php?route=product/product&product_id='+id);
        $(".t_row #img_"+i).attr('src','/image/'+parent_polular_product[id]['image']);
        $('.t_row #text_'+i).html(parent_polular_product[id]['title']);
        $('.t_row #sprice_'+i).html(parent_polular_product[id]['price']);
        //$('.t_row #bprice_'+i).html("222");
        i++;
    }
})

$('.t_nav .text').bind("click",function(){
    // 改变颜色
    $('.t_nav .text a').css('color','#999999');
    $(this).children('a').css('color','#ad813f');
    // 根据获取的点击value将前台数据展示的改变内容替换
    var products = children_polular_product[this.value];
    //console.log(products);
    var i = 1;
    for( id in products ) {
        $(".t_row #url_"+i).attr('href','/index.php?route=product/product&product_id='+id);
        $(".t_row #img_"+i).attr('src','/image/'+products[id]['image']);
        $('.t_row #text_'+i).html(products[id]['title']);
        $('.t_row #sprice_'+i).html(products[id]['price']);
        //$('.t_row #bprice_'+i).html("222");
        i++;
    }
    /*
    do{
        $(".t_row #url_"+i).parents('.t_row').remove();
        i++;
    } while(i>=9);
    */
});

