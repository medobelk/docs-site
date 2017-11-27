<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Answer
 *
 * @author SanSmith
 */
class Answers extends DAO{

    public $text;
    public $date;
    public $question_id;


     public function  validate() {
        return parent::validate() &&
            Validator::validateField("text", $this->text)->maxLength(16000)->check()&&
            Validator::validateField("date", $this->date)->maxLength(10)->check()&&
            Validator::validateField("question_id", $this->question_id)->integer()->check();
   }

   public function getQuestion(){
       $Question = Question::findById($this->question_id);
       return $Question;
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

