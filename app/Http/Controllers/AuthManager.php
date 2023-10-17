<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return view("welcome");
        }
        return view("login");
    }

    function admin(){
        return view("adminPage");
    }

    function registration(){
        if(Auth::check()){
            return view("welcome");
        }
        return view("registration");
    }

    function loginPost(Request $request){
        //Geeft automatisch een error
        $request -> validate([
            "email" => "required",
            "password" => "required"
        ]);

        $credentials = $request ->only("email" , "password");

        if(Auth::attempt($credentials)){
            return redirect() -> intended(route("home"));
        }else{
            return redirect(route('login'))->with("error" , "Login details are not valid");
        }
    }

    function registrationPost(Request $request){
        $request -> validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);

        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["password"] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return  redirect(route('registration'))->with("error" , "ERROR try again");
        }

        return redirect(route('login'))->with("success" , "registration succes , Login to acces the aplication");

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }
}
