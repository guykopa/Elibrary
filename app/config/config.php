<?php

/**
 * PARAMETRES DE CONFIGURATION
 */
define('DB_HOST', 'localhost');
#define('DB_HOST', 'mysql-elibrary.alwaysdata.net');
define('DB_USER', 'root');
#define('DB_USER', 'elibrary');
define('DB_PASS', '');
#define('DB_PASS', 'E-Library2024');
define('DB_NAME', 'elibrary_db');
$app_root = dirname(dirname(__FILE__));
$public_root = "";
$i = 0;
while($i < strlen($app_root)-4){
    $public_root = $public_root.$app_root[$i];
    $i++;
}

$public_root = $public_root . "\public";
$public_root = str_replace("\\", "/", $public_root);

define('APP_ROOT', dirname(dirname(__FILE__)));
define('PUBLIC_ROOT', $public_root);
#define('URL_ROOT', 'https://elibrary.alwaysdata.net');
define('URL_ROOT', 'http://'.$_SERVER['SERVER_ADDR'].'/elibrary');
define('SITE_NAME', 'E-Library');
