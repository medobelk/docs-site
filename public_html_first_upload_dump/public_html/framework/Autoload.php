<?php
/**
 * Description of autoload
 *
 * @author andrey
 */
class Autoload {
    private static $list = array();

    public static function get($key){
        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR;
        if (isSet(self::$list[$key])){
            return $dir.self::$list[$key].'.php';
        } else {
            if (file_exists(Core::$application_path.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.$key.'.php'))
                return Core::$application_path.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.$key.'.php';
            if (file_exists(Core::$application_path.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$key.'.php'))
                return Core::$application_path.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$key.'.php';
            if (file_exists(Core::$application_path.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.$key.'.php'))
                return Core::$application_path.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.$key.'.php';
            if (file_exists($dir.$key.'.php'))
                return $dir.$key.'.php';
        }
    }

    public static function add($class, $path){
        self::$list[$class] = $path;
    }
}

function __autoload($class){
    //echo $class;
    include Autoload::get($class);
}