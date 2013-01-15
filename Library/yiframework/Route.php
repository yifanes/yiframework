<?php

function __autoload($className){
	$frameworkFileName = FRAMEWORK_PATH.$className.'.php';
	if(is_file($frameworkFileName))
		include_once $frameworkFileName && exit();

	
	$configFileName = USERAPP_PATH.'Configs/'.$className.'.php';
	if(is_file($configFileName))
		include_once $configFileName && exit();
	
	$ControllersFileName = USERAPP_PATH.'Modules/Controllers/'.$className.'.php';
	if(is_file($ControllersFileName))
		include_once $ControllersFileName && exit();

	
	$ModelsFileName = USERAPP_PATH.'Modules/Models/'.$className.'.php';
	if(is_file($ModelsFileName))
		include_once $ModelsFileName && exit();
		
	$ViewsFileName = USERAPP_PATH.'Modules/Views/'.$className.'.php';
	if(is_file($ViewFileNames))
		include_once $ViewFileNames && exit();
	
	$PluginsFileName = USERAPP_PATH.'Plugins/'.$className.'.php';
		include_once $PluginsFilename && exit();
	
	exit('class '.$className.' not found');
	
}

/*
 * des:mvc路由转发
 */
class Route{
	//静态方法
	public static function run(){
		//定义默认控制器
		$controller = empty($_GET['c']) ? 'Index' : trim($_GET['c']);
		//定义默认方法
		$action = empty($_GET['a']) ? 'index' : trim($_GET['a']);
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