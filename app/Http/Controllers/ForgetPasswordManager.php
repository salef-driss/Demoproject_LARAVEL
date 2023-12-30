<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;





class ForgetPasswordManager extends Controller
{
    function forgetPassword(){
        return view("forgetPassword");
    }

    function forgetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email",
        ]);

        $token = Str::random(64);

        DB::table("password_reset_tokens")->insert([
            "email" => $request->email,
            "token" => $token,
            "created_at" => Carbon::now()
        ]);

        Mail::send("emails.forget-password", ["token" => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forgot.password"))->with("success" , "We have send an email to reset password.");
    }

    function resetPassword($token){
        return view("new-password",['token' => $token]);
    }

    function resetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|confirmed",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table("password_reset_tokens")
        ->where([
            "email" => $request->email,
            "token" => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->to(route("reset.password"))->with("error", "Invalid");
        }

        User::where("email", $request->email)
        ->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route("login"))->with("succes","Password reset success");
    }
}
