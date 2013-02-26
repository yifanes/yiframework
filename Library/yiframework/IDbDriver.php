<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangxy
 * Date: 13-2-26
 * Time: 上午10:20
 */

interface IDbDriver{
    function prepare($sql);
    function execute(Array $arr);
    function connect();
    function close();
    function getAllByAssocArray();
    function beginTrans();
    function commit();
    function rollback();
}