<?php
function __autoload($className){
	$frameworkFileName = FRAMEWORK_PATH.$className.'.php';
	if(is_file($frameworkFileName)){
		include_once $frameworkFileName;
		RETURN;
	}
	
	$configFileName = USERAPP_PATH.'Configs/'.$className.'.php';
	if(is_file($configFileName)){
		include_once $configFileName;
		return;
	}

	$ControllersFileName = USERAPP_PATH.'Modules/Controllers/'.$className.'.php';
	if(is_file($ControllersFileName)){
		include_once $ControllersFileName;
		return;
	}
	
	$ModelsFileName = USERAPP_PATH.'Modules/Models/'.$className.'.php';
	if(is_file($ModelsFileName)){
		include_once $ModelsFileName;
		return;	
	}
	$ViewsFileName = USERAPP_PATH.'Modules/Views/'.$className.'.php';
	if(is_file($ViewsFileName)){
		include_once $ViewsFileName;
		return;
	}
	
	
	$PluginsFileName = USERAPP_PATH.'Plugins/'.$className.'.php';
	if(is_file($PluginsFileName)){
		include_once $PluginsFileName;
		return;
	}
	
	exit('class '.$className.' not found');
	
}
/*
 * 设置或者取得配置
 */
function C($name = null, $val = null){
	static $_config = array();
	//如果name,val值为空,则获取到数组
	if(empty($name)){
		return $_config;
	}elseif(is_string($name)){
		//如果name为字符串,val为空,那么返回键为name的数组
		if(empty($val)){
			//一维
			if(!strpos($name, '=>')){
				return isset($_config[$name]) ? $_config[$name] : null;
			//二维
			}else{
				$name = explode('=>', $name);
				return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
			}
		}else{
			//直接设置
			if(!strpos($name, '=>')){
				$_config[$name] = $val;
			}else{
				//设置二维
				$name = explode('=>', $name);
				$_config[$name[0]][$name[1]] = $val;
			}
		}
		
	}elseif(is_array($name)){
		foreach($name as $k=>$v){
			$_config[$k] = $v;
		}
		return;
	}else{
		throw new Exception('参数类型出错');
		return;
	}
	
}
