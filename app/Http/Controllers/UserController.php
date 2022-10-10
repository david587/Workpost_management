<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    // Show register/create form
    public function create(){
        return view("users.register");
    }

    //Create new User
    public function store(Request $request){
        $formfields = $request->validate([
            "name"=>["required","min:3"],
            //email format,users táblába az emailek kötül ez az egy legyen
            "email"=>["required","email", Rule::unique("users","email")],
            //we used name="password_confirmation" in register.blade,
            //thats why it will work with confirmed attributum
            "password"=>"required|confirmed|min:6"
        ]);

        //Hash password(titkositás)
        $formfields["password"]=bcrypt($formfields["password"]);

        //Create user,call user model
        $user =User::create($formfields);

        //Login 
        auth()->login($user);

        return redirect("/")->with("message","User created and logged in");
    }

    //Logout
    public function logout(Request $request){
        //this will remove the information from user session
        auth()->logout();
        //invalaidate the user session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message","You have been logged out!");
    }

    //Show login form
    public function login(){
        return view("users.login");
    }

    //authenticate user 
    public function authenticate(Request $request){
        $formfields = $request->validate([
            "email"=>["required","email"],
            "password"=>"required"
        ]);

        //attemt to log the user in, 
        //if thats true we regenerate the session id
        if(auth()->attempt($formfields)){
            $request->session()->regenerate();

            return redirect("/")->with("message","You are now logged in");
        }

        return back()->withErrors(["email"=>"Invalid Credentials"])->onlyInput("email");
    }
}

