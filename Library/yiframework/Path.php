<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-22
 * Time: 上午11:15
 */
class Path extends Base{
    private static $_basePath = '';
    private static $_controller = '';
    private static $_action = '';

    public static function setAction($action)
    {
        self::$_action = $action;
    }

    public static function getAction()
    {
        return self::$_action;
    }

    public static function setBasePath($base)
    {
        self::$_basePath = $base;
    }

    public static function getBasePath()
    {
        return self::$_basePath;
    }

    public static function setController($controller)
    {
        self::$_controller = $controller;
    }

    public static function getController()
    {
        return self::$_controller;
    }


}