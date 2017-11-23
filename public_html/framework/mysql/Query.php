<?php
/**
 * Description of Query
 *
 * @author andrey
 */
class Query implements IQuery{
    public $query = '';

    public static function delete($from) {
        $obj = new Query();
        $obj->query = 'DELETE FROM '.$from.' ';
        return $obj;
    }

    public function getPlainQuery() {
        return $this->query;
    }

    public static function insert($into, $fields) {
          $keys   = array();
          $data   = array();

          $i=0;
          foreach ($fields as $key => $value){
              $keys[]   =   $key;
              $data[]   = self::protect($value);
          }

          $tmp = "INSERT INTO `".$into.
            "` (`" . implode('`,`',$keys) . "`) VALUES ('".implode("','",$data)."') ";
          $obj = new Query();
          $obj->query = $tmp;
          return $obj;
    }

    public static  function protect($str) {
        return $str;
    }

    public function limit($from, $to) {
        $this->query .= ' LIMIT '.$from.', '.$to.' ';
        return $this;
    }

    public static function select($from, $fields=null) {
        $obj = new Query();
        $list = '';
        if ($fields==null){
            $list = '*';
        } else {
            if (is_array($fields)){
                $flag = false;
                foreach ($fields as $key => $value) {
                    if ($flag){
                        $list .= ', '.$value->getName();
                    } else {
                        $list .= $value->getName();
                        $flag = true;
                    }
                }
            } else {
                $list = $fields;
            }
        }
        $obj->query = 'SELECT '.$list.' FROM '.$from.' ';
        return $obj;
    }

    public static function update($table, $fields) {
          $t='';

          foreach ($fields as $key => $value){
              if ($t==''){$t.=" `".$key."` = '".self::protect($value)."' ";}
              else  {$t.=", `".$key."` = '".self::protect($value)."' ";}
          }

          $tmp = "UPDATE  `".$table."` SET $t ";
          $obj = new Query();
          $obj->query = $tmp;
          return $obj;
    }

    public function addCriteria(ICriteria $criteria) {
        $this->query .= $criteria->getPlain();
        return $this;
    }

    public function addGruping(IGrouping $group) {
        $this->query .= $group->getPlain();
        return $this;
    }

    public function addOrder(IOrdering $order) {
        $this->query .= $order->getPlain();
        return $this;
    }

    public function  setPlainQuery($str) {
        $this->query = $str;
    }

    public function __construct($str='') {
        $this->query = $str;
    }
}