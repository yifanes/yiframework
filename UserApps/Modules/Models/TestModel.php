<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-3-19
 * Time: 下午2:55
 */

class TestModel extends ModelBase {
    private $_db = 'test';

    public function getAllDataById($id){
        return $this->getAll($id);
    }
}