<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Appointments;

class HairCutterController extends Controller
{
    public function showHairCutter(Request $request){
        // We get the date and time slot from the request
        $date = $request->input('date');
        $timeSlot = $request->input('timeSlot');

        // Fetch the IDs of hair cutters who are booked on the given date and time
        $bookedHairCutterID = Appointments::where('date', $date)
        ->where('time', $timeSlot)
        ->pluck('employee_id');

        // Get the booked hair cutters by their IDs
        $bookedHairCutter = Employees::whereIn('id', $bookedHairCutterID)->get();

        // Get available hair cutters (which are not been booked yet)
        $notBookedHairCutter = Employees::whereNotIn('id', $bookedHairCutterID)->get();

        // Fetch all employees from the employees table
        $employees = Employees::all();

        return view('hair-cutter', compact('date', 'timeSlot', 'bookedHairCutter', 'notBookedHairCutter', 'employees', 'bookedHairCutterID'));
    }

    // public function getBookHairCutters(){
    //     $bookedHairCutterID = Appointments::where('date', $date)
    //     ->pluck('employee_id');

    //     $bookedHairCutter = Employees::whereIn('id', $bookedHairCutterID)->get();
    //     $notBookedHairCutter = Employees::whereNotIn('id' ,$bookedHairCutterID)->get();

    //     return view('x', compact('bookedHairCutter', 'notBookedHairCutter'));
    // }
}