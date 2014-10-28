<?php

$id = $_GET['id'];
$Phone = base64_decode($id);
$im = imagecreate( 120, 20 );
imagecolorallocate( $im, 255, 255, 255 );
$Color = imagecolorallocate( $im, 255, 0, 0 );
imagestring($im, 5, 5, 1, $Phone, $Color);
header('content-type:image/*');
imagepng($im);
imagedestroy($im);

?>