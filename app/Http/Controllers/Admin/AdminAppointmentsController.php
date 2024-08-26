<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Customers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminAppointmentsController extends Controller
{
    public function showAppointmentsList(){
        // Fetch all the appointments
        $appointments = Appointments::all();

        // Pass the appointments to the view
        return view('admin/all-appointments', compact('appointments'));
    }

    public function confirmAppointments(Request $request, $id){
        // findorFail, if got this id, it returns, if no, return errors messages
        $appointment = Appointments::findOrFail($id);

        // Create a new object (Customers)
        $customer = new Customers();
        $customer->name = $appointment->name;
        $customer->phone = $appointment->phone;
        $customer->services = $appointment->services;
        $customer->date = $appointment->date;
        $customer->time = $appointment->time;

        // Save customer
        $customer->save();

        // Redirect to the customers view
         return redirect()->route('showCustomers')->with('success', 'Customer confirmed successfully!');
    }

    public function tableAppointments(){
        $query = Appointments::select('id', 'name', 'phone', 'services', 'date', 'time');

        return DataTables::of($query)->make(true);
    }
}