<?php

/*
 * des:mvc路由转发
 */
class Route{
	
	//静态方法
	public static function run(){ 
		//定义默认控制器
		$controller = empty($_GET['c']) ? C('defaultController') : trim($_GET['c']);
		//定义默认方法
		$action = empty($_GET['a']) ? C('defaultAction') : trim($_GET['a']);
		$controllerBasePath = APP_PATH.'UserApps/Modules/Controllers/';
		$controllerFilePath = $controllerBasePath .$controller ."Controller.php";
		if(is_file($controllerFilePath)){
			include_once $controllerFilePath;
			$controllerName = $controller . 'Controller';
			if(class_exists($controllerName)){
				$controllerHandler = new $controllerName();
				if(method_exists($controllerName, $action)){
					$controllerHandler->$action();
				}else{
					echo "the method does not exists";
				}
			}else{
				echo "this class not exists";
			}
		}else{
			echo "$controller Controller file not exists";
		}
	}
}