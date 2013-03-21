<?php
/**
 * User: zhangxy
 * Date: 13-3-21
 * Time: 下午4:24
 */


include FRAMEWORK_PATH . 'View/YiViewCompile.php';
class YiView extends Base {
    /**
     * 模板要输出的变量
     * @var array
     */
    protected $_vars = array();
    /**
     * 模板名
     * @var null
     */
    protected $_tpl = null;

    public function __construct(){}

    /**
     * @desc 辅助输出
     * @param $content
     */
    protected function _output($content){
        echo $content;
    }

    /**
     * @desc 目前只支持字符串赋值和数组赋值
     * @param $name
     * @param string $value
     */
    public function assign($name, $value = ''){
        if(is_array($value)) {
            foreach($value as $key=>$val) {
                $this->_vars[$key] = $val;
            }
        }else{
            $this->_vars[$name] = $value;
        }
    }

    /**
     * $desc 模板渲染函数
     * @param $tpl
     * @return bool
     */
    public function display($tpl){

        if(empty($tpl)) return false;

        $YiTplFile = USERAPP_PATH . 'Modules/Views/' .$tpl . ' . ' .C('view=>defaultSuffix');
        ob_start();
        ob_implicit_flush(false);
        $contents = ob_get_clean();

        $compile = new YiViewCompile();

        $contents = $compile->compile($contents, $YiTplFile);
        $this->_output($contents);

    }


}