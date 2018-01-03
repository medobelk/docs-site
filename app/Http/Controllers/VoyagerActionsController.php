<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Review;
use App\AnonimRequest;
use App\Visit;
use App\User;
use App\Analyze;
use App\Mail\VisitRegistered;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\File\UploadedFile; 

class VoyagerActionsController extends Controller
{
    /**
     * POST Custom From Enrolls
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function visit(Request $request, $id)
    {
        $enroll = AnonimRequest::where('id', $id)->first();
        $visit = new Visit();
        $patient = User::where([
	        	['email', '=', $enroll->email], 
	        	['phone', '=', $enroll->phone]
        	])
        ->orWhere([
	        	['email', '=', $enroll->email], 
	        	['phone', '=', substr($enroll->phone, 3)]
        	])
        ->first();
        
        $visit->name = $patient ? $patient->name : $enroll->name;
        $visit->complaints = $enroll->complaints;
        $visit->visit_date = $enroll->date;
        $visit->phone = $patient ? $patient->phone : $enroll->phone;
        $visit->email = $patient ? $patient->email : $enroll->email;
        $visit->status = $patient ? 'registered' : 'anonimous';
        $visit->save();

        $enroll->status = 'enrolled';
        $enroll->save();

        $mailTo = $patient ? $patient->email : $enroll->email;
        //Mail::to( $mailTo )->send( new VisitRegistered( $visit ) );

        return back()->with([
                'message' => 'Визит успешно зарегистрирован',
                'alert-type' => 'success',
            ]);
    }

    /**
     * POST Custom From Reviews
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function review(Request $request, $id)
    {
        $review = Review::where('id', $id)->first();
        $review->status = 'APPROVED';
        $review->save();
        
        return back()->with([
                'message' => 'Отзыв успешно опубликован',
                'alert-type' => 'success',
            ]);
    }

    public function reviewHide(Request $request, $id)
    {
    	$review = Review::where('id', $id)->first();
        $review->status = 'PENDING';
        $review->save();
        
        return back()->with([
                'message' => 'Отзыв успешно Скрыт',
                'alert-type' => 'success',
            ]);
    }

    public function analyze(Request $request, $analyze)
    {   
        $successMessage = $analyze === 'new' ? 'успешно добавлен новый анализ' : 'Анализ успешно обновлен';
        $typeMessage = 'success';
        if( $request->hasFile('file') ){
            $file = $request->file('file');
            $fileSavePath = md5(time()).'.'.$file->extension();
        }
;
        if( $analyze === 'new' ){
            $val = Validator::make($request->all(), [
                'analyze_name' => 'required',
                'file' => 'required',
                'user' => 'required',
                'visit' => 'required'
            ]);
            
            if ($val->fails()) {
                return response()->json(['errors' => $val->messages()]);
            }
        }

        if (!$request->ajax()) {
            
            if( $analyze === 'new'){ //[{"download_link":"analyzes\/December2017\/76rksmoRfKI019ubKPCz.txt","original_name":"upwork.txt"}]
                $analyze = new Analyze();
                $analyze->name = $request->analyze_name;
                $analyze->path = '['.json_encode( ['download_link' => "analyzes/{$fileSavePath}", "original_name" => $request->file->getClientOriginalName()] ).']';
                $analyze->user_id = $request->user;
                $analyze->visit_id = $request->visit;
                $analyze->save();

                $file->storeAs(
                    'public/analyzes/', $fileSavePath
                );
            }else{
                if( strlen($request->analyze_name) > 0 ){
                    $analyze = Analyze::where('id', $analyze)->first();
                    $analyze->name = $request->analyze_name;
                    $analyze->path = '['.json_encode( ['download_link' => "analyzes/{$fileSavePath}", "original_name" => $request->file->getClientOriginalName()] ).']';
                    $analyze->user_id = $request->user;
                    $analyze->visit_id = $request->visit;
                    $analyze->save();

                    $file->storeAs(
                        'public/analyzes/', $fileSavePath
                    );
                }else{
                    $successMessage = 'Данных Маловато!';
                    $typeMessage = 'warning';
                }
            }

            return redirect()
                ->back()
                ->with([
                        'message'    => $successMessage,
                        'alert-type' => $typeMessage,
                    ]);
        }
    }

    public function analyzeDelete($analyze)
    {   
        if( $analyze = Analyze::where('id', $analyze)->first() ){
            $analyze = Analyze::where('id', $analyze)->first();
            $analyze->delete();
        }
        return redirect()
            ->back()
            ->with([
                    'message'    => 'Анализ Успешно Удален',
                    'alert-type' => 'success',
                ]);
    }
}
