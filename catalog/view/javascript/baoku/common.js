$(".search_sel").change(function(){
	
	switch($(this).val()){
		case '商城':
		  $('.search form').attr('action', './index.php?route=product/list&search=');
		  break;
		case '论坛':
		  $('.search form').attr('action','./forum/?search-index');
		  break;
		case '序列号':
			alert(3);
			break;
	}
	
	
	
});