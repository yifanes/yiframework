<?php
/**
 * User: zhangxy
 * Date: 13-3-19
 * Time: 下午2:55
 */

class TestModel extends ModelBase {

    public function getAllDataById($id){
        return $this->getAll($id);
    }
}