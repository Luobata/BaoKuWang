<?php
session_start(); 
 
$code = trim($_POST['code']);

if( $code==$_SESSION["YANZHENGMA"] )
	echo '1'; 
else
	echo '0';

?>