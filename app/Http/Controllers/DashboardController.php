<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;

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

            return redirect()->route('root-department')->with('success', $dept_name.' created successfully');

        }catch(Exception $e){
            return redirect()->route('root-department')->with('error', 'Please try again... '.$e);
        }
    }

    public function allDepartment(){
        $departments = Department::orderby('created_at', 'desc')->paginate(1);
        return view('dashboard.department.department', compact('departments'));
    }
}
