<?php
/**
 * User: zhangxy
 * Date: 13-2-26
 * Time: 下午3:15
 */
class ModelBase extends Base{
    protected $_db = null;
    protected $_table = null;
    private $_sqlParser = null;


    public function __construct(){
        $this->_db = ConnectManage::getConnect();
        $this->_sqlParser = new Parser();
    }

    public function __call($name, $arguments)
    {

    }

    public function execute($sql, Array $arr){
        $this->_db->prepare($sql);
        $this->_db->execute($sql, $arr);
    }
    public function getAll(){
        return $this->_db->getAllByAssocArray();
    }

    public function select(){

    }

    public function getTable(){
        return $this->_table;

    }
    public function setTable($tableName){
        $this->_table = $tableName;
        return true;
    }
    public function count(){

    }
    public function update(){

    }
    public function delete(){

    }
    public function insert(){

    }
    public function fetchOneList(){

    }
    public function fetchAll(){

    }
    public function fetchAllField(){

    }

}