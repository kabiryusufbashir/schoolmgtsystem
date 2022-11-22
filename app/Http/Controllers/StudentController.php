<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;

class StudentController extends Controller
{
    public function dashboard(){
        return view('student.index');
    }

    // Settings 
    public function settings(){
        return view('dashboard.settings.index');
    }

    public function settingsPhoto(Request $request){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $student_id = Auth::user()->id;
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

        $student_id = Auth::user()->id;
        $password = Hash::make($request->password);
        
        try{

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return redirect()->route('student-settings')->with('error', 'Old Password Doesn\'t Match!');
            }else{
                $password = User::where('id', $student_id)->update([
                    'password'=> $password
                ]);
                return redirect()->route('student-settings')->with('success', 'Password Changed Successfully');
            }
        }catch(Exception $e){
            return redirect()->route('student-settings')->with('error', 'Please try again... '.$e);
        }
    }

}
