<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class timeSlotController extends Controller
{
    public function showTimeSlots(Request $request){
        $date = $request->input('date');

        // Simulate fetching time slots
        $availableTimeSlots = [
            '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM',
            '01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM',
            '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM',
            '05:00 PM', '05:30 PM', '06:00 PM', '06:30 PM'
        ];


        // Pass the date and available time slots
        return view('timeslot', compact('date', 'availableTimeSlots'));
    }
}