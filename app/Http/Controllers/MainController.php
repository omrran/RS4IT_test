<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteInfoMail;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Session;
use App\Models\Companion;
use App\Models\Guest;


class MainController extends Controller
{
    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator);
        Session::put('email',$request->input('email'));
        Mail::to($request->input('email'))->send(new CompleteInfoMail());

        return "check your email ".$request->input('email');
    }

    public function secondPage(Request $request){
        // return $request->all();
        Session::put('countryCode',$request->input('countryCode'));
        Session::put('mobileNo',$request->input('mobileNo'));
        return view('second_page');
    }
    public function thirdPage(Request $request){
        // return $request->all();
        Session::put('firstName',$request->input('firstName'));
        Session::put('lastName',$request->input('lastName'));
        Session::put('birthDate',$request->input('birthDate'));
        Session::put('gender',$request->input('gender'));
        Session::put('placeOfBirth',$request->input('placeOfBirth'));
        Session::put('countryOfResidency',$request->input('countryOfResidency'));
        Session::put('passportNo',$request->input('passportNo'));
        Session::put('issueDate',$request->input('issueDate'));
        Session::put('expiryDate',$request->input('expiryDate'));
        Session::put('placeOfIssue',$request->input('placeOfIssue'));
        Session::put('arrivalDate',$request->input('arrivalDate'));
        Session::put('profession',$request->input('profession'));
        Session::put('organization',$request->input('organization'));
        Session::put('visaDuration',$request->input('visaDuration'));
        Session::put('VisaStatus',$request->input('VisaStatus'));
        Session::put('passportPicture',$request->input('passportPicture'));
        Session::put('personalPicture',$request->input('personalPicture'));
        Session::put('withCompanion',$request->input('withCompanion'));
        if($request->input('withCompanion') == "yes"){
            Session::put('firstNameCompanion',$request->input('firstNameCompanion'));
            Session::put('lastNameCompanion',$request->input('lastNameCompanion'));
            Session::put('birthDateCompanion',$request->input('birthDateCompanion'));
            Session::put('genderCompanion',$request->input('genderCompanion'));
            Session::put('placeOfBirthCompanion',$request->input('placeOfBirthCompanion'));
            Session::put('countryOfResidencyCompanion',$request->input('countryOfResidencyCompanion'));
            Session::put('passportNoCompanion',$request->input('passportNoCompanion'));
            Session::put('issueDateCompanion',$request->input('issueDateCompanion'));
            Session::put('expiryDateCompanion',$request->input('expiryDateCompanion'));
            Session::put('placeOfIssueCompanion',$request->input('placeOfIssueCompanion'));
            Session::put('arrivalDateCompanion',$request->input('arrivalDateCompanion'));
            Session::put('professionCompanion',$request->input('professionCompanion'));
            Session::put('organizationCompanion',$request->input('organizationCompanion'));
            Session::put('visaDurationCompanion',$request->input('visaDurationCompanion'));
            Session::put('VisaStatusCompanion',$request->input('VisaStatusCompanion'));
            Session::put('passportPictureCompanion',$request->input('passportPictureCompanion'));
            Session::put('passportPictureCompanion',$request->input('personalPictureCompanion'));
        }
        
        return view('third_page');
    }
    public function reviewData(Request $request){
        Session::put('CheckInDate5Nigh',$request->input('CheckInDate5Nigh'));
        Session::put('CheckOutDate5Nigh',$request->input('CheckOutDate5Nigh'));
        Session::put('romType',$request->input('romType'));
        return  view('review_page'); 
        // return  Session::all(); 
    }
    public function submitData (Request $request){
        // validation;

        //save data;

        $guest_id = Guest::create([
            'email'             => $request->input('email'),
            "countryCode"       => $request->input('countryCode'),
            "mobileNo"          => $request->input('mobileNo'),
            "firstName"         => $request->input('firstName'),
            "lastName"          => $request->input('lastName'),
            "birthDate"         => $request->input('birthDate'),
            "gender"            => $request->input('gender'),
            "placeOfBirth"      => $request->input('placeOfBirth'),
            "countryOfResidency"=> $request->input('countryOfResidency'),
            "passportNo"        => $request->input('passportNo'),
            "issueDate"         => $request->input('issueDate'),
            "expiryDate"        => $request->input('expiryDate'),
            "placeOfIssue"      => $request->input('placeOfIssue'),
            "arrivalDate"       => $request->input('arrivalDate'),
            "profession"        => $request->input('profession'),
            "organization"      => $request->input('organization'),
            "visaDuration"      => $request->input('visaDuration'),
            "VisaStatus"        => $request->input('VisaStatus'),
            "passportPicture"   => $request->input('passportPicture'),
            "personalPicture"   => $request->input('personalPicture'),
            "withCompanion"     => $request->input('withCompanion'),
            "CheckInDate5Nigh"  =>$request->input('CheckInDate5Nigh'),
            "CheckOutDate5Nigh" =>$request->input('CheckOutDate5Nigh'),
            "romType"           =>$request->input('romType')

        ])->id;

        if($request->input('withCompanion') == "yes"){
            Companion::create([
                "guest_id" => $guest_id ,
                "firstName" => $request->input('firstNameCompanion'),
                "lastName" => $request->input('lastNameCompanion'),
                "birthDate" => $request->input('birthDateCompanion'),
                "gender" => $request->input('genderCompanion'),
                "placeOfBirth" => $request->input('placeOfBirthCompanion'),
                "countryOfResidency" => $request->input('countryOfResidencyCompanion'),
                "passportNo" => $request->input('passportNoCompanion'),
                "issueDate" => $request->input('issueDateCompanion'),
                "expiryDate" => $request->input('expiryDateCompanion'),
                "placeOfIssue" => $request->input('placeOfIssueCompanion'),
                "arrivalDate" => $request->input('arrivalDateCompanion'),
                "profession" => $request->input('professionCompanion'),
                "organization" => $request->input('organizationCompanion'),
                "visaDuration" => $request->input('visaDurationCompanion'),
                "VisaStatus" => $request->input('VisaStatusCompanion'),
                "passportPicture" => $request->input('passportPictureCompanion'),
                "personalPicture" => $request->input('personalPictureCompanion')
        ]);
        
        }
        
        //send email;
        Mail::to($request->input('email'))->send(new ConfirmationMail());        
        //return final page;
        return view('final_page');
    }

    
}
