<?php
/**
 * интерфейс запроса
 * @author andrey
 */
interface IQuery {
    public static function select($from, $fields=null);
    public static function insert($into, $fields);
    public static function update($from, $fields);
    public static function delete($from);
    public function limit($from, $to);
    public function addCriteria(ICriteria $criteria);
    public function addOrder(IOrdering $order);
    public function addGruping(IGrouping $group);
    public function getPlainQuery();
    public function setPlainQuery($str);
}