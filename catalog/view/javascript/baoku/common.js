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