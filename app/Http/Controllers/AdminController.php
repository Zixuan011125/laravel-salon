<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminLogin(Request $request){
        return view('admin/login');
    }

    public function submitAdminLogin(Request $request){
        // dd(request());
        // Validate input first
        try{
            $request->validate([
                'admin_name' => 'required',
                'admin_password' => 'required',
            ]);
            $name = $request->admin_name;
            $password = $request->admin_password;
            $user = Admin::where('name', $name)->first();
            if($user && $user->password === $password){
                Session::flash('success', 'Login successfully');
                return redirect()->route('dashboard');  // Redirect to the dashboard route  
            }else{
                Session::flash('error', 'wrong password');
                return redirect()->back();  // Redirect back to login if credentials are incorrect
            }
        }
        catch(Exception $e){
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}