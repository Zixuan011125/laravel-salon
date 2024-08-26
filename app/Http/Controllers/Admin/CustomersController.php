<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Services;
use App\Models\SubServices;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class CustomersController extends Controller
{
    public function tableCustomers(){
        $query = Customers::select('id', 'name', 'phone', 'services', 'date', 'time');

        return DataTables::of($query)->make(true);
    }

    public function showCustomers(){
        return view('admin/all-customers');
    }

    public function assignServicesForm($id){
        $customer = Customers::findOrFail($id);
        $subServices = SubServices::all();

        return view('admin/add-customers', compact('customer', 'subServices'));
    }

    public function assignServices(Request $request, $id){
       $name = request()->name;
       $services = request()->services;

       $customers = new Customers();
       $customers->name = $name;
       $customers->services = $services;

       $customers->save();
    }
}
