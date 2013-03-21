<?php
/**
 * User: zhangxy
 * Date: 13-3-21
 * Time: 下午4:06
 */

/**
 * view 的工厂
 * Class ViewFactory
 */
class ViewFactory extends Base {
    public static function factory(){
        switch(C('view=>type')) {
            case 'yiview':
                include FRAMEWORK_PATH.'View/YiView.php';
                return new yiView();
                break;
            case 'smarty':
                break;
            case 'default':
                include FRAMEWORK_PATH . 'ViewException.php';
                throw new ViewException(NOT_EXISTS_TEMPLATE);
                break;
        }
    }

}