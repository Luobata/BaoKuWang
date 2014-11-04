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


$(".head2").bind("mouseover",function(e){
    $(this).attr('style', 'color:#fff');
    var b=(this.parentElement.parentElement);
    $(b).attr('style', 'background-color:#673413');
    var a=(b.previousElementSibling);
    $(a).attr('style', 'background-color:#fff');
    $(a.firstElementChild.firstChild).attr('style', 'color:#000');
    $('.s_content').attr("style","display:none");
    $('#s_content_2').attr("style","display:block");
});

$(".head1").bind("mouseover",function(e){
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

/*
function product_detail_bind() {
    $('.t_row_jew').hover(function(event) {
        //var offset = $(event.currentTarget).offset();
        var detail = $(this).children('.detail')[0];
        //$(detail).css({ top: offset.top + $('.col').height() + "px", left: offset.left });
        //$(detail).show(500);
        $(detail).prev('.simple').css('visibility','hidden');
        $(detail).animate({top:"150px"}, 200);
    }, function() {
        //$(detail).hide(500);
        var detail = $(this).children('.detail')[0];
        $(detail).animate({top:"230px"}, 200, 'swing', function(){
            $(detail).prev('.simple').css('visibility','');
        });
    });
}

// 点击按钮切换颜色，更改图片路径

product_detail_bind();

$('.head_category li').bind("mouseover",function(){
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
        content +=     '<div class="simple">';
        content +=     '<li class="desc">' + ( (products[id]['title'].length>12) ? (products[id]['title'].substr(0,12)+'&nbsp;...') : products[id]['title'] ) + '</li>';
        content +=     '<li class="savep">价格：<span class="savep-price">' + products[id]['price'] + '</span>元</li>';
        content +=     '</div>';
        content +=     '<div class="detail">';
        content +=     '<p>' + products[id]['title'] + '</p>';
        content +=     '<p class="price"><b>￥' + products[id]['price'] + '&nbsp;元</b></p>';
        content +=     '</div>';
        content += '</div></td>';
        if( i==4 ) {
            content += '</tr><tr class="t_row">';
        }
        i++;
    }
    content += '</tr>';
    wrap.find('.t_content tbody').html(content);

    product_detail_bind();
});

$('.t_nav .text').bind("mouseover",function(){
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
        content +=     '<div class="simple">';
        content +=     '<li class="desc">' + ( (products[id]['title'].length>12) ? (products[id]['title'].substr(0,12)+'&nbsp;...') : products[id]['title'] ) + '</li>';
        content +=     '<li class="savep">价格：<span class="savep-price">' + products[id]['price'] + '</span>元</li>';
        content +=     '</div>';
        content +=     '<div class="detail">';
        content +=     '<p>' + products[id]['title'] + '</p>';
        content +=     '<p class="price"><b>￥' + products[id]['price'] + '&nbsp;元</b></p>';
        content +=     '</div>';
        content += '</div></td>';
        if( i==4 ) {
            content += '</tr><tr class="t_row">';
        }
        i++;
    }
    content += '</tr>';
    wrap.find('.t_content tbody').html(content);

    product_detail_bind();
});


*/


$('.content_head > .goods').hover(function() {
    /* Stuff to do when the mouse enters the element */
     var eq = $('.content_head > .goods').index(this),
     h = $('.content_head').offset().top;  
     //$('.goods').attr('style', 'background-color:#edeced');
     $(this).attr('style', 'background-color:#7e6a52');
     $('.item').css('display', 'none');    
     $(this).children('.item').show();
}, function() {
   $('.goods').attr('style', 'background-color:#986');
   $(this).children('.item').css('display', 'none');
    
});

/*
$('.item > .goods').hover(function() {
    // Stuff to do when the mouse enters the element
     var eq = $('.item > .goods').index(this),
     h = $('.item').offset().top;  
     $('.item .goods').css('background-color', '#8a775e');
     $(this).css('background-color', '#7e6a52');
     $(this).attr('style', 'background-color:#7e6a52');
}, function() {
    
});
*/


$('.all-sort-list > .item').hover(function(){
            var eq = $('.all-sort-list > .item').index(this),               //获取当前滑过是第几个元素
                h = $('.all-sort-list').offset().top,                       //获取当前下拉菜单距离窗口多少像素
                s = $(window).scrollTop(),                                  //获取游览器滚动了多少高度
                i = $(this).offset().top,                                   //当前元素滑过距离窗口多少像素
                item = $(this).children('.item-list').height(),             //下拉菜单子类内容容器的高度
                sort = $('.all-sort-list').height();                        //父类分类列表容器的高度
            
            if ( item < sort ){                                             //如果子类的高度小于父类的高度
                if ( eq == 0 ){
                    $(this).children('.item-list').css('top', (i-h));
                } else {
                    $(this).children('.item-list').css('top', (i-h)+1);
                }
            } else {
                if ( s > h ) {                                              //判断子类的显示位置，如果滚动的高度大于所有分类列表容器的高度
                    if ( i-s > 0 ){                                         //则 继续判断当前滑过容器的位置 是否有一半超出窗口一半在窗口内显示的Bug,
                        $(this).children('.item-list').css('top', (s-h)+2 );
                    } else {
                        $(this).children('.item-list').css('top', (s-h)-(-(i-s))+2 );
                    }
                } else {
                    $(this).children('.item-list').css('top', 3 );
                }
            }   

            $(this).addClass('hover');
            $(this).children('.item-list').css('display','block');
        },function(){
            $(this).removeClass('hover');
            $(this).children('.item-list').css('display','none');
        });

        $('.item > .item-list > .close').click(function(){
            $(this).parent().parent().removeClass('hover');
            $(this).parent().hide();
        });




// 图片延迟加载

$(document).ready(function(){

    $('img.lazy').lazyload();

    // 图片显示处理

    $('img.background-cover').each(function () {

        $(this).load(function(){
            //alert('我被加载了！');

            var $img = $(this).css('position', 'absolute')
            var $parent = $img.parents('.background-cover-base').css('position', 'relative')
            var img_size = [$img.width(), $img.height()]
            var parent_size = [$parent.width(), $parent.height()]

            // 图片宽高比
            img_size[2] = img_size[0] / img_size[1]

            // 父元素宽高比
            parent_size[2] = parent_size[0] / parent_size[1]

            //alert(img_size[2]+','+parent_size[2]);

            if (img_size[2] > parent_size[2]) {
                //alert($img.attr('src'));

                /*
                 // 留白方案
                 $img.width(parent_size[0])
                 var new_height = img_size[1] * $img.width() / img_size[0]
                 $img.height(new_height)
                 $img.css('top', (parent_size[1] - new_height) / 2)
                 */

                // 裁剪方案
                $img.height(parent_size[1])
                var new_width = img_size[0] * $img.height() / img_size[1]
                $img.width(new_width)
                $img.css('left', (parent_size[0] - new_width) / 2)

            } else {

                /*
                 // 留白方案
                 $img.height(parent_size[1])
                 var new_width = img_size[0] * $img.height() / img_size[1]
                 $img.width(new_width)
                 $img.css('left', (parent_size[0] - new_width) / 2)
                 */

                // 裁剪方案
                $img.width(parent_size[0])
                var new_height = img_size[1] * $img.width() / img_size[0]
                $img.height(new_height)
                $img.css('top', (parent_size[1] - new_height) / 2)
            }
        })

    })

});