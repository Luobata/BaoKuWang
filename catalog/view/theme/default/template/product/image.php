<?php
//获取要生成的数字
$id=$_GET['id']; 
// echo($id);
$Phone = base64_decode($id); #手机号码，具体从数据库怎么读出来，你自己写代码
$im    = imagecreate( 120, 15 );#建立一个宽 300， 高 30像素的图片对象
imagecolorallocate( $im, 255, 255, 255 );#将图片背景填充为白色
$Color = imagecolorallocate( $im, 0, 0, 0 ); #在生成一黑色色颜色，以便写入字符串
imagestring($im,16, 0, 0, $Phone, $Color);#将字符串写到图片上
header('content-type:image/*');//设置文件头为图片格式
imagepng( $im ); //输出一个png格式的图片
imagedestroy($im);//销毁图片对象
//echo($id);
?>