<?php

//ROOT
define('DIR_ROOT', dirname(__FILE__));

// HTTP
define('HTTP_SERVER', 'http://localhost/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/');

// DIR
define('DIR_APPLICATION', DIR_ROOT . '/catalog/');
define('DIR_SYSTEM',      DIR_ROOT . '/system/');
define('DIR_DATABASE',    DIR_ROOT . '/system/database/');
define('DIR_LANGUAGE',    DIR_ROOT . '/catalog/language/');
define('DIR_TEMPLATE',    DIR_ROOT . '/catalog/view/theme/');
define('DIR_CONFIG',      DIR_ROOT . '/system/config/');
define('DIR_IMAGE',       DIR_ROOT . '/image/');
define('DIR_CACHE',       DIR_ROOT . '/system/cache/');
define('DIR_DOWNLOAD',    DIR_ROOT . '/download/');
define('DIR_LOGS',        DIR_ROOT . '/system/logs/');

//DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pawnshop');
define('DB_PREFIX', 'shop_');

//DB : remote
/*define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', '103.27.110.37:3306');
define('DB_USERNAME', 'a1208213859');
define('DB_PASSWORD', '38808272');
define('DB_DATABASE', 'a1208213859');
define('DB_PREFIX', 'shop_');*/

?>