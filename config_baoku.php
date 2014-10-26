<?php

//ROOT
define('DIR_ROOT', dirname(__FILE__));

// HTTP
define('HTTP_SERVER', 'http://www.baoroo.com/');

// HTTPS
define('HTTPS_SERVER', 'http://www.baoroo.com/');

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

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', '122.0.66.79');
define('DB_USERNAME', 'froot');
define('DB_PASSWORD', 'love25');
define('DB_DATABASE', 'baocoo_com');
define('DB_PREFIX', 'shop_');

?>