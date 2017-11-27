<?php
/**
 * Description of Controller
 *
 * @author andrey
 */
class Controller {
    public static function render($action, $params=array()){
        $templater = new Templater();
        $path = Core::$application_path.DIRECTORY_SEPARATOR.'views'
            .DIRECTORY_SEPARATOR.$action.'.php';
        $templater->setEncoding();
        echo $templater->render($path, $params);
    }
}