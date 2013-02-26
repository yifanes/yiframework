<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 上午11:32
 */
class TestController extends Controller{
    public function test(){
        $test = new PdoDriver();
        $test->prepare('select * from link_lists where id > :id');
        $test->execute(array(
            ':id'=>2
        ));
        $arr = $test->getAllByAssocArray();
        var_dump($arr);
    }
}