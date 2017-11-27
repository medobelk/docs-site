<?php
/**
 * интерфейс критерия запроса
 */
interface ICriteria {
    public function add(IField $varieble, $operator, $value, $sub_op='AND');
    public function plain($str);
    public function getPlain();
    public static function newInstance();
}

