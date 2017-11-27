<?php
/**
 *
 * @author andrey
 */
interface IModel {
    public function  validate();

    public static function findByCriteria(ICriteria $criteria);

    public static function findById($id);
    
    public static function find();

    public static function findAll();

    public function save();

    public function delete();

    public static function deleteById($id);

    public static function deleteByCriteria(ICriteria $criteria);
}