<?php
/**
 * Description of Application
 *
 * @author andrey
 */
class Pagec extends Controller{    
    public static function view($name) {
        self::render("Page/".$name);
    }
}