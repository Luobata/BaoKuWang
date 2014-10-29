//鼠标移动到图片上切换大图效果，先不需要
$('.mover').mouseover(function(e) {
  var src=(this.src);
  //alert(1);
  $('#small img').attr('src', src);
  $('#big img').attr('src', src);
});
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
          if(data.length!=0){
             for (var i = 0; i < data.length-1; i++) {
             	//$('.s_friends .tip_'+(i+1)+' a').html(data[i].subject);
             	$('.s_friends').append(" <div class='s_left_con tip_1'>"+
             		"<a href='./forum/?thread-index-fid-"+data[i].fid+"-tid-"+data[i].tid+".htm'>"+data[i].subject+"</a></div>");
             };
             $('.s_friends').append(" <div class='s_left_con tip_1' id='s_left_con'>"+
             		"<a href='./forum/?thread-index-fid-"+data[i].fid+"-tid-"+data[i].tid+".htm'>"+data[i].subject+"</a></div>");
          }else{
            //没有数据返回
            $('.s_friends').remove();
          }

              }
        }); 
  	
   
 });




// 弹框事件


(function () {
    $.MsgBox = {
        Alert: function (title, msg) {
            GenerateHtml("alert", title, msg);
            btnOk();  //alert只是弹出消息，因此没必要用到回调函数callback
            btnNo();
        },
        Confirm: function (title, msg, callback) {
            GenerateHtml("confirm", title, msg);
            btnOk(callback);
            btnNo();
        }
    }
    //生成Html
    var GenerateHtml = function (type, title, msg) {
        var _html = "";
        _html += '<div id="mb_box"></div><div id="mb_con"><span id="mb_tit">' + title + '</span>';
        _html += '<a id="mb_ico">x</a><div id="mb_msg">' + msg + '</div><div id="mb_btnbox">';
        if (type == "alert") {
            _html += '<input id="mb_btn_ok" type="button" value="确定" />';
        }
        if (type == "confirm") {
            _html += '<input id="mb_btn_ok" type="button" value="确定" />';
            _html += '<input id="mb_btn_no" type="button" value="取消" />';
        }
        _html += '</div></div>';
        //必须先将_html添加到body，再设置Css样式
        $("body").append(_html); GenerateCss();
    }
    //生成Css
    var GenerateCss = function () {
        $("#mb_box").css({ width: '100%', height: '100%', zIndex: '99999', position: 'fixed',
            filter: 'Alpha(opacity=60)', backgroundColor: 'black', top: '0', left: '0', opacity: '0.6'
        });
        $("#mb_con").css({ zIndex: '999999', width: '400px', position: 'fixed',
            backgroundColor: 'White', borderRadius: '15px'
        });
        $("#mb_tit").css({ display: 'block', fontSize: '14px', color: '#444', padding: '10px 15px',
            backgroundColor: '#DDD', borderRadius: '15px 15px 0 0',
            borderBottom: '3px solid #AD813F', fontWeight: 'bold'
        });
        $("#mb_msg").css({ padding: '20px', lineHeight: '20px',
            borderBottom: '1px dashed #DDD', fontSize: '13px'
        });
        $("#mb_ico").css({ display: 'block', position: 'absolute', right: '10px', top: '9px',
            border: '1px solid Gray', width: '18px', height: '18px', textAlign: 'center',
            lineHeight: '16px', cursor: 'pointer', borderRadius: '12px', fontFamily: '微软雅黑'
        });
        $("#mb_btnbox").css({ margin: '15px 0 10px 0', textAlign: 'center' });
        $("#mb_btn_ok,#mb_btn_no").css({ width: '85px', height: '30px', color: 'white', border: 'none' });
        $("#mb_btn_ok").css({ backgroundColor: '#AD813F' });
        $("#mb_btn_no").css({ backgroundColor: 'gray', marginLeft: '20px' });
        //右上角关闭按钮hover样式
        $("#mb_ico").hover(function () {
            $(this).css({ backgroundColor: 'Red', color: 'White' });
        }, function () {
            $(this).css({ backgroundColor: '#DDD', color: 'black' });
        });
        var _widht = document.documentElement.clientWidth;  //屏幕宽
        var _height = document.documentElement.clientHeight; //屏幕高
        var boxWidth = $("#mb_con").width();
        var boxHeight = $("#mb_con").height();
        //让提示框居中
        $("#mb_con").css({ top: (_height - boxHeight) / 2 + "px", left: (_widht - boxWidth) / 2 + "px" });
    }
    //确定按钮事件
    var btnOk = function (callback) {
        $("#mb_btn_ok").click(function () {
            $("#mb_box,#mb_con").remove();
            if (typeof (callback) == 'function') {
                callback();
            }
        });
    }
    //取消按钮事件
    var btnNo = function () {
        $("#mb_btn_no,#mb_ico").click(function () {
            $("#mb_box,#mb_con").remove();
        });
    }
})();

$('#free_button').bind('click', function() {
    $.MsgBox.Confirm( "确认消息" , "点击查看联系方式后，即可进行线下的自由交易哦！<br/>服务热线：010-64814142");
});

$('#f_button').bind('click', function() {
  $.MsgBox.Confirm( "确认消息" , "我们提供担保交易服务哦！<br/>服务热线：010-64814142");
});

