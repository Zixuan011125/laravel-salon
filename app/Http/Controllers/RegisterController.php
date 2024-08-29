<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm(Request $request){
        
        return view('register');
    }

    public function submitRegisterForm(Request $request){

        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => [
            'required',
            'string',
            'min:8', // Minimum length of 8 characters
            'regex:/[A-Z]/', // At least one uppercase letter
            'regex:/[a-z]/', // At least one lowercase letter
            'regex:/[0-9]/', // At least one number
            'regex:/[@$!%*?&]/', // At least one special symbol
            ],

        ]);

        $name = request()->name;
        $email = request()->email;
        $password = request()->password;
        
        $register=new Register();
        // name, email and password which are pointed by the register is table column name
        $register->name = $name;
        $register->email = $email;
        $register->password = $password;
        // $register->password = bcrypt($request->password); // Hashing password
        $register->save();

        // Store the user data in session
        session([
            'user.name' => $register->name,
            'user_email' => $register->email,
        ]);

        // return redirect()->back();
        return redirect()->route('showLoginForm');
    }

    // showLoginForm is the route name
    public function showLoginForm(Request $request){
        // file name 
        return view('login');
    }
    
    public function submitLoginForm(Request $request){
        // Validate input first
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $name = $request->name;
        $password = $request->password;

        // Find user first, then compare the password, Register is the model
        $user = Register::where('name', $name)->first();

        if ($user && $user->password === $password) {
            // Store the user in session
            session([
                'user.name' =>$user->name,
                'user.email' =>$user->email,
            ]);

             // Redirect to home with success message
            return redirect()->route('home')->with('login_success', $user->name);
        } else {
            // Redirect back with error message
            return redirect()->route('showLoginForm')->with('login_error', 'Invalid credentials');
        }
    }

    public function logout(){
        // Remove the user from session
        session()->forget('user');

        // Redirect back to the home page
        return redirect()->route('home');
    }
}