<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 上午11:32
 */
class TestController extends Controller{
    public function test(){
        $this->distinct()->where()->field()->table()->group()->order()->select();
    }
}