<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 上午10:04
 */

class Logger extends Base{
    public static function log($param){
        if(is_object($param)){
            if(true === C('debug')){
                echo $param;
            }else{
                file_put_contents(APP_PATH . '/log', $param, FILE_APPEND);
            }
        }elseif(is_string($param)){
            if(true === C('debug')){
                echo $param;
            }else{
                file_put_contents(APP_PATH . '/log', $param, FILE_APPEND);
            }
        }
    }
}