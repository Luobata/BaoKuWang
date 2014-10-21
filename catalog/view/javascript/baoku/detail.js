//鼠标移动到图片上切换大图效果，先不需要
// $('.mover').mouseover(function(e) {
// 	var src=(this.src);
// 	$('.b_img').attr('src', src);
// });
//鼠标点击效果
// $('.mover').bind("click", function(e) {
// 	alert(1);
// });
 $(document).ready(function() {
  $.ajax({
      //alert(1);
      url:"./forum/?hot-list.htm",
      //data:{ randomid: Math.random() },
      dataType:"json",
      success:function(data){
        //$.parseJSON('data');
             //alert(1);
             for (var i = 0; i < data.length-1; i++) {
             	//$('.s_friends .tip_'+(i+1)+' a').html(data[i].subject);
             	$('.s_friends').append(" <div class='s_left_con tip_1'>"+
             		"<a href='./forum/?thread-index-fid-"+data[i].fid+"-tid-"+data[i].tid+".htm'>"+data[i].subject+"</a></div>");
             };
             $('.s_friends').append(" <div class='s_left_con tip_1' id='s_left_con'>"+
             		"<a href='./forum/?thread-index-fid-"+data[i].fid+"-tid-"+data[i].tid+".htm'>"+data[i].subject+"</a></div>");
             //alert(data);
              }
        }); 
  	
   
 });


