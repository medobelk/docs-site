<?php
/**
 * Description of DAO
 *
 * @author andrey
 */
class DAO {
    public $id = null;
    public static $_table = null;

//    public static function getTableName() {
//        return strtolower(get_called_class());
//    }

    public function fill($array){
        $fields = get_object_vars($this);
        foreach ($fields as $name => $value) {
            if (isSet($array[strtolower($name)])){
                $this->$name = $array[strtolower($name)];
            }
        };
    }

    public function arr() {
        $arr = get_object_vars($this);
        return $arr;
    }

    public static function findByCriteria($class, ICriteria $criteria, IOrdering $ord = null) {
        $table_name = strtolower($class);
        if ($ord==null){
            $res = DBA::buildDB()->query(
                    Query::select($table_name)->addCriteria($criteria)->addOrder(Ordering::newInstance()->add(Field::newField('id'), 'DESC'))
                );
        } else {
            $res = DBA::buildDB()->query(
                    Query::select($table_name)->addCriteria($criteria)->addOrder($ord)
                );
        }
	
	if (($res==null)||($res->getRowsCount()==0)){
            return array();
        }
        $arr = $res->fetch();
        $collection = array();
        for ($i = 0; $i < count($arr); $i++) {
            $collection[$i] = new $class();
            $collection[$i]->fill($arr[$i]);
        }
        //echo var_dump($res);
        return $collection;
    }

    public static function findById($class, $id) {
        $res = self::findByCriteria($class,
                            Criteria::newInstance()->addVal(
                                    Field::newField("id"), "=", $id
                            )
        );
        return $res[0];
    }

    public static function find() {
        $cnt = func_num_args();
        if ($cnt<2){
            return null;
        } else {
            error_log("Not implement eat");
        }
    }

    public static function findAll($class){
        return self::findByCriteria($class, 
                            Criteria::newInstance()->plain("")
        );
    }

    public function save($class) {
        $this->id = intval($this->id);
        if ($this->validate()){
           $fields = get_object_vars($this);
           unset($fields['id']);
           unset($fields['_table']);
            if ($this->id == null){
               $this->id = DBA::buildDB()->query(
                    Query::insert(strtolower($class), $fields)
               );
            } else {
               //$fields['text'];
               DBA::buildDB()->query(
                    Query::update(strtolower($class), $fields)->addCriteria(
                            Criteria::newInstance()->addVal(
                                    Field::newField("id"), "=", $this->id
                            )
                    )
               );
            }
        }
    }

    public function delete($class) {
        if ($this->id != null){
            DBA::buildDB()->query(
               Query::delete($this->getTableName())->addCriteria(
                       Criteria::newInstance()->add(Field::newField("id"), "=", $this->id)
                               )
            );
        }
    }

    public static function deleteById($class, $id) {
//        var_dump(Query::delete($class)->addCriteria(
//                       Criteria::newInstance()->add(Field::newField("id"), "=", $id)
//                               ));
            $q = Query::delete(strtolower($class))->addCriteria(
                       Criteria::newInstance()->add(Field::newField("id"), "=", $id)
                               );
            DBA::buildDB()->query($q);
    }

    public static function deleteByCriteria($class, ICriteria $criteria){
            $table_name = strtolower($class);
            DBA::buildDB()->query(
               Query::delete($table_name)->addCriteria($criteria)
            );
    }

    public function validate(){
        if ($this->id==null) return true;
        return Validator::validateField("id", $this->id)->integer()->check();
    }

    public function toString(){
        return $this->id;
    }

    //культиватор КПС-4 (18-20,5 тыс. грн.), сеялка СЗТ-3,6 (15-27...45..69,7(!sic) ) цена?..
}
