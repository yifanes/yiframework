<?php

//前端总控制器中检测是否非法入口
defined('APP_PATH') || exit('Access Denied');
//定义用户app路径
defined('USERAPP_PATH') || define('USERAPP_PATH', APP_PATH.'UserApps/');
//定义配置文件
defined('CONFIG_PATH') || define('CONFIG_PATH', USERAPP_PATH.'/Configs/');

//调用入口处理文件
include_once FRAMEWORK_PATH . 'Function.php';


class FrontController extends Base{
	private static $_instance = null;
	private function __construct(){
		C(Config::factory(Config::PHP));
		session_start();
		date_default_timezone_set(C('timeZone'));
		if(true === C('debug')){
			echo "debug mode:";
			ini_set('display_errors', 'on');
			error_reporting(C('errorReporting'));
		}else{
			error_reporting(0);
			ini_set('display_errors', 'off');
		}
	}
	
	private function __clone(){}
	
	public function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new FrontController();
		}
		return self::$_instance;
	}
	public function run(){
		Route::run();
	}
}