<?php
/**
 * Description of Application
 *
 * @author andrey
 */
class Application extends Controller{
    public static function index() {
        self::render("Application/index");
    }
    
    public static function page($page) {
        self::render("Application/pages/".$page);
    }
}