<?php
/**
 * User: zhangxy
 * Date: 13-3-20
 * Time: 上午11:08
 */
class ParseSql extends Base{
    private static $_templateSql = 'SELECT :distinct :field FROM :table WHERE :where :order :group';
    private $_sql = '';
    private $_params = array();

    public function select(Array $options){
        $this->_sql = str_replace(array(
                ':distinct', ':field', ':table', ':where', ':group', ':order'
            ),
            array(
                $this->_distinct($options['distinct']),
                $this->_field($options['field']),
                $this->_table($options['table']),
                $this->_where($options['where']),
                $this->_order($options['order']),
                $this->_group($options['group'])
            ),
            self::$_templateSql);

    }

    /**
     * @desc 获取拼装后sql
     * @return string
     */
    public function getSql (){
        return $this->_sql;
    }

    /**
     * @desc 获取参数
     * @return array
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @desc 拼装distinct 参数
     * @param $distinct
     * @return string
     */
    private function _distinct($distinct) {
        return ($distinct === 'true' || $distinct == 'distinct') ? 'distinct' : '';
    }

    /**
     * @desc 分解字段数组
     * @param $field
     * @return string
     */
    private function _field($field) {
        if(is_array($field)){
            return $this->_parseParamArray($field, ' AS ');
        }elseif(is_string($field) && !empty($field)){
            return $field;
        }else{
            return '*';
        }
    }

    /**
     * @desc 解析table名称 支持别名
     * @param $table
     * @return mixed
     */
    private function _table($table){
        if(is_array($table)){
            return $this->_parseParamArray($table, ' AS　');
        }else{
            return $table;
        }
    }

    /**
     * 解析where表达，暂不支持数组方式
     * @param $where
     * @return mixed
     */
    private function _where($where){
        return $where;
    }

    /**
     * @desc 解析group
     * @param $group
     * @return string
     */
    private function _group($group){
        return empty($group) ? '' : ' GROUP BY '. $group;
    }

    /**
     * @desc 解析order参数
     * @param $order
     * @return string
     */
    private function _order($order){
        if(is_array($order)){
            return ' ORDER BY '.$this->_parseParamArray($order, ' ');
        }elseif(is_string($order) && empty($order)){
            return 'ORDER BY '. $order;
        }else{
            return '';
        }
    }

    /**
     * @desc 对参数数组做解析
     * @param $array
     * @return string
     */
    private function _parseParamArray($array, $type){
        $arr = array();
        foreach ($array as $k=>$v) {
            if(is_numeric($k)){
                $arr = $v;
            }else{
                $arr = "$k .{$type}. $v";
            }
        }
        return implode(',', $arr);
    }

}
