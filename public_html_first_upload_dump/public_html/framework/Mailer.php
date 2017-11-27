<?php
/**
 * Description of Mailer
 *
 * @author andrey
 */
class Mailer {
    public $to;
    public $subject;
    public $message;
    public $ctype;

    public function  __construct($to, $message='', $subject='(No subject)', $ctype='text/plain') {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->ctype   = $ctype;
    }

    public function send() {
        $this->mail_utf8($this->to, $this->subject, $this->message);
    }

    private function mail_utf8($to, $subject = '(No subject)', $message = '', $header = '') {
        $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: '.$this->ctype.'; charset=UTF-8' . "\r\n";
        if ( 
             !mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header)
           ){
               error_log("Cann`t send e-mail.");
           }
    }

    
    public static function render($controller, $action, $params=array()){
        $templater = new Templater();
        $path = Core::$application_path.DIRECTORY_SEPARATOR.'views'
            .DIRECTORY_SEPARATOR.$controller
            .DIRECTORY_SEPARATOR.$action.'.php';
        $templater->setEncoding();
        return $templater->render($path, $params);
    }
}