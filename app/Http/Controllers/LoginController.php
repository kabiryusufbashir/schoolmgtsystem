<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'user_id' => ['required'],
            'password' => ['required'],
        ]);

        try{
            if(Auth::attempt(['user_id' => $request->user_id, 'password' => $request->password])){
                try{
                    $user_status =  User::where('user_id', $request->user_id)->first();
                        if($user_status->status == 1){
                            $user_category =  User::where('user_id', $request->user_id)->first();
                            
                            if($user_status->status == 1){
                                $request->session()->regenerate();
                                return redirect()->route('dashboard');    
                            }
                            
                        }else{
                            return back()->with('error', 'Account not Active');
                        }
                }catch(Exception $e){
                    return redirect('/')->with('error', $e->getMessage());            
                }
            }else{
                return back()->with('error', 'Incorrect Login Credentials');
            }
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());
        }

    }

    public function logout(Request $request)
    {   
        Auth::guard('web')->logout();
        return redirect()->route('front');
    }
}
