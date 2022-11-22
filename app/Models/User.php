<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'password',
        'status',
        'category',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function StaffDepartment($staff_id)
    {
        $staff = Staff::where('user_id', $staff_id)->first();
        $staff_department = Department::where('id', $staff->department)->first();
        if($staff->department != 0){
            return $staff_department->name;
        }else{
            return '';
        }
    }

    public function fullName($id)
    {
        if($id != ''){
            $staff = Staff::where('user_id', $id)->first();
            if($staff){
                $title = $staff->title;
                $first_name = $staff->first_name;
                $last_name = $staff->last_name;
                $other_name = $staff->other_name;
                $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
                
                return $full_name;
            }
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

    public function studentCurrentYear($id)
    {
        if($id != 0){
            $student = Student::where('user_id', $id)->first(); 
            return $student->current_year;
        }else{
            return '';
        }
    }
}
