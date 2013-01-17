<?php

class Config extends Base{
	
	const XML = 1;
	const INI = 2;
	const PHP = 3;
	
	
	public static function factory($which){
		switch ($which){
			case Config::INI:
				return IniConfig::parse(CONFIG_PATH.'config.ini');
				break;
			case Config::XML:
				return XmlConfig::parse(CONFIG_PATH.'config.xml');
				break;
			case Config::PHP:
				return include CONFIG_PATH.'config.php';
				break;
			default:
				return array();
				break;
		}
	}
}
