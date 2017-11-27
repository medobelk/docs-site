<?php
/**
 * Description of Route
 *
 * @author andrey
 */
class Route {
    private static $base_url = null;
    private static $public_path = null;

    private static function init(){
        if (self::$base_url == null){
            self::$base_url = Core::$_CONFIG['base_url'];
            self::$public_path = Core::$_CONFIG['public_path'];
        }
    }

    public static function buildFilePath($path) {
        self::init();
        return self::$base_url.'/'.self::$public_path.'/'.$path;
    }


    public static function buildFilePathRel($path) {
        self::init();
        return '/'.Core::$_CONFIG['public_path'].'/'.$path;
    }

    public static function buildURL($controller, $action, $params=array()){
        self::init();
        $tmp = '';
        foreach ($params as $key => $value) {
            $tmp .= '/'.$key.'/'.$value;
        }
        return self::$base_url.'/'.$controller.'/'.$action.$tmp;
    }
    
    /**
     * ������ ������  URL � �������
     * @return Array
     */
    public static function parseURL($url){
        $res = array();
        $arr  = explode('/', $url);
        if (strlen($arr[0])>0){//�������� controller
            $res['controller'] = $arr[0];
            $res['action']     = $arr[1];
        } else {
            $res['controller'] = 'Application';
            $res['action'] = 'index';
        }
        for ($i=2; $i<count($arr); $i+=2){
            $res[$arr[$i]] = isSet($arr[$i+1])?$arr[$i+1]:0;
        }
        return $res;
    }
}