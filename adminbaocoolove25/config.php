<?php

//ROOT
define('DIR_ROOT', dirname(__FILE__).'/..');

// HTTP
define('HTTP_SERVER', 'http://' . $_SERVER["HTTP_HOST"] . '/adminbaocoolove25/');
define('HTTP_CATALOG', 'http://' . $_SERVER["HTTP_HOST"] . '/');

// HTTPS
define('HTTPS_SERVER', 'http://' . $_SERVER["HTTP_HOST"] . '/adminbaocoolove25/');
define('HTTPS_CATALOG', 'http://' . $_SERVER["HTTP_HOST"] . '/');

// DIR
define('DIR_APPLICATION', DIR_ROOT . '/adminbaocoolove25/');
define('DIR_SYSTEM',      DIR_ROOT . '/system/');
define('DIR_DATABASE',    DIR_ROOT . '/system/database/');
define('DIR_LANGUAGE',    DIR_ROOT . '/adminbaocoolove25/language/');
define('DIR_TEMPLATE',    DIR_ROOT . '/adminbaocoolove25/view/template/');
define('DIR_CONFIG',      DIR_ROOT . '/system/config/');
define('DIR_IMAGE',       DIR_ROOT . '/image/');
define('DIR_CACHE',       DIR_ROOT . '/system/cache/');
define('DIR_DOWNLOAD',    DIR_ROOT . '/download/');
define('DIR_LOGS',        DIR_ROOT . '/system/logs/');
define('DIR_CATALOG',     DIR_ROOT . '/catalog/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pawnshop');
define('DB_PREFIX', 'shop_');
?>