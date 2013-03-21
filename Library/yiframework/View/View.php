<?php

/*
 * 简单模板引擎常用的2个方法
 */
class View extends Base{
	const VIEW_BASE_PATH = 'Views/';
	
	private static $_data = array();
	
	public static function assign($arr){
		foreach ($arr as $key=>$val)
		{
			if(is_int($key))
				self::$_data[$key] = $val;
		}
	}
	
	public static function display($file){
		if(file_exists($file)){
			extract(self::$_data);
			include $file;
		}else{
			throw new Exception(ViewException::NOT_EXISTS_TEMPLATE);
		}
	}
}