$('.buttons').click(function() {
	$('#s_search').submit();
});


$(".search_sel").change(function(){
	
	switch($(this).val()){
		case '商城':{
		  $('.search form').attr('action', '/');
		  $('.search .route').attr('value','product/list');
		  $('.search .route').attr('name','route');
		  $('.search .text').attr('name','search');
		  break;}
		case '论坛':{
		  $('.search form').attr('action','/forum/');
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
$('.all').hover(function() {
     $('.content_head').show();
    }, function() {
     $('.content_head').css('display', 'none');
 });

 $('.content_head > .goods').hover(function() {
    /* Stuff to do when the mouse enters the element */
     var eq = $('.content_head > .goods').index(this),
     h = $('.content_head').offset().top;  
     //$('.goods').attr('style', 'background-color:#edeced');
     $(this).css('background-color','#7e6a52');
     $('.item').css('display', 'none');    
     $(this).children('.item').show();
}, function() {
   $('.goods').attr('style', 'background-color:#986');
   $(this).children('.item').css('display', 'none');
   
    //a.css('display','none');
});

/*
$('.item > .goods').hover(function() {
    //Stuff to do when the mouse enters the element
     var eq = $('.item > .goods').index(this),
     h = $('.item').offset().top;  
     $('.item .goods').css('background-color', '#986');
     $(this).css('background-color', '#7e6a52');
}, function() {
    
});
*/