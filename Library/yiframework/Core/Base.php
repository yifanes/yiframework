<?php
/*
 * 框架基类
 */

class Base{
    //方法不存在调用的魔术方法
	public function __call($name, $arguments){
		if(true === C('Debug')){
			echo "not exists method :{$name}";
			echo "the arguments is :";
			var_dump($arguments);
		}
		throw new Exception('not exists method');
	}
}