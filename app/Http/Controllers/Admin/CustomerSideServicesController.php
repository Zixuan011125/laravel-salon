<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubServices;

class CustomerSideServicesController extends Controller
{
    public function displayServices(){
        $subServices = SubServices::with('service')->get();
        return view('services');
    }
}