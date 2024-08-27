<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="css/timeslot.css">
    <style>
        
    </style> --}}
    <title>Time Slot</title>
</head>
<body>
    @include('header')
    <div class="container">
        <br>
        <div class="main-container">
            <br><br>
            <h1 style="color: black; text-align: center">Please select available time slot</h1>

            <br>br
            
            <div class="time-slots" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; max-width: 960px; margin: 0 auto;">
                @foreach($availableTimeSlots as $index => $timeSlot)
                    <div class="time-slot" style="width: 100px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 5px;">
                        <a href="{{route('showHairCutter', ['date' => $date, 'timeSlot' => $timeSlot]) }}" style="text-decoration: none; color: black; font-size: 16px;">{{ $timeSlot }}</a>
                    </div>
                    @if (($index + 1) % 8 == 0)
                        <div style="flex-basis: 100%; height: 0;"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>