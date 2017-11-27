<?php
/**
 * Description of Validator
 *
 * @author andrey
 */
class Validator{

    private static $fields = array();
    private $hasNotError = true;
    private $currentField = null;
    private $currentValue = null;

    public function doCheck($res, $def_message, $message) {
        if(!$res){
            $msgs = '';
            $msgs = ($message==null)?$this->currentField.' '.$def_message:$message;
            self::addError($this->currentField,$msgs);
        }
        $this->hasNotError = $this->hasNotError && $res;
        return $this;
    }

    public static function addError($field, $message) {
        self::$fields[$field][] =$message;
    }


    public function isNotEmpty($message=null) {
        return $this->doCheck(($this->currentValue!=null)&&(strlen(trim($this->currentValue))>0),
                'mast be not empty',$message);
    }

    public function isEmpty($message=null) {
        return $this->doCheck(self::isNotEmpty($this->currentValue),'mast be empty',$message);
    }

    public function Max($max, $message=null) {
        return $this->doCheck((is_integer($this->currentValue)||is_long($this->currentValue)||is_float($this->currentValue)||  is_double($this->currentValue)) && ($this->currentValue<=$max),
                'mast be not less '.$max,$message);
    }

    public function Min($min, $message=null) {
        return $this->doCheck((is_integer($this->currentValue)||is_long($this->currentValue)||is_float($this->currentValue)||  is_double($this->currentValue)) && ($this->currentValue>=$min),
                'mast be not low '.$min,$message);
    }

    public function maxLength($length, $message=null) {
        return $this->doCheck(is_string($this->currentValue) && (strlen($this->currentValue)<=$length),
                'mast be shorter '.$length.' simbols',$message);
    }

    public function minLength($length, $message=null) {
        return $this->doCheck(is_string($this->currentValue) && (strlen($this->currentValue)>=$length),
                'mast be longest '.$length.' simbols',$message);
    }

    /**
     * ��������� E-Mail
     * @param String $var
     * @return Boolean
     */
    public function mail($message=null) {
        return $this->doCheck(is_string(filter_var($this->currentValue,FILTER_VALIDATE_EMAIL)),
                'mast be email',$message);
    }

    /**
     * ��������� URL
     * @param String $var
     * @return Boolean
     */
    public function url($message=null) {
        return $this->doCheck(is_string(filter_var($this->currentValue,FILTER_VALIDATE_URL)),
                'mast be url',$message);
    }

    public function integer($message=null){
        return $this->doCheck(preg_match('/^(\d)*$/', $this->currentValue),
                'mast be integer',$message);
    }

    public function doublie($message=null){
        return $this->doCheck(is_float($this->currentValue)||  is_double($this->currentValue),
                'mast be float',$message);
    }

    public function pattern($pattern, $message=null){
//        return $this->doCheck(preg_match($pattern, $this->currentValue),
//                'mast be match pattern',$message);
          return $this->doCheck(preg_match($pattern, $this->currentValue),
                'mast be match pattern',$message);
    }

    public function check(){
        $this->currentField = null;
        $this->currentValue = null;
        return $this->hasNotError;
    }

    public static function hasError($name){
        return isSet(self::$fields[$name]);
    }

    public static function hasErrors(){
        return (count(self::$fields)>0);
    }

    public static function getErrorsList(){
        $arr = array();
        foreach (self::$fields as $value) {
            foreach ($value as $msg){
                $arr[]=$msg;
            }
        }
        return $arr;
    }

    public static function getError($name) {
        return isSet(self::$fields[$name])?self::$fields[$name]:null;
    }

    public static function getErrorList() {
        return self::$fields;
    }

    public static function validateField($name, $value) {
        $obj = new Validator($name, $value);
        return $obj;
    }

    public function  __construct($name, $value) {
        $this->hasNotError  = true;
        $this->currentField = $name;
        $this->currentValue = $value;
    }
}