<?php

/**
 * Description of Criteria
 *
 * @author andrey
 */
class Criteria implements ICriteria{
    private $flag=false;
    private $query='';

    public function addVal(IField $varieble, $operator, $value, $sub_op = 'AND') {
        $_val = '';
        if (is_bool($value) || is_float($value) || is_double($value)
                || is_integer($value) || is_long($value)){
            $_val = $value;
        } else {
            $_val = "'".mysql_escape_string($value)."'";
        }
        if ($this->flag){
            $this->query .= ' '.$sub_op.' '.$varieble->getName().' '.$operator.' '.$_val.' ';
        } else {
            $this->query = ' WHERE '.$varieble->getName().' '.$operator.' '.$_val.' ';
            $this->flag = true;
        }
        return $this;
    }

    public function addCrit(IField $varieble, $operator, ICriteria $criteria, $sub_op = 'AND') {
        if ($this->flag){
            $this->query = ' '.$sub_op.' '.$varieble->getName().' '.$operator.' ('.$criteria->getPlain().') ';
        } else {
            $this->query = ' WHERE '.$varieble->getName().' '.$operator.' ('.$criteria->getPlain().') ';
            $this->flag = true;
        }
        return $this;
    }

    public function addQuery(IField $varieble, $operator, IQuery $query, $sub_op = 'AND') {
        if ($this->flag){
            $this->query = ' '.$sub_op.' '.$varieble->getName().' '.$operator.' ('.$query->getPlainQuery().') ';
        } else {
            $this->query = ' WHERE '.$varieble->getName().' '.$operator.' ('.$query->getPlainQuery().') ';
            $this->flag = true;
        }
        return $this;
    }

    public function plain($str) {
        $this->query = $str;
        return $this;
    }

    public function getPlain() {
        return $this->query;
    }

    public static function newInstance(){
        return new Criteria();
    }

    public function add(IField $varieble, $operator, $value, $sub_op = 'AND') {
        if($value instanceof Criteria){
            return $this->addCrit($varieble, $operator, $value, $sub_op);
        } else {
            if ($value instanceof Query){
                return $this->addQuery($varieble, $operator, $value, $sub_op);
            } else {
                return $this->addVal($varieble, $operator, $value, $sub_op);
            }
        }
    }
}