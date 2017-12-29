<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\AnonimRequest;
use App\Visit;
use App\User;
use App\Mail\VisitRegistered;
use Illuminate\Support\Facades\Mail;

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
}
