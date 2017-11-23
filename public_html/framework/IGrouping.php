<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * интерфейс групировки
 * @author andrey
 */
interface IGrouping {
    public function add(IField $varieble);
    public function getPlain();
    public static function newInstance();
}
