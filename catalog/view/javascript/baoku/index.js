window.mySwipe = new Swipe(document.getElementById('slider'), {
  startSlide: 2,
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
/*
 *点击按钮切换颜色，更改图片路径
 */
 $('.t_nav .text').bind("click",function(e){

 	$('.t_nav .text a').attr('style', 'color:#999999');
 	var a=this.childNodes;
 	$(a[0]).attr('style', 'color:#ad813f');
 	alert($(this).val());
 	//根据获取的点击value将前台数据展示的改变内容替换
 	for (var i = 0; i < 8; i++) {
 		$(".t_row #img_"+(i+1)).attr('src', 'catalog/view/theme/default/image/baoku/jew5.png');
 		$('.t_row #text_'+(i+1)).html("sss");
 		$('.t_row #sprice_'+(i+1)).html("333");
 		$('.t_row #bprice_'+(i+1)).html("222");
 	};
 });

