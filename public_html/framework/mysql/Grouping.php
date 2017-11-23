<?php
/**
 * Description of Grouping
 *
 * @author andrey
 */
class Grouping implements IGrouping{
    private $flag=false;
    private $query='';

    public function add(IField $varieble) {
        if ($this->flag){
            $this->query = ', '.$varieble->getName().' ';
        } else {
            $this->query = ' GROUP BY '.$varieble->getName().'';
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