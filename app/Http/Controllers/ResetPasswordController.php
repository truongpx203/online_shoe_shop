<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create()
    {
        return view('reset_password');
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $user->forgot_token = Str::random(64);
        $user->save();

        Mail::to($user->email)->send(new \App\Mail\MyTestMail($user->forgot_token, $user->name));

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($forgot_token) { 

        return view('forgot_pass', ['forgot_token' => $forgot_token]);
    }

    public function submitResetPasswordForm(Request $request){

        $pass_token = bcrypt($request->password);
 
        DB::table('users')->update([
            'password' => $pass_token
        ]);
        return redirect()->route('login');
    }

}

