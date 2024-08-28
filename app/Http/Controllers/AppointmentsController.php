<?php

namespace App\Http\Controllers;

use App\Models\SubServices;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Appointments;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Symfony\Component\HttpFoundation\RequestStack;

class AppointmentsController extends Controller
{
    public function showAppointmentsForm(Request $request){
        // $hairCutterId = $request->input('hairCutter');
        $employeeId = $request->input('hairCutter'); // Using employee_id instead of hair_cutter
        $date = $request->input('date');
        $timeSlot = $request->input('timeSlot');
    
        // Fetch the selected hair cutter's details
        // $hairCutter = Employees::find($hairCutterId);
        $hairCutter = Employees::find($employeeId);
    
        // Fetch all services (or filter based on a specific service if needed)
        $subServices = SubServices::all();
    
        // Fetch all appointments for the selected date and time slot
        $bookedAppointments = Appointments::where('date', $date)
                                           ->where('time', $timeSlot)
                                        //    ->pluck('hair_cutter')
                                           ->pluck('employee_id') // Fetch employee_id instead of hair_cutter
                                           ->toArray();
    
        return view('appointments', compact('hairCutter', 'date', 'timeSlot', 'subServices', 'bookedAppointments'));
    }

    public function bookAppointments(Request $request){
        // code to handle the submission of appointments form
        $name = request()->name;
        $email = request()->email;
        // $hair_cutter = request()->hair_cutter;
        $employeeId = request()->employee_id; // Store the employee_id instead of hair_cutter

        // The services variable must be array to store multiple services
        $services = request()->services;

        $phone = request()->phone;
        $date = request()->date;
        $time = request()->time;

        // Convert the array of services to a comma-separated string
        $servicesString = implode(', ', $services);
        
        $appointments = new Appointments();
        $appointments->name = $name;
        $appointments->email = $email;
        // $appointments->hair_cutter = $hair_cutter;
        $appointments->employee_id = $employeeId; // Store employee_id

        // Store as a comma-separated string
        $appointments->services = $servicesString;

        $appointments->phone = $phone;
        $appointments->date = $date;
        $appointments->time = $time;
        $appointments->save();

        return redirect()->route('home');
    }

    public function appointmentsHistory(){
        // Get the currently logged-in user's name from session
        $username = session('user');

        // Filter the appointments based on the logged-in user's name   
        $appointments = Appointments::where('name', $username)->select('id', 'name', 'date', 'time', 'services')->get();

        return view('order', compact('appointments'));
    }
}