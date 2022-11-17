<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\Course;
use App\Models\Staff;
use App\Models\Qualification;

class DashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard(){
        return view('dashboard.index');
    }

    // Settings 
    public function settings(){
        return view('dashboard.settings.index');
    }

    public function settingsName(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $system_id = Auth::user()->id;
        $system_name = $request->name;

        try{
            $name = User::where('id', $system_id)->update([
                'name' => $data['name'],
            ]);
            return redirect()->route('root-settings')->with('success', 'Name Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsEmail(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email']
        ]);

        $system_id = Auth::user()->id;
        $system_email = $request->email;

        try{
            $email = User::where('id', $system_id)->update([
                'email' => $data['email'],
            ]);

            return redirect()->route('root-settings')->with('success', 'Email Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsPhoto(Request $request){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $system_id = Auth::user()->id;
        $system_photo = $request->photo;
        $imageName = '/images/staff/'.time().'.'.$request->photo->extension();  

        try{
            $photo = User::where('id', $system_id)->update([
                'photo'=> $imageName
            ]);
                
            $request->photo->move('images/staff', $imageName);

            return redirect()->route('root-settings')->with('success', 'Photo Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsPassword(Request $request){
        $data = $request->validate([
            'old_password' => ['required'],
            'new_password' => 'required|confirmed',
        ]);

        $system_id = Auth::user()->id;
        $password = Hash::make($request->password);
        
        try{

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return redirect()->route('root-settings')->with('error', 'Old Password Doesn\'t Match!');
            }else{
                $password = User::where('id', $system_id)->update([
                    'password'=> $password
                ]);
                return redirect()->route('root-settings')->with('success', 'Password Changed Successfully');
            }
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    // Department 
    public function department(){
        return view('dashboard.department.index');
    }

    public function createDepartment(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);
        
        $dept_name = $request->name;

        try{
            $name = Department::create([
                'name' => $data['name'],
            ]);

            return redirect()->route('all-department')->with('success', $dept_name.' Department Added');

        }catch(Exception $e){
            return redirect()->route('all-department')->with('error', 'Please try again... '.$e);
        }
    }

    public function allDepartment(){
        $departments = Department::orderby('name', 'asc')->paginate(20);
        return view('dashboard.department.department', compact('departments'));
    }

    public function editDepartment($id){
        $dept = Department::findOrFail($id);
        $staff = Staff::where('department', $id)->get();
        return view('dashboard.department.edit', compact('dept', 'staff'));
    }

    public function updateDepartment(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $dept = Department::where('id', $id)->update([
                'name' => $data['name'],
                'hod' => $request->hod,
                'level_coordinator' => $request->level_coordinator,
                'exam_officer' => $request->exam_officer,
            ]);
            return redirect()->route('all-department')->with('success', 'Department Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteDepartment($id){
        $dept = Department::findOrFail($id);
        try{
            $dept->delete();
            return redirect()->route('all-department')->with('success', 'Department Deleted');
        }catch(Exception $e){
            return redirect()->route('all-department')->with('error', 'Please try again... '.$e);
        }
    }

    // Course 
    public function course(){
        $departments = Department::orderby('name', 'asc')->get();
        return view('dashboard.course.index', compact('departments'));
    }

    public function createCourse(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'course_code' => ['required'],
            'course_type' => ['required'],
            'course_unit' => ['required'],
            'department' => ['required'],
        ]);
        
        $course_name = $request->name;
        $course_code = $request->course_code;
        $course_type = $request->course_type;
        $course_unit = $request->course_unit;
        $dept_name = $request->department;

        try{
            $name = Course::create([
                'name' => $data['name'],
                'course_code' => $data['course_code'],
                'course_type' => $data['course_type'],
                'course_unit' => $data['course_unit'],
                'department' => $data['department'],
            ]);

            return redirect()->route('all-course')->with('success', $course_name.' Course Added');

        }catch(Exception $e){
            return redirect()->route('all-course')->with('error', 'Please try again... '.$e);
        }
    }

    public function allCourse(){
        $courses = Course::orderby('name', 'asc')->paginate(20);
        return view('dashboard.course.course', compact('courses'));
    }

    public function editCourse($id){
        $course = Course::findOrFail($id);
        $departments = Department::orderby('name', 'asc')->get();
        
        return view('dashboard.course.edit', compact('course','departments'));
    }

    public function updateCourse(Request $request, $id){
        $data = $request->validate([
            'name' => ['required'],
            'course_code' => ['required'],
            'course_type' => ['required'],
            'course_unit' => ['required'],
            'department' => ['required'],
        ]);

        try{
            $course = Course::where('id', $id)->update([
                'name' => $data['name'],
                'course_code' => $data['course_code'],
                'course_type' => $data['course_type'],
                'course_unit' => $data['course_unit'],
                'department' => $data['department'],
            ]);
            return redirect()->route('all-course')->with('success', 'Course Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteCourse($id){
        $course = Course::findOrFail($id);
        try{
            $course->delete();
            return redirect()->route('all-course')->with('success', 'Course Deleted');
        }catch(Exception $e){
            return redirect()->route('all-course')->with('error', 'Please try again... '.$e);
        }
    }

    // Staff 
    public function staff(){
        $staff = User::orderby('name', 'asc')->get();
        return view('dashboard.staff.index', compact('staff'));
    }

    public function createStaff(){
        $step = 1;
        return view('dashboard.staff.create', compact('step'));
    }

    public function addStaff(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => 'required|email',
            'last_name' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
            'marital_status' => ['required'],
        ]);

        $name = $data['first_name'].' '.$request->last_name.' '.$request->other_name;
        $user_id = $request->first_name.Date('my');
        $password = Hash::make('1234567890');
        $type = 2;

        try{
            $name = User::create([
                'name' => $name,
                'email' => $data['email'],
                'user_id' => $user_id,
                'password' => $password,
                'status' => 1,
                'category' => $type,
                'photo' => '',
            ]);

            $user = User::latest('id')->first();
            $lastid = $user->id;

            $staff = Staff::create([
                'user_id' => $lastid,
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_name' => $request->other_name,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
                'email' => $request->email,
            ]);

            return redirect()->route('staff-edit-step-2', $lastid);

        }catch(Exception $e){
            return redirect()->route('all-staff')->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep1($id){
        $staff = Staff::where('user_id', $id)->first();
        $step = 1;
        return view('dashboard.staff.edit.index', compact('step', 'staff'));
    }

    public function updateStaffStep1(Request $request, $id){
            
        try{
            $staff = Staff::where('user_id', $id)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_name' => $request->other_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
            ]);
        
            return redirect()->route('staff-edit-step-2', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep2($id){
        $staff = Staff::where('user_id', $id)->first();
        $step = 2;
        return view('dashboard.staff.edit.index', compact('step', 'staff'));
    }

    public function updateStaffStep2(Request $request, $id){
        
        try{
            $staff = Staff::where('user_id', $id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);

            return redirect()->route('staff-edit-step-3', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep3($id){
        $staff = Staff::where('user_id', $id)->first();
        $qualification = Qualification::where('user_id', $id)->get();
        $step = 3;
        return view('dashboard.staff.edit.index', compact('step', 'staff', 'qualification'));
    }

    public function updateStaffStep3(Request $request, $id){
        
        // Add Qualification 
        $data = Array(
            'school_name' => $request->school_name,
            'year_graduated' => $request->year_graduated,
            'qualification_name' => $request->qualification_name,
        );

        try{

            $check_record = Qualification::where('user_id', $id)->count();
            
            if($check_record == 0){
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }else{
                $delete_previous_record = Qualification::where('user_id', $id)->delete();
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }

            return redirect()->route('staff-edit-step-4', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep4($id){
        $staff = Staff::where('user_id', $id)->first();
        $departments = Department::orderby('name', 'asc')->get();
        $step = 4;
        return view('dashboard.staff.edit.index', compact('step', 'staff', 'departments'));
    }

    public function updateStaffStep4(Request $request, $id){
        
        if(!empty($request->photo)){
            $data = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'department' => 'required',
            ]);
            
            $imageName = '/images/staff/'.time().'.'.$request->photo->extension();
            $request->photo->move('images/staff', $imageName);  
        }

        $user_photo = $request->photo;
        $user_department = $request->department;

        try{
            if(!empty($request->photo)){
                $photo = User::where('id', $id)->update([
                    'photo'=> $imageName
                ]);
            }

            if(!empty($request->photo)){
                $department = Staff::where('user_id', $id)->update([
                    'department'=> $user_department,
                    'photo'=> $imageName
                ]);
            }else{
                $department = Staff::where('user_id', $id)->update([
                    'department'=> $user_department,
                ]);
            }

            return redirect()->route('all-staff')->with('success', 'Staff Added');
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function allStaff(){
        $staff = User::where('category', 2)->where('status', 1)->orderby('name', 'asc')->paginate(20);
        return view('dashboard.staff.staff', compact('staff'));
    }

    public function deleteStaff($id){
        try{
            $staff = User::where('id', $id)->update([
                'status' => 0,
            ]);
            return redirect()->route('all-staff')->with('success', 'Staff Deleted');
        }catch(Exception $e){
            return redirect()->route('all-staff')->with('error', 'Please try again... '.$e);
        }
    }
}
