<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use App\Models\Student;

class GlobalData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $student_online = Auth::guard('students')->user();
        $student_user_id = Auth::guard('students')->user()->user_id;
        $student_profile = Student::where('user_id', $student_user_id)->first();


        View::share('student_online', $student_online);
        View::share('student_profile', $student_profile);
        return $next($request);
    }
}
