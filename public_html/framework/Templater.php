<?php
/**
 * Description of Templater
 *
 * @author andrey
 */
class Templater {
    private $vals = array();
    private $extends = null;
    private $tmp = null;

    /**
     * ���������� ���������
     */
    public function setEncoding(){
        @header ('Content-type: text/html; charset='.Core::$_CONFIG["encoding"]);
    }

    public function render($path, $params = array()) {
        //var_dump($params);die();
        foreach ($params as $key => $value) {
            $this->vals[$key] = $value;
        }
        $_path   = $path;
        $first   = true;
        $content = '';
        do {
            if ($first){
                $first = false;
            } else {
                $_path = dirname($path).DIRECTORY_SEPARATOR.'..'
                    .DIRECTORY_SEPARATOR.$this->extends.'.php';
                $this->extends = null;
            }
            ob_start();
            include $_path;
            $content = ob_get_contents();
            ob_end_clean();
            if ($this->extends != null){
                $this->tmp = $content;
            }
        } while ($this->extends != null);

        return $content;
    }

    public function extend($name) {
        $this->extends = $name;
    }

    public function doLayout(){
        echo $this->tmp;
    }

    public function  __get($name) {
        return isSet($this->vals[$name])?$this->vals[$name]:null;
    }

    public function  __set($name, $value) {
        $this->vals[$name] = $value;
    }

    public function _($name, $else='', $raw=false){
        echo isSet($this->vals[$name])?(($raw)? $this->vals[$name]:htmlspecialchars($this->vals[$name])):$else;
    }

    public function _e($name, $value, $then, $else=''){
        if (isSet($this->vals[$name])){
            if($this->vals[$name]==$value){
                echo $then;
            } else {
                echo $else;
            }
        }
    }

    public function _isSet($name) {
        return isSet($this->vals[$name]);
    }
}