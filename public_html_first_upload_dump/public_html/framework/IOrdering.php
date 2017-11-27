<?php
/**
 * интерфейс сортировки
 * @author andrey
 */
interface IOrdering {
    public function add(IField $varieble, $type='ASC');
    public function getPlain();
    public static function newInstance();
}