<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QA
 *
 * @author SanSmith
 */
class QA extends Controller {

    public static function form(){
        $list = Questions::findByCriteria(
            Criteria::newInstance()->addQuery(Field::newField("id"), 'in', new Query("select question_id from answers"))
        );
		$tmp = array();
		if (isSet($list[0])) {$tmp[0]=$list[0];}
		if (isSet($list[1])) {$tmp[1]=$list[1];}
        self::render("QA/form", array('list'=>$tmp));
    }

    public static function request(){
        $q = new Questions();
        $q->name = (strlen($_POST['name'])==0)?'Аноним':$_POST['name'];
        $q->email = $_POST['email'];
        $q->text = $_POST['text'];
        $q->date = date("Y-m-d");

        if ($q->validate()){
            $q->save('questions');
            self::sucsess();
        } else {
            self::err($q);
        }
    }

    public static function sucsess(){
        $list = Questions::findByCriteria(
            Criteria::newInstance()->addQuery(Field::newField("id"), 'in', new Query("select question_id from answers"))
        );
		$tmp = array();
		if (isSet($list[0])) {$tmp[0]=$list[0];}
		if (isSet($list[1])) {$tmp[1]=$list[1];}
        self::render('QA/sucsess', array('list'=>$tmp));
    }

    public static function err($q){
        $list = Questions::findByCriteria(
            Criteria::newInstance()->addQuery(Field::newField("id"), 'in', new Query("select question_id from answers"))
        );
		$tmp = array();
		$arr = $q->arr();
		if (isSet($list[0])) {$tmp[0]=$list[0];}
		if (isSet($list[1])) {$tmp[1]=$list[1];}
		$arr['list'] = $tmp;
        self::render('QA/err', $arr);
    }

    public static function getlist(){
        $list = Questions::findByCriteria(
            Criteria::newInstance()->addQuery(Field::newField("id"), 'in', new Query("select question_id from answers"))
        );
        self::render('QA/list', array('list'=>$list));
    }

    public static function view($id){
        $Question = Questions::findById($id);
        self::render('QA/view', array('Question'=>$Question));

    }

}

