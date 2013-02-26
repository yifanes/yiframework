<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 上午10:22
 */

class PdoDriver extends Base implements IDbDriver{
    private $_db = null;
    private $_pstmt = null;
    public function __construct(){
        $this->connect();
    }

    function prepare($sql)
    {
        if(null !== $this->_pstmt){
            $this->_pstmt = null;
        }
        $this->_pstmt = $this->_db->prepare($sql);
    }

    function execute(Array $arr)
    {
        if(null === $this->_pstmt){
            Logger::log('[Error]:not prepared statement');
        }else{
            if(false === $this->_pstmt->execute($arr)){
                Logger::log('[Error]:sql error,error info is :' .var_dump($this->_pstmt->errorInfo()));
            }else{
                Logger::log('[Notice]:execute sql is succeed');
            }
        }
    }

    function connect()
    {
        try{
            $this->_db = new PDO(C('db=>dsn'), C('db=>user'), C('db=>pwd'), array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "UTF8"'));
            if(null !== $this->_db){
                Logger::log('[Notice]:connect success');
            }else{
                Logger::log('[Error]:connect failed');
            }
        }catch(PDOException $e){
            Logger::log($e);
        }
    }

    function close()
    {
        // TODO: Implement close() method.
        if(null !== $this->_db)
            unset($this->_db);
    }

    function getAllByAssocArray()
    {
        return $this->_pstmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function beginTrans()
    {
        $this->_db->beginTransaction();
    }

    function commit()
    {
        $this->_db->commit();
    }


    function rollback()
    {
        $this->_db->rollback();
    }
}