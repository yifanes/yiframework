<?php

class Controller extends Base{
	protected function _redirect(Array $arr){
		$controller = empty($_GET['c']) ? C('defaultController') : $_GET['c'];
		$action = empty($_GET['a']) ? C('defaultAction') : $_GET['a'];
		array_key_exists($controller, $arr) || $arr['controller'] = $controller;
		array_key_exists('action', $arr) || $arr['action'] = $action;
		$str = '/?';
		foreach ($arr as $key=>$val){
			if(!is_int($key)){
				$str .= $key .'='. $val .'&';
			}
		}
		$str = substr($str, 0, -1);
		Response::redirect($str);
	}
	
	protected function _forward(Array $arr){
		$controller = empty($_GET['c']) ? C('defaultController') : $_GET['c'];
		$action = empty($_GET['a']) ? C('defaultAction') : $_GET['a'];
		
		array_key_exists('Controller', $arr) && $controller = $arr['Controller'];
		array_key_exists('action', $arr) && $action = $arr['Action'];
		
		$controller .= 'Controller';
		if($controller === get_class()){
			if(method_exists($this, $action)){
				$this->$action();
			}else{
				throw new Exception('参数非法');
			}
		}else{
			if(class_exists($controller)){
				$class = new $controller;
				if(method_exists($class, $action)){
					$class->$action();
				}else{
					throw new Exception('参数非法');
				}
			}else{
				throw new Exception('参数非法');
			}
		}
	}
}