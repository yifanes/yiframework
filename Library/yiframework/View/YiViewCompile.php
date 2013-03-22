<?php
/**
 * User: zhangxy
 * Date: 13-3-21
 * Time: 下午5:15
 */

/**
 * 模板编译类
 * Class YiViewCompile
 */
class YiViewCompile extends Base {


    /**
     * 标记的记录
     * @var array
     */
    private $_tags = array();

    private function _isCorrentTag($tag) {
        if(preg_match('#\s*?[a-zA-Z:0-9]+(\s+?[a-zA-Z_-]+\s*?=\s*?\"(.*?)\")*\s*#', $tag, $matchArray)){
            return true;
        }
        return false;
    }

    public function compile($contents, $file = null){
        $this->_searchTags($contents, $file);
        //如果打开错误调试，将显示错误信息
        if(C('view=>debug')){
            if($this->_errorInfo){
                foreach($this->_errorInfo as $tmpArr){
                    echo "<br/>" . "<font color='red'>在文件:" . $tmpArr['file'] . '的第' .$tmpArr['lineNumber'] . '行出错了，出错信息为:'
                        . $tmpArr['info'] . '</font>';
                }
                return '';
            }
            $haveError = false;
            foreach ( $this->_tags as $tagName => $tagVal ) {
                if( 0 !== $tagName ) {
                    echo "<font color='red'>不匹配的标签" . $tagName . '</font>';
                    $haveError = true;
                }
            }
            unset($this->_tags);
            if(true === $haveError){
                return '';
            }

        }
        $contents = $this->_mergeFiles($contents);

    }

    private function _mergeFiles($contents){

    }
    protected  function _searchTags($contents, $file) {
        //这里有一个坑，linux是\n  windows是\r\n  mac上是\r 现在处理之针对linux 所以统一是用PHP_EOL常量
        $lineContents = explode(PHP_EOL, $contents);
        foreach($lineContents as $lineNumber => $val){
            $this->_parseLine($lineNumber + 1, $val, $file);
        }
    }
    protected function _parseLine( $lineNumber, $line, $file = '' ) {
        $line = trim($lineNumber);
        $line = preg_replace('#<!(.*?)>#', '', $line);
        if(!$line) return;

        if(preg_match_all('#<!(.*?)>#', $line, $matchedArray)){
            foreach($matchedArray[1] as $tags){
                if(!$this->_isCorrentTag($tags)){
                    $this->logError($file, $lineNumber, "错误的标签格式:".$tags);
                }
            }
        }
    }




}