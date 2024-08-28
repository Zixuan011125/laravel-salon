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
        $appointments = Appointments::where('name', $username)->get();
        
        // ->select('id', 'name', 'date', 'time', 'services')->get();

        // Iterate over the appointments to retrieve the services names
        foreach($appointments as $appointment){
            // Split the comma-separated service ID
            $serviceID = explode(', ', $appointment->services);

            // Fetch the related services names 
            $servicesNames = SubServices::whereIn('id', $serviceID)
                ->pluck('subName')
                ->toArray();

            // Join the service names into a string and attach it to the appointment
            $appointment->service_names = implode(', ', $servicesNames);
        }

        return view('order', compact('appointments'));
    }

    public function cancelAppointments($id){
        // Fetch the appointments
        $appointment = Appointments::where('id', $id)->first();

        // dd($appointment);

        // Get appointment date 
        $appointmentDate = $appointment->date;

        // Get today date
        $today = date('Y-m-d');

        // Calculate the date (for one day before the appointment date)
        $oneDay = date('Y-m-d', strtotime($appointmentDate . ' -1 day'));

        // Check condition
        if($today >= $oneDay){
            return redirect()->back()->with('error', 'You cannot cancel an appointment one day before or on the appointment date.');
        }

        // Proceed with cancellation
        $appointment->delete();

        return redirect()->route('appointmentsHistory');
    }
}