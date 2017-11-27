<?php
/**
 * Description of Page
 *
 * @author andrey
 */
class Page extends DAO{
    public $title;
    public $keywords;
    public $describe;
    public $text;
	
    public function  validate() {
        return parent::validate() &&
            Validator::validateField("title", $this->title)->maxLength(256)->check()&&
            Validator::validateField("keywords", $this->keywords)->maxLength(1024)->check()&&
            Validator::validateField("describe", $this->describe)->maxLength(1024)->check()&&
            Validator::validateField("text", $this->text)->maxLength(8196)->check();
    }
    


    public function delete() {
        parent::delete(__CLASS__);
    }

    public static function deleteByCriteria(ICriteria $criteria) {
        DAO::deleteByCriteria(__CLASS__, $criteria);
    }

    public static function deleteById($id) {
        DAO::deleteById(__CLASS__, $id);
    }

    public static function find() {
        return DAO::find(__CLASS__);
    }

    public static function findAll() {
        return DAO::findAll(__CLASS__);
    }

    public static function findByCriteria(ICriteria $criteria) {
        return DAO::findByCriteria(__CLASS__, $criteria);
    }

    public static function findById($id) {
        return DAO::findById(__CLASS__, $id);
    }
}