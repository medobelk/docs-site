<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ordering
 *
 * @author andrey
 */
class Ordering implements IOrdering{
    private $flag=false;
    private $query='';

    public function add(IField $varieble, $type='ASC') {
        if ($this->flag){
            $this->query .= ', '.$varieble->getName().' '.$type;
        } else {
            $this->query = ' ORDER BY '.$varieble->getName().' '.$type;
            $this->flag = true;
        }
        return $this;
    }

    public function getPlain() {
        return $this->query;
    }

    public static function newInstance(){
        return new self();
    }
}