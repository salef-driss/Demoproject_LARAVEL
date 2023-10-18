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
        if(Auth::check() && Auth::user()->role == "admin"){
            return view("adminPage");
        }
        return view("adminPage")->with("error", "Geen toegang tot deze pagina, je hebt geen admin-rechten.");
    }

    function registration(){
        if(Auth::check()){
            return view("welcome");
        }
        return view("registration")-> with("error", "Geen toegang tot deze pagina, je hebt geen admin-rechten.");
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
            "lastname" => "required",
            "country" => "required",
            "city" => "required",
            "houseNr" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "street" => "required",
            "passwordrepeat" => "required | same:password",
        ], [
            'passwordrepeat.same' => 'The password repeat field must match the password field.',
]);


            $data["name"] = $request->name;
            $data["lastname"] = $request->lastname;
            $data["email"] = $request->email;
            $data["country"] = $request->country;
            $data["city"] = $request->city;
            $data["houseNr"] =  $request->houseNr;
            $data["street"] = $request->street;
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
