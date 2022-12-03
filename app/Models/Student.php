<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric_no',
        'title',
        'first_name',
        'last_name',
        'other_name',
        'dob',
        'gender',
        'lga',
        'state',
        'nationality',
        'marital_status',
        'address',
        'city',
        'state',
        'country',
        'email',
        'phone',
        'department',
        'photo',
        'username',
        'password',
        'status',
        'programme',
    ];

    public function checkPayment()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        if($session_semester == 'First Semester'){
            $check_payment_session = Studentregistrationsession::where('session', $session_id)->where('student_id', $student_id)->count();
            return $check_payment_session;
        }else if($session_semester == 'Second Semester'){
            $check_payment_semester = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->count();
            return $check_payment_semester;
        }

    }

    public function checkSessionPayment()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        if($session_semester == 'First Semester'){
            $check_payment_session = Studentregistrationsession::where('session', $session_id)->where('student_id', $student_id)->count();
            $session_return = $session_semester.'-'.$check_payment_session;
            return $session_return;
        }else if($session_semester == 'Second Semester'){
            $check_payment_semester = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->count();
            $semester_return = $session_semester.'-'.$check_payment_semester;
            return $semester_return;
        }

    }

    public function paymentSessionStatus()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        if($session_semester == 'First Semester'){
            $check_payment_session = Studentregistrationsession::where('session', $session_id)->where('student_id', $student_id)->count();
            if($check_payment_session > 0){
                $check_payment_session = Studentregistrationsession::where('session', $session_id)->where('student_id', $student_id)->first();
                $status = $check_payment_session->status;
                    if($status == 1){
                        return 'Pending';
                    }else if($status == 2){
                        return 'Paid';
                    }
            }else{
                return 'Not Paid';
            }
        }

    }

    public function paymentSemesterStatus()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        $registration_check = Registration::orderby('id', 'desc')->limit(1)->first();
        $session_id =  $registration_check->id;
        $session_semester =  $registration_check->semester;

        $check_payment_session = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->count();
        if($check_payment_session > 0){
            $check_payment_session = Studentregistrationsemester::where('session', $session_id)->where('student_id', $student_id)->first();
            $status = $check_payment_session->status;
                if($status == 1){
                    return 'Pending';
                }else if($status == 2){
                    return 'Paid';
                }
        }else{
            return 'Not Paid';
        }

    }

    public function checkCourseRegistered()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        
        $registered = Studentregistrationsession::where('student_id', $student_id)->where('status', 2)->where('registered', 1)->count();
        
        if($registered > 0){
            return '1';
        }else{
            return '';
        }
    }

    public function sessionRegistered()
    {
        $student_id = Auth::guard('students')->user()->user_id;
        
        $registered = Studentregistrationsession::where('student_id', $student_id)->where('status', 2)->where('registered', 1)->distinct()->get();
        
        if(count($registered) > 0){
            return $registered;
        }else{
            return '';
        }
    }

    public function sessionYear($id)
    {
        if($id != 0){
            $session_year = Registration::where('id', $id)->first(); 
            return $session_year->session;
        }else{
            return '';
        }
    }

    public function department($id)
    {
        if($id != 0){
            $department = Department::where('id', $id)->first(); 
            return $department->name;
        }else{
            return '';
        }
    }

    public function programme($id)
    {
        if($id != 0){
            $programme = Programme::where('id', $id)->first(); 
            return $programme->name;
        }else{
            return '';
        }
    }

    public function fullName($id)
    {
        if($id){
            $student = Student::where('user_id', $id)->first();
            $title = $student->title;
            $first_name = $student->first_name;
            $last_name = $student->last_name;
            $other_name = $student->other_name;
            $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
            
            return $full_name;
        }else{
            return '';
        }
    }

    public function studentFullName($id)
    {
        if($id != ''){
            $student = Student::where('user_id', $id)->first();
            if($student){
                $title = $student->title;
                $first_name = $student->first_name;
                $last_name = $student->last_name;
                $other_name = $student->other_name;
                $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
                
                return $full_name;
            }
        }else{
            return '';
        }
    }

    public function studentDepartment($student_id)
    {
        if($student_id){
            $student = Student::where('user_id', $student_id)->first();
            $student_dept = $student->department;
                if($student_dept){
                    $student_department = Department::where('id', $student_dept)->first();
                    if($student->department != 0){
                        return $student_department->name;
                    }else{
                        return '';
                    }
                }else{
                    return '';
                }
        }else{
            return '';
        }
    }

    public function studentYearAdmitted($id)
    {
        if($id != 0){
            $student = Student::where('user_id', $id)->first(); 
            return $student->year_admitted;
        }else{
            return '';
        }
    }

    public function cumulativeWeight($student, $session, $semester){
        $results = Result::where('student_id', $student)->where('session', $session)->where('semester', $semester)->get();
            
            $weight = 0;

            foreach($results as $result){
                $ca = $result->ca;
                $course_id = $result->course;
                $exams = $result->exams;
                $percentage_score = $exams + $ca;
                
                $course = Course::where('id', $course_id)->first();
                $course_unit = $course->course_unit;

                    if($percentage_score >= 70){
                        $weight += $course_unit * 5;
                    }else if($percentage_score >= 60 && $percentage_score <= 69){
                        $weight += $course_unit * 4;
                    }else if($percentage_score >= 50 && $percentage_score <= 59){
                        $weight += $course_unit * 3;
                    }else if($percentage_score >= 45 && $percentage_score <= 49){
                        $weight += $course_unit * 2;
                    }else if($percentage_score >= 44 && $percentage_score <= 40){
                        $weight += $course_unit * 1;
                    }else{
                        $weight += $course_unit * 0;
                    }
            }
            
        return $weight;
    }

    public function creditUnit($student, $session, $semester){
        $results = Result::where('student_id', $student)->where('session', $session)->where('semester', $semester)->get();
            
            $unit = 0;

            foreach($results as $result){
                $course_id = $result->course;
                $course = Course::where('id', $course_id)->first();
                $unit += $course->course_unit;

            }
            
        return $unit;
    }

    public function totalCumulativeWeight($student){
        $results = Result::where('student_id', $student)->get();
            
            $weight = 0;

            foreach($results as $result){
                $ca = $result->ca;
                $course_id = $result->course;
                $exams = $result->exams;
                $percentage_score = $exams + $ca;
                
                $course = Course::where('id', $course_id)->first();
                $course_unit = $course->course_unit;

                    if($percentage_score >= 70){
                        $weight += $course_unit * 5;
                    }else if($percentage_score >= 60 && $percentage_score <= 69){
                        $weight += $course_unit * 4;
                    }else if($percentage_score >= 50 && $percentage_score <= 59){
                        $weight += $course_unit * 3;
                    }else if($percentage_score >= 45 && $percentage_score <= 49){
                        $weight += $course_unit * 2;
                    }else if($percentage_score >= 44 && $percentage_score <= 40){
                        $weight += $course_unit * 1;
                    }else{
                        $weight += $course_unit * 0;
                    }
            }
            
        return $weight;
    }

    public function totalCreditUnit($student){
        $results = Result::where('student_id', $student)->get();
            
            $unit = 0;

            foreach($results as $result){
                $course_id = $result->course;
                $course = Course::where('id', $course_id)->first();
                $unit += $course->course_unit;

            }
            
        return $unit;
    }
}
