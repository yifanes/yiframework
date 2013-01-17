<?php
class Response extends Base{
	public static function redirect($url){
		if(is_string($url)){
			if(!headers_sent()){
				header("Location:".$url);
				exit();
			}else{
				$str = '<meta http-equiv="Refresh" content="0;url="'.$url.'">';
				exit($str);
			}
		}else{
			throw new Exception('url地址格式不正确');
		}
	}
}
