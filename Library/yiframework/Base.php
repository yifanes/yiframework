<?php
/*
 * 框架基类
 */

class Base{
	public function __call($name, $arguments){
		if(true === C('Debug')){
			echo "not exists method :";
			echo "the name is :";
			var_dump($name);
			echo "the arguments is :";
			var_dump($arguments);
		}
		throw new Exception('not exists method');
	}
}