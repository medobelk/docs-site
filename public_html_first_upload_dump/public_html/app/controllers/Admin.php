<?php
/**
 * Description of Admin
 *
 * @author andrey
 */


class Admin extends Controller {
    public static function index() {
       if ($_SESSION ['isLogin']==1 ){
           self::mainPage();
       }else{
           self::loginForm();
       }

    }
    public static function loginForm(){
        self::render('Admin/loginForm');
    }
    public static function mainPage(){	
        $array1 = DBA::buildDB()->query(
            new Query("select * from questions where id in (select question_id from answers)")
        )->fetch();
        $array2 = DBA::buildDB()->query(
            new Query("select * from questions where id not in (select question_id from answers)")
        )->fetch();
        self::render('Admin/mainPage', array('HasNotAnswer'=>$array2, 'HasAnswer'=>$array1));
    }

    public static function Login(){
        if(($_POST['user_name']===Core::$_CONFIG['user_name'])&&
            ($_POST['password']===Core::$_CONFIG['password'])){
            $_SESSION ['isLogin']=1;
            self::mainPage();
        }else{
            self::loginForm();
        }
    }

    public static function delQuestion($id){
        Questions::deleteById($id);
        self::mainPage();
    }

    /**
     * bla-bla
     * @param Integer $id Question id
     */
    public static function editAnswer($id){
        $Question = Questions::findById($id);
        $Answer = $Question->getAnswer();
        self::render('Admin/EditForm', array('Question'=>$Question, 'Answer'=>$Answer));
    }
    public static function saveEdit($id){
        $Question = Questions::findById($id);
        $Answer = $Question->getAnswer();
        $Answer->text=$_POST['text'];
        $Answer->save('Answers');
        self::mainPage();
    }


    public static function addAnswer($id){
        $Question = Questions::findById($id);
        self::render('Admin/addForm', array('Question'=>$Question));
    }
    public static function saveAdd($id){
        $Answer = new Answers();
        $Answer->question_id=$id;
	$Question = Questions::findById($id);
        $Answer->date=date("Y-m-d");
        $Answer->text=$_POST['text'];
        $Answer->save('Answers');

	$subject = 'Ответ на вопрос на сайте Doc Urolog';
	$message = "Здравствуйте ".$Question->name.".\n";
        $message .= 'Вы получили ответ на ваш вопрос на сайте Doc Urolog'."\n".'Перейдите по ссылке для получения детальной информации: '.
		Route::buildURL('QA', 'view', array('id'=>$Question->id));
        $mail = new Mailer($Question->email, $message, $subject);
        $mail->send();

        //var_dump(Validator::getErrorsList());
        self::mainPage();
    }

    public static function Logout(){
        $_SESSION ['isLogin']=0;

        self::loginForm();
    }

}
