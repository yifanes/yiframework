<?php
//定义项目根目录
defined("APP_PATH") || define('APP_PATH',dirname(__FILE__).'/../');
//定义框架所在目录
defined("FRAMEWORK_PATH") || define('FRAMEWORK_PATH',APP_PATH.'Library/yiframework/');

include_once FRAMEWORK_PATH.'FrontController.php';

$frontController = FrontController::getInstance();
$frontController->run();