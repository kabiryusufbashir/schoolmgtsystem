<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\Course;

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
        return view('dashboard.department.edit', compact('dept'));
    }

    public function updateDepartment(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $dept = Department::where('id', $id)->update([
                'name' => $data['name'],
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
}
