<?php
class XmlConfig extends Base{
	public static function parse($file){
		if(!is_file($file)){
			throw new Exception("none exists xml file");
		} else {
			return parse_ini_file($file, TRUE);
		}
	}
}
