<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\User;
use App\Models\Registration;
use App\Models\Studentregistrationsession;
use App\Models\Studentregistrationsemester;

class StudentController extends Controller
{

    public function dashboard(){
        $registration = Registration::orderby('id', 'desc')->limit(1)->first();
        $session =  $registration->session;
        $semester =  $registration->semester;
        $page_title = 'dashboard';

        return view('student.index', compact('session', 'semester', 'page_title'));
    }

    // Payment 
    public function payment(){
        $page_title = 'payment';
        return view('student.payment.index', compact('page_title'));
    }

    public function paymentSemester(Request $request){

        $data = $request->validate([
            'session_year' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'semester' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session =  $registration_check->session;
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        $student_id = Auth::guard('students')->user()->user_id;
        $student_username = Auth::guard('students')->user()->username;
        $student_session_payment = $request->session_year;
        $student_semester_payment = $request->semester;

        if($student_semester_payment != ''){
            $semesterimageName = '/images/payment/semester/'.$student_username.'_'.$session_semester.'.'.$request->session_year->extension();  
        }

        if($student_session_payment != ''){
            $sessionimageName = '/images/payment/session/'.$student_username.'_'.$session_id.'.'.$request->semester->extension();  
        }

        try{

            if($student_session_payment != ''){
                $session = Studentregistrationsession::create([
                    'session'=> $session_id,
                    'student_id'=> $student_id,
                    'proof_of_payment'=> $sessionimageName,
                    'status'=> 1,
                ]);
            }
            
            if($student_semester_payment != ''){
                $semester = Studentregistrationsemester::create([
                    'session'=> $session_id,
                    'semester'=> $session_semester,
                    'student_id'=> $student_id,
                    'proof_of_payment'=> $semesterimageName,
                    'status'=> 1,
                ]);
            }

            if($student_semester_payment != ''){
                $request->semester->move('images/payment/semester', $semesterimageName);
            }

            if($student_session_payment != ''){
                $request->session_year->move('images/payment/session', $sessionimageName);
            }
                
            return redirect()->route('student-dashboard')->with('success', 'Payment Submitted');
        
        }catch(Exception $e){
            return redirect()->route('student-dashboard')->with('error', 'Please try again... '.$e);
        }
    }

    // Course 
    public function course(){
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        if($session_semester == 'First Semester'){
            $check_payment_session = Studentregistrationsession::where('session', $session_id)->where('student_id', $student_id)->count();
                
                if($check_payment_session > 0){
                    $check_payment_session = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->first();
                    $status = $check_payment_session->status;
                        if($status == 1){
                            return redirect()->route('student-dashboard')->with('error', 'Payment Not Confirmed Yet');
                        }
                }else{
                    return redirect()->route('student-dashboard')->with('error', 'Payment Not Made');
                }
                
        }else if($session_semester == 'Second Semester'){
            $check_payment_semester = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->count();
                
                if($check_payment_semester > 0){
                    $check_payment_semester = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->first();
                    $status = $check_payment_semester->status;
                        if($status == 1){
                            return redirect()->route('student-dashboard')->with('error', 'Payment Not Confirmed Yet');
                        }
                }else{
                    return redirect()->route('student-dashboard')->with('error', 'Payment Not Made');
                }
        }

        $page_title = 'course';

        return view('student.course.index', compact('page_title'));
    
    }

    // Settings 
    public function settings(){
        return view('student.settings.index');
    }

    public function settingsPhoto(Request $request){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $student_id = Auth::guard('students')->user()->user_id;
        $student_photo = $request->photo;
        $imageName = '/images/student/'.time().'.'.$request->photo->extension();  

        try{
            $photo = User::where('id', $student_id)->update([
                'photo'=> $imageName
            ]);
            
            $photo = Student::where('user_id', $student_id)->update([
                'photo'=> $imageName
            ]);
                
            $request->photo->move('images/student', $imageName);

            return redirect()->route('student-settings')->with('success', 'Photo Updated');
        }catch(Exception $e){
            return redirect()->route('student-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsPassword(Request $request){
        $data = $request->validate([
            'old_password' => ['required'],
            'new_password' => 'required|confirmed',
        ]);

        $student_id = Auth::guard('students')->user()->user_id;
        $student_password = Auth::guard('students')->user()->password;
        
        try{
            if(Hash::check($request->old_password, $student_password)){
                
                $new_password = Hash::make($request->new_password);
                
                $password = User::where('id', $student_id)->update([
                    'password'=> $new_password
                ]);
                
                $password = Student::where('user_id', $student_id)->update([
                    'password'=> $new_password
                ]);

                return redirect()->route('student-settings')->with('success', 'Password Changed Successfully');
            }else{
                return redirect()->route('student-settings')->with('error', 'Old Password Doesn\'t Match!');
            }
        }catch(Exception $e){
            return redirect()->route('student-settings')->with('error', 'Please try again... '.$e);
        }
    }

}
