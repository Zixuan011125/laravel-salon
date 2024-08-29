<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointments;
use App\Models\Customers;
use App\Models\CustomersProducts;
use App\Models\Employees;
use App\Models\Invoices;
use App\Models\Products;
use App\Models\Services;
use App\Models\SubServices;
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
                return redirect()->route('dashboardAdmin');
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

    public function adminLogout(Request $request){
        // Destroy the session data
        Session::flush();

        return redirect()->route('adminLogin');
    }

    public function dashboardAdmin(){
        // return view('admin/dashboard');
        Session::flash('success', 'Login successfully');
                $totalAppointments = Appointments::count();
                $totalCustomers = Customers::count();
                $totalBenefits = Invoices::sum('cost');
                $totalMainServices = Services::count();
                $totalSubServices = SubServices::count();
                $totalProducts = Products::count();
                $totalProductsSold = CustomersProducts::sum('quantity_sold');
                $totalEmployees = Employees::count();
                return view('admin/dashboard', compact(
                    'totalAppointments', 
                    'totalCustomers', 
                    'totalBenefits', 
                    'totalMainServices', 
                    'totalSubServices', 
                    'totalProducts', 
                    'totalProductsSold', 
                    'totalEmployees'));   
    }
}