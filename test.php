<?php

	$email = base64_encode(base64_encode(base64_encode('1')));
	echo $email;
	echo '<br/>';
	$email = base64_decode(base64_decode($email));
	echo $email;
?>