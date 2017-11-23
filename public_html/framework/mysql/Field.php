<?php
/**
 * Description of Field
 *
 * @author andrey
 */
class Field implements IField{
    private $table = null;
    private $name  = null;

    public function getName() {
        $str = '`'.$this->name.'`';
        if ($this->table != null){
            $str = '`'.$this->table.'`.'.$str;
        }
        return $str;
    }

    public static function  newField($name, $table = null) {
        $obj = new self($name, $table);
        return $obj;
    }

    public function __construct($name, $table) {
        $this->table = $table;
        $this->name  = $name;
    }
}