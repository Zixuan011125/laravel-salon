<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AdminAppointmentsController extends Controller
{
    public function showAppointmentsList(){
        // Fetch all the appointments
        $appointments = Appointments::all();

        // Pass the appointments to the view
        return view('admin/all-appointments', compact('appointments'));
    }

    public function confirmAppointments(Request $request){
        // go to the servives page of admin
    }
}