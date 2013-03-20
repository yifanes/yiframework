<?php
/**
 * User: zhangxy
 * Date: 13-2-26
 * Time: 下午2:47
 */
class ConnectManage extends Base{
    private static  $_instance = null;

    private function __construct(){

    }

    public static function getConnect(){
        if(!(self::$_instance instanceof self)){
            switch(C('db=>driver')){
                case 'pdo':
                    self::$_instance = new PdoDriver();
                    break;
                default:
                    self::$_instance = new PdoDriver();
                    break;
            }
        }
        return self::$_instance;
    }
    public function __clone(){

    }
    public static function releaseConnect(){
        if(null !== self::$_instance){
            self::$_instance.close();
        }
    }

}
