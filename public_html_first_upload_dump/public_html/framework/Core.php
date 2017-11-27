<?php
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR;
include $dir.'Autoload.php';
if(!function_exists('get_called_class')) {
function get_called_class() {
    $bt = debug_backtrace();
    //var_dump($bt);
    $l = 0;
    do {
        $l++;
        $lines = file($bt[$l]['file']);
        $callerLine = $lines[$bt[$l]['line']-1];
        preg_match('/([a-zA-Z0-9\_]+)::'.$bt[$l]['function'].'/',
                   $callerLine,
                   $matches);
       if ($matches[1] == 'self') {
               $line = $bt[$l]['line']-1;
               while ($line > 0 && strpos($lines[$line], 'class') === false) {
                   $line--;
               }
               preg_match('/class[\s]+(.+?)[\s]+/si', $lines[$line], $matches);
       }
    }
    while ($matches[1] == 'parent'  && $matches[1]);
    //echo "l=$l\n";
    return $matches[1];
  }
}


/**
 * Description of core
 *
 * @author andrey
 */
class Core {
    public static $_CONFIG = null;
    public static $application_path;
    public static $params = array();
    public static $cookieON = true;


    public static function init($path){
        self::$_CONFIG = include $path.DIRECTORY_SEPARATOR.'config.php';
        self::$application_path = $path;
        setcookie("test", "1");
        self::$cookieON = isSet($_COOKIE['test']);
        autoload::add('Criteria', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Criteria');
        autoload::add('DB', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'DB');
        autoload::add('Grouping', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Grouping');
        autoload::add('Ordering', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Ordering');
        autoload::add('Query', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Query');
        autoload::add('Field', Core::$_CONFIG['db']['dialect'].DIRECTORY_SEPARATOR.'Field');
        date_default_timezone_set(Core::$_CONFIG['timezone']);
        //new DB();
    }

    public static function run($path, $param_str){
        self::init($path);
        self::$params = Route::parseURL($param_str);
        session_name(Core::$_CONFIG['app_name']);
        if (!self::$cookieON && isSet(self::$params['_sid'])){
            session_id(self::$params['_sid']);
        }
        session_start();
        foreach ($_POST as $key => $value) {
            self::$params[$key] = $value;
        }
        $controller = self::$params['controller'];
        $action     = self::$params['action'];
        ob_start();
        //$controller::$action();
        self::callController($controller, $action);
        $content = ob_get_contents();
        ob_end_clean();
        $err = error_get_last();
        if (false /*$err != null*/){
            self::$params['error'] = $err;
            self::$params['controller'] = 'Error';
            if (Core::$_CONFIG['debug']){
                self::$params['action'] = 'debug';
            } else {
                self::$params['action'] = 'index';
            }
            self::logged($err['message'], "errors");
            $controller = self::$params['controller'];
            $action     = self::$params['action'];
            self::callController($controller, $action);
        } else {
            echo $content;
        }
    }

    public static function callController($controller, $action){
        $params = Core::$params;
        unSet($params['controller']);
        unSet($params['action']);
        //
        call_user_func_array($controller.'::'.$action, $params);
    }

    /**
     * ������� ����� ����������
     *
     * @param String $str ������ ���������� � ���
     * @param String $name ��� ����
     */
    public static function logged($str, $name="main") {
         $HFILE=fopen(core::$application_path.DIRECTORY_SEPARATOR."log".DIRECTORY_SEPARATOR.$name.".log","a");
         @$date = date("F j, Y, g:i a");
         $txt = "\n[".$date."]: ".$str;
         fputs($HFILE, $txt); 
         fclose($HFILE); 
    }

    /**
     * @param String $url
     */
    public static function forward($url) {
        header('Location: '.$url);
    }
}