<?php
/**
 * User: zhangxy
 * Date: 13-2-26
 * Time: 下午3:15
 */
class ModelBase extends Base{
    protected $_db = null;
    private $_sqlParser = null;
    private $_options = array(
        'where' =>'',
        'field' =>'',
        'distinct'=>'',
        'table'=>'',
        'order'=>'',
        'group'=>''
    );


    public function __construct(){
        $this->_db = ConnectManage::getConnect();
        $this->_sqlParser = new ParseSql();
    }

    public function __call($name, $arguments)
    {
        if(in_array($name, array(
            'where','field','distinct','table','order','group'
        ))){
            $this->_options[$name] = isset($arguments[0]) ? $arguments[0] : null;
            return $this;
        }else{
            parent::__call($name, $arguments);
        }
    }

    public function execute($sql, Array $arr){
        $this->_db->prepare($sql);
        $this->_db->execute($sql, $arr);
    }
    public function getAll(){
        return $this->_db->getAllByAssocArray();
    }

    public function select(){
        $this->_sqlParser->select($this->_options);
        $this->_db->prepare($this->_sqlParser->getSql());
        $this->_db->execute($this->_sqlParser->getParams());

    }

    public function update(){
        $this->_sqlParser->update($this->_options);

    }
    public function delete(){

    }
    public function insert(){

    }


}