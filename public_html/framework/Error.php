<?php
/**
 * Description of Error
 *
 * @author andrey
 */
class Error extends Controller{
    public static function index() {

    }

    public static function debug() {
        self::render("debug", Core::$params['error']);
    }
}