$(".search_sel").change(function(){
	
	switch($(this).val()){
		case '商城':{
		  $('.search form').attr('action', '#');
		  $('.search .route').attr('value','product/list');
		  $('.search .route').attr('name','route');
		  $('.search .text').attr('name','search');
		  break;}
		case '论坛':{
		  $('.search form').attr('action','./forum/');
		  $('.search .route').attr('value','search');
		  $('.search .route').attr('name','0');
		  $('.search .text').attr('name','keyword');
		  break;}
		case '序列号':
			$('.search .text').attr('name','series');
			$('.search form').attr('action', '/');
		  	$('.search .route').attr('value','product/list');
		  	$('.search .route').attr('name','route');
			break;
	}
	
	
	
});
//需要判断是否为首页
// var a = location.href;
// if(a=='http://localhost')
// 	{alert("相等了");}else{alert("不等了");}
//是首页加入下面这些
$(document).ready(function() {
    //alert($('#index').val());
if($('#index').val()!='index'){
    $('.all').hover(function() {
     $('.content_head').show();
    }, function() {
     $('.content_head').css('display', 'none');
    });
    }
});





$('.content_head > .goods').hover(function() {
    /* Stuff to do when the mouse enters the element */
     var eq = $('.content_head > .goods').index(this),
     h = $('.content_head').offset().top;  
     //$('.goods').attr('style', 'background-color:#edeced');
     $(this).attr('style', 'background-color:#fff');
     $('.item').css('display', 'none');    
     $(this).children('.item').show();
}, function() {
   $('.goods').attr('style', 'background-color:#edeced');
   $(this).children('.item').css('display', 'none');
   
    //a.css('display','none');
});
