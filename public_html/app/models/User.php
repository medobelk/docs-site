<?php
/**
 * Description of User
 *
 * @author andrey
 */
class User extends DAO{
    public $login;
    public $password;
    

    public function delete() {
        parent::delete(__CLASS__);
    }

    public static function deleteByCriteria(ICriteria $criteria) {
        DAO::deleteByCriteria(__CLASS__, $criteria);
    }

    public static function deleteById($id) {
        DAO::deleteByCriteria(__CLASS__, $criteria);
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