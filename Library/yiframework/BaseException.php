<?php
class BaseException extends Exception{
	public function printStack(){
		if(true === C('debug')){
			echo parent::getTraceAsString();
		}else{
			$this->_toLogFile(parent::getTraceAsString());
			$this->_outputErrorPage();
		}
	}
	
	public function __toString(){
		if(true !== C('debug')){
			$this->_toLogFile(parent::getTraceAsString());
			$this->_outputErrorPage();
			exit;		
		}
		return parent::__toString();
	}
	protected function _toLogFile($str){
		file_put_contents(APP_PATH.'error.log', $str, FILE_APPEND);
	}
	protected function _outputErrorPage(){
		header("content-type:text/html");
		echo file_get_contents(APP_PATH.'error.html');
	}
}
