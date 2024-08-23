<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/hairCutter.css') }}">
    <title>Hair Cutter</title>
</head>

<body>
    @include('header')
    <br><br>
    <h1>Please select an available hair cutter</h1>

    <div class="hair-cutter-container">
        <div class="main-container">
            <div class="info">
                <!-- Additional information or styling -->
            </div>

            <div class="hair-cutters">
                <!-- Display all hair cutters -->
                @if ($employees->isEmpty())
                    <p>No hair cutters available</p>
                @else
                    {{-- <h2>Hair Cutters</h2> --}}
                    <form action="{{route('bookAppointments')}}" method="post">
                        @csrf
                        @foreach ($employees as $employee)
                            <div class="hair-cutter-wrapper">
                                @if ($bookedHairCutterID->contains($employee->id))
                                    <!-- If the hair cutter is booked, disable the button and apply red styling -->
                                    <button type="button" class="booked" disabled style="background-color: red;">
                                        {{ $employee->name }} - {{ $employee->role }} (Booked)
                                    </button>
                                @else
                                    <!-- If not booked, show clickable button -->
                                    <a href="{{ route('showAppointmentsForm', ['hairCutter' => $employee->id, 'date' => $date, 'timeSlot' => $timeSlot]) }}">
                                        <button type="button">{{ $employee->name }} - {{ $employee->role }}</button>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
