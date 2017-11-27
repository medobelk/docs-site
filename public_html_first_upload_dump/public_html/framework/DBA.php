<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of DBA
 *
 * @author andrey
 */
class DBA {
    public static $isInit = false;

    public static function init(){
        if (!self::$isInit){
//            autoload::add('Criteria', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Criteria');
//            autoload::add('DB', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'DB');
//            autoload::add('Grouping', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Grouping');
//            autoload::add('Ordering', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Ordering');
//            autoload::add('Query', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Query');
//            autoload::add('Field', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Field');
            self::$isInit = true;
        }
    }

    public static function buildDB(){
        self::init();
        return new DB(Core::$_CONFIG['db']);
    }
}