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

    public function department($id)
    {
        if($id != 0){
            $department = Department::where('id', $id)->first(); 
            return $department->name;
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
}
