<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 下午3:15
 */
class ModelBase extends Base{
    protected $_db = null;
    private $_sqlParser = null;
    private $_options = array(
        'where' =>  '',
        'filed' =>  '',
        'distinct'=>    '',
        'table' =>  '',
        'order' =>  '',
        'group' =>  ''
    );

    public function __construct(){
        $this->_db = ConnectManage::getConnect();
        $this->_sqlParser = new Parser();
    }

    public function __call($name, $arguments)
    {
        $param = array('where','field','distint','table','order','group');
        if(in_array($name, $param)){
            $this->_option[$name] = isset($arguments[0]) ? $arguments[0] : null;
            return $this;
        }else{
            parent::__call($name, $arguments);
        }
    }

    public function execute($sql, Array $arr){
        $this->_db->prepare($sql);
        $this->_db->execute($arr);
    }
    public function getAll(){
        return $this->_db->getAllByAssocArray();
    }

    public function select(){

    }


}