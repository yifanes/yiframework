<?php
//定义项目根目录
defined("APP_PATH") || define('APP_PATH',dirname(__FILE__).'/../');
//定义框架所在目录
defined("FRAMEWORK_PATH") || define('FRAMEWORK_PATH',APP_PATH.'Library/yiframework/');
//定义用户modules路径
defined('USERAPP_PATH') || define('USERAPP_PATH', APP_PATH.'UserApps/');
//定义配置文件
defined('CONFIG_PATH') || define('CONFIG_PATH', USERAPP_PATH.'/Configs/');


//调用入口处理文件
include_once FRAMEWORK_PATH . 'Function.php';
C(include CONFIG_PATH.'config.php');

include_once FRAMEWORK_PATH . 'Route.php';
Route::run();