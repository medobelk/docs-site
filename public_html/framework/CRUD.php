<?php
class CRUD extends Controller{
    public static function isAdmin() {
        return Security::check("admin");
    }
    
    public static function index() {
        if (!self::isAdmin()){
            self::login(); die();
        }
        //var_dump(debug_backtrace());die();
        self::render("Admin/index");
    }
    
    public static function listm($class, $template, $query=null) {
        if (!self::isAdmin()){
            self::login(); die();
        }
        //$collection = new Collection();
        if ($query == null){
            $collection = DAO::findAll($class);//call_user_func_array($class."::findAll", array());
        } else {
            
        }
        $params = array(
            'collection' => $collection,
            //'title' => self::getModelTitle()
        );
        self::render($template, $params);
    }
    
    public static function show($class, $template, $id) {
        if (!self::isAdmin()){
            self::login(); die();
        }
        if(!isSet(Core::$params['object'])){
            $obj = DAO::findById($class, $id);
            self::render($template, $obj->arr());
        } else {
            //$class = self::getModelClassName();
            //$obj = call_user_func_array($class."::findById", array('id'=>$id));
            $obj = DAO::findById($class, $id);
            if ($obj === FALSE){
                throw new Exception('Missing id.');
            }
            $obj->fill(Core::$params);
            $obj->save($class);
            $arr = $obj->arr();
            foreach ($arr as $key => $value) {
                $arr[$key] = stripslashes($value);
            }
            self::render($template, $arr);
        }
    }
    
    public static function blank($class, $template) {
        if (!self::isAdmin()){
            self::login(); die();
        }
        if(!isSet(Core::$params['object'])){
            self::render($template);
        } else {
            //$class = self::getModelClassName();
            $obj = new $class();
            $obj->fill(Core::$params);
            $obj->save($class);
            $_t = '';
            $a = explode("/", $template);
            $_t=$a[0].'/show';
            
            self::render($_t, $obj->arr());
        }
    }
    
    public static function delete($class, $template, $id) {
        if (!self::isAdmin()){
            self::login(); die();
        }
        //echo $id;
        DAO::deleteById($class, $id);
        //call_user_func_array($class."::deleteById", array('id'=>$id));
        self::render($template);
    }
    
    public static function login($login=null, $password=null) {
        if (($login != null) && ($password !=null)){
            if (Security::authenticate($login, $password)){
                //echo "ok";
                self::index();
            } else {
                self::render(self::getLoginTemplate());
            }
        } else {
            self::render(self::getLoginTemplate());
        }
    }
    
    public static function logout() {
        Security::unauthenticate();
        Core::forward(Route::buildURL("Admin", "index"));
        //self::render(self::getLogoutTemplate());
    }
    
    public static function getModelClassName() {
        throw new Exception('Haven`t model in CRUD.');
    }
    
    public static function getModelTitle() {
        throw new Exception('Haven`t model in CRUD.');
    }
    
    public static function getListTemplate() {
        return 'Admin/list';
    }
    
    public static function getShowTemplate() {
        return 'Admin/show';
    }
    
    public static function getBlankTemplate() {
        return 'Admin/blank';
    }
    
    public static function getLoginTemplate() {
        return 'Admin/login';
    }
    
    public static function getLogoutTemplate() {
        return 'Admin/logout';
    }
}