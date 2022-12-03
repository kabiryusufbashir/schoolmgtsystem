<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\User;
use App\Models\Registration;
use App\Models\Studentregistration;
use App\Models\Studentregistrationsession;
use App\Models\Studentregistrationsemester;
use App\Models\Course;
use App\Models\Timetable;
use App\Models\Result;

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
        $status =  $registration_check->active;

        if($status == 0){
            return redirect()->route('student-dashboard')->with('error', 'Registration Closed!');
        }

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

    public function courseRegistration(){
        $page_title = 'course';

        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $status = $registration_check->active;
        $session = $registration_check->session;
        $session_id = $registration_check->id;

        if($status == 0){
            return redirect()->route('student-dashboard')->with('error', 'Registration Closed!');
        }

        $student_dept = Auth::guard('students')->user()->department;
        $student_id = Auth::guard('students')->user()->user_id;

        
        $registered = Studentregistrationsession::where('student_id', $student_id)->where('session', $session_id)->where('status', 2)->where('registered', 1)->count();
        
        if($registered == 1){
            return redirect()->route('student-dashboard')->with('error', 'Course Registration already submitted!');
        }

        $courses = Course::orderby('course_code', 'asc')->get();
        
        $first_semester_courses = Studentregistration::where('student_id', $student_id)->where('session', $session_id)->where('semester', 'First Semester')->get();
        $second_semester_courses = Studentregistration::where('student_id', $student_id)->where('session', $session_id)->where('semester', 'Second Semester')->get();

        return view('student.course.register', compact('page_title', 'session', 'session_id', 'first_semester_courses', 'second_semester_courses', 'courses'));
        
    }

    public function courseRegistrationSubmit(Request $request){
        $data = $request->validate([
            'session' => 'required',
            'semester' => 'required',
        ]);

        $session_year = $request->session;
        $semester = $request->semester;
        $course = $request->course;
        $student_id = Auth::guard('students')->user()->user_id;

        $check_record = Studentregistration::where('course_id', $course)->where('student_id', $student_id)->count();

        if($check_record == 0){
            try{
                $addrecord = Studentregistration::create([
                    'session'=> $session_year,
                    'semester'=> $semester,
                    'student_id'=> $student_id,
                    'course_id'=> $course,
                    'registered_by'=> $student_id,
                ]);

                return redirect()->route('student-course-registration')->with('success', 'Course Added!');
            
            }catch(Exception $e){
                return redirect()->route('student-course-registration')->with('error', 'Please try again... '.$e);
            }
        }else{
            return redirect()->route('student-course-registration')->with('success', 'Course Already Registered!');
        }
    }

    public function courseRegistrationCompleted(Request $request){
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $status = $registration_check->active;
        $session = $registration_check->session;
        $session_id = $registration_check->id;

        if($status == 0){
            return redirect()->route('student-dashboard')->with('error', 'Registration Closed!');
        }

        $student_id = Auth::guard('students')->user()->user_id;    

        try{
            $registered = Studentregistrationsession::where('student_id', $student_id)->where('session', $session_id)->where('status', 2)->update([
                'registered' => 1,
            ]);
            return redirect()->route('student-dashboard')->with('success', 'Registration Submitted successfully');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function courseRegistrationCheck(Request $request){
        $data = $request->validate([
            'session' => 'required',
            'semester' => 'required',
        ]);

        $session_id = $request->session;
        $semester = $request->semester;
        $student_id = Auth::guard('students')->user()->user_id;

        $courses_registered = Studentregistration::where('student_id', $student_id)->where('session', $session_id)->where('semester', $semester)->get();

        $page_title = 'course';

        return view('student.course.check', compact('page_title', 'courses_registered', 'session_id', 'semester'));
    }

    public function courseRegistrationPrint(Request $request){
        $data = $request->validate([
            'session' => 'required',
            'semester' => 'required',
        ]);

        $session_id = $request->session;
        $semester = $request->semester;
        $student_id = Auth::guard('students')->user()->user_id;

        $school = User::where('category', 1)->first();
        $student = Student::where('user_id', $student_id)->first();
        $courses_registered = Studentregistration::where('student_id', $student_id)->where('session', $session_id)->where('semester', $semester)->get();
        $level = Studentregistrationsession::where('student_id', $student_id)->where('session', '<=', $session_id)->count();

        $page_title = 'course';

        return view('student.course.print', compact('page_title', 'courses_registered', 'session_id', 'semester', 'student', 'school', 'level'));
    }

    public function courseRegistrationDelete($id){
        $course = Studentregistration::findOrFail($id);
        try{
            $course->delete();
            return redirect()->route('student-course-registration')->with('success', 'Course Removed');
        }catch(Exception $e){
            return redirect()->route('student-course-registration')->with('error', 'Please try again... '.$e);
        }
    }

    // Timetable 
    public function timetable(){
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $semester =  $registration_check->semester;
        $status =  $registration_check->active;

        $courses_registered = Studentregistration::select('course_id')->where('student_id', $student_id)->where('session', $session_id)->where('semester', $semester)->get();

        $page_title = 'timetable';

        return view('student.timetable.index', compact('page_title', 'courses_registered'));
    
    }

    // Result 
    public function result(){

        $session_term = Result::select('session')->orderby('session', 'asc')->distinct()->get();
        $semester_result = Result::select('semester')->orderby('semester', 'asc')->distinct()->get();
        
        $page_title = 'result';

        return view('student.result.index', compact('page_title', 'session_term', 'semester_result'));
    
    }

    public function resultCheck(Request $request){
        $data = $request->validate([
            'session' => 'required',
            'semester' => 'required',
        ]);

        $session_id = $request->session;
        $semester = $request->semester;
        $student_id = Auth::guard('students')->user()->user_id;

        $results = Result::where('student_id', $student_id)->where('session', $session_id)->where('semester', $semester)->get();

        if(count($results) == 0){
            return redirect()->route('student-dashboard')->with('error', 'Result not found!');
        }

        $page_title = 'result';

        return view('student.result.check', compact('page_title', 'results', 'session_id', 'semester'));
    }

    public function resultPrint(Request $request){
        $data = $request->validate([
            'session' => 'required',
            'semester' => 'required',
        ]);

        $session_id = $request->session;
        $semester = $request->semester;
        $student_id = Auth::guard('students')->user()->user_id;

        $school = User::where('category', 1)->first();
        $student = Student::where('user_id', $student_id)->first();
        $results = Result::where('student_id', $student_id)->where('session', $session_id)->where('semester', $semester)->get();

        if(count($results) == 0){
            return redirect()->route('student-dashboard')->with('error', 'Result not found!');
        }

        $page_title = 'result';

        return view('student.result.print', compact('page_title', 'results', 'session_id', 'semester', 'school', 'student'));
    }

    // Settings 
    public function settings(){
        $page_title = 'settings';
        return view('student.settings.index', compact('page_title'));
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
