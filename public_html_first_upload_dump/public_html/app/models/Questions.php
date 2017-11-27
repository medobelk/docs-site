<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author SanSmith
 */
error_reporting(E_ALL ^ E_STRICT);
class Questions extends DAO {
    public $name;
    public $email;
    public $text;
    public $date;

    public function  validate() {
        return parent::validate() &&
            Validator::validateField("name", $this->name)->maxLength(64)->check()&&
            Validator::validateField("email", $this->email)->maxLength(64)->check()&&
            Validator::validateField("text", $this->text)->maxLength(1024)->check()&&
            Validator::validateField("text", $this->text)->minLength(3)->check()&&
            Validator::validateField("date", $this->date)->maxLength(10)->check()&&
            Validator::validateField("email", $this->email)->mail()->check();
    }
    public function getAnswer(){
        $tmp = Answers::findByCriteria(
            Criteria::newInstance()->addVal(Field::newField("question_id"), '=', $this->id)
        );
        return $tmp[0];
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
