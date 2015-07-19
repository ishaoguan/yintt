<?php
    define('THINK_PATH',dirname(__FILE__).'/CORE/');
    define('APP_NAME', 'App');
    define('APP_PATH',dirname(__FILE__).'/App/');
    define('APP_DEBUG', 0);
    define('APP_PUBLIC_PATH',dirname(__FILE__).'/Public/');
    define('LOG_PATH',  dirname(__FILE__).'/Logs/');
    define('SAFE_ADMIN', 'admin');

    require(THINK_PATH.'/Core.php');
?>