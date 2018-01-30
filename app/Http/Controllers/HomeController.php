<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Visit;
use App\Event;
use App\Review;
use App\AnonimRequest;
use App\Question;
use App\Answer;
use App\User;
use App\Sertificate;
use App\Mail\EnrollRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index(Request $request)
    {   

        // $calendarId = "cynerdemid@gmail.com";
        // $result = $google->get($calendarId);

        // $user = new User;

        // $reviews = $user->data(2)->visits();
        // dd($reviews);


        return view('welcome');
    }

    public function erectDisfunction()
    {
        return view('infoPages.erect-disfunction');
    }

    public function pielonefrit()
    {
        return view('infoPages.pielonefrit');
    }

    public function prostatit()
    {
        return view('infoPages.prostatit');
    }

    public function uretrit()
    {
        return view('infoPages.uretrit');
    }

    public function zistit()
    {
        return view('infoPages.zistit');
    }

    public function obrez()
    {
        return view('infoPages.obrezanie');
    }

    public function sertificates()
    {
        $licenses = Sertificate::where('type', 'license')->get();
        $conferences = Sertificate::where('type', 'conference')->get();
        return view('infoPages.sertificates')->with(['licenses' => $licenses, 'conferences' => $conferences]);
    }

    public function sertificate($id)
    {   
        $sertificate = Sertificate::where('id', $id)->first();
        return view('infoPages.sertificate')->with('sertificate', $sertificate);
    }

    public function reviews()
    {
        $reviews = Review::where('status', 'APPROVED')->with('user')->orderBy('created_at', 'desc')->take(6)->get();
        return view('reviews')->with(['reviews' => $reviews] );
    }

    public function questions()
    {
        $questions = Question::whereRaw('LENGTH(answer) > 0')->get()->toArray();

        $questionsLeftPart = array_slice($questions, 0, count($questions) / 2);
        $questionsMiddlePart = array_slice($questions, count($questions) / 2);

        return view('questions')->with([
           
            'questionsLeftPart' => $questionsLeftPart,
            'questionsMiddlePart' => $questionsMiddlePart
        ]);
    }

    public function dialogs(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $answer = Answer::where('question_id', $id)->first();
        return view('dialog')->with( ['question' => $question, 'answer' => $answer] );;
    }

    public function contacts()
    {   
        return view('contacts');
    }

    public function about()
    {   
        // $lastReview = Review::where('status', 'APPROVED')->orderBy('created_at', 'desc')->first();
        $lastReview = Review::where('status', 'APPROVED')->latest()->with('user')->first();

        return view('about-doctor')->with('review', $lastReview);
    }

    public function diseases()
    {
        return view('diseases');
    }

    public function treatment()
    {
        return view('treatments');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function diseaseMan()
    {
        return view('disease-man');
    }

    public function diseaseWooman()
    {
        return view('disease-wooman');
    }

    public function diseaseKidneys()
    {
        return view('disease-kidneys');
    }

    public function enroll(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|min:15',
            'patient_phone' => [
                'required',
                'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/'
            ],
            'patient_email' => 'required|email',
            // 'g-recaptcha-response' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = array_combine($validator->errors()->keys(), $validator->errors()->all());
            return back()
                ->withInput()
                ->with('form_errors', $errors);
        }

        function generatePassword($length = 8) {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $count = mb_strlen($chars);

            for ($i = 0, $result = ''; $i < $length; $i++) {
                $index = rand(0, $count - 1);
                $result .= mb_substr($chars, $index, 1);
            }

            return $result;
        }

        $password = generatePassword();

        if( User::where('email', $request->patient_email)->first() !== null ){
            $user = User::where('email', $request->patient_email)->first();
            $user->phone = $request->patient_phone;
            $user->save();
        }else{
            $user = new User();
            $user->role_id = 2;
            $user->name = $request->patient_name;
            $user->phone = $request->patient_phone;
            $user->email = $request->patient_email;
            $user->password = Hash::make($password);
            $user->save();
        }

        $enroll = new AnonimRequest();
        $enroll->user_id = $user->id;
        $enroll->date = $request->patient_visit_date !== null ? $request->patient_visit_date : new DateTime('tomorrow');
        $enroll->complaints = $request->patient_complaints;
        $enroll->status = 'fresh';
        $enroll->save();
        // $client = new \GuzzleHttp\Client();
        // $captchaResponse = $client->post('https://www.google.com/recaptcha/api/siteverify', ['form_params' => ['response' => $request['g-recaptcha-response'], 'secret' => '6Lfin0AUAAAAABZq8esE4CAcUIlJsnnaJERW0R5L' ]]);          

        // if ($validator->fails() || count( json_decode($captchaResponse->{'error-codes'} )) > 0) {
        //     $errors = array_combine($validator->errors()->keys(), $validator->errors()->all());
        //     array_push($errors, ['g-recaptcha-response' => 1]);
        //     return back()
        //         ->withInput()
        //         ->with('form_errors', $errors);
        // }

        $to = $user->email;
        $subject = 'Регистрация';
        $message = "
            <html>
                <head>
                    <title>Регистрация</title>
                </head>
                <body>
                    <p>Здравствуйте {$user->name}. Вы были автоматически зарегистрированы на сайте <a href='http://docurolog.od.ua/'>docurolog.od.ua</p>
                    <p>Можете ознакомиться со своей историей болезни.</p>
                    <h4>Данные:</h4>
                    <p>Логин - {$user->email}</p>
                    <p>Пароль - {$password}</p>
                </body>
            </html>
        ";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
        // mail($to, $subject, $message, $headers);

        // несколько получателей
        $to = env('SITE_EMAIL', 'cynerdemid@gmail.com'); // обратите внимание на запятую 
        // тема письма
        $subject = 'Новый Пользователь';
        // текст письма
        $message = "
            <html>
                <head>
                    <title>Новый Пользователь</title>
                </head>
                <body>
                    <h1>Новая Запись</h1>
                    <p><b>{$user->name}</b> создал новую заявку на Вашем сайте в ".date('d.m.Y', strtotime($enroll->created_at))."</p>
                    <h4>Данные</h4>
                    <p>Номер: {$user->phone}</p>
                    <p>Почта: {$user->email}</p>
                    <p>Жалобы:</p>
                    <span>{$enroll->complaints}</span>
                </body>
            </html>
        ";

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        

        // Отправляем
        mail($to, $subject, $message, $headers);

        // Mail::to( 'urologinod@gmail.com' )->send( new EnrollRegistered( $userRequest ) );
        // Mail::to( env('MAIL_USERNAME') )->send( new EnrollRegistered( $userRequest ) );

        return redirect('success-enroll');
    }

    public function successEnroll()
    {
        return view('enroll-success');
    }

    public function createQuestion(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            // 'question_name' => 'required|min:15',
            'question_email' => 'required|email',
            'question_complaints' => 'required|min:30',
            'g-recaptcha-response' => 'required'
        ]);

        // if ($validator->fails()) {
        //     return back()
        //                 ->withInput()
        //                 ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        // }
        //$validator->errors()->keys();

        $client = new \GuzzleHttp\Client();
        $captchaResponse = $client->post('https://www.google.com/recaptcha/api/siteverify', ['form_params' => ['response' => $request['g-recaptcha-response'], 'secret' => '6Lfin0AUAAAAABZq8esE4CAcUIlJsnnaJERW0R5L' ]])->getBody()->getContents();

        if ($validator->fails() || json_decode($captchaResponse)->{'success'} === false) {
            if(property_exists($captchaResponse, 'error-codes')){
                if( count(json_decode($captchaResponse)->{'error-codes'}) > 0 ){
                    array_push($errors, ['g-recaptcha-response' => 1]);
                }
            }
            $errors = array_combine($validator->errors()->keys(), $validator->errors()->all());
            return back()
                ->withInput()
                ->with('form_errors', $errors);
        }

        $question = new Question();

        $question->name = strlen($request->question_name) > 0 ? $request->question_name: 'Аноним';
        $question->email = $request->question_email;
        $question->complaints = $request->question_complaints;
        $question->subscribe = $request->question_subscription === 'on' ? 1 : 0;
        $question->save();

        return redirect('success-question');
    }

    public function successQuestion()
    {
        return view('question-success');
    }

    public function undefinderRouter($undfPath)
    {
        return view('errors.404');
    }
}
