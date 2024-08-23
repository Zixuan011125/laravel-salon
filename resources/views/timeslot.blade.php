<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/timeslot.css">
    <title>Time Slot</title>
</head>
<body>
    @include('header')
    <div class="container">
        <br>
        <div class="main-container">
            <h1>Please select available time slot</h1>
            
            <div class="time-slots">
                @foreach($availableTimeSlots as $timeSlot)
                    <div class="time-slot">
                        {{-- <a href="{{route('showHairCutter')}}">{{ $timeSlot }}</a> --}}
                        <a href="{{route('showHairCutter', ['date' => $date, 'timeSlot' => $timeSlot]) }}">{{ $timeSlot }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>