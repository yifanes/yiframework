<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 下午3:15
 */
class ModelBase extends Base{
    protected $_db = null;

    public function __construct(){
        $this->_db = ConnectManage::getConnect();
    }

    public function execute($sql, Array $arr){
        $this->_db->prepare($sql);
        $this->_db->execute($arr);
    }
    public function getAll(){
        return $this->_db->getAllByAssocArray();
    }
}