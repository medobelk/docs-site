<?php
/**
 *
 * @author andrey
 */
interface IField {
    public function getName();
    public static function newField($name, $table = null);
}