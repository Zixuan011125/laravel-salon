<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hair Cutter</title>
</head>

<body>
    @include('header')
    <br><br>
    <h1 style="color: black; text-align: center;">Please select an available hair cutter</h1>

    <br><br>

    <div class="hair-cutter-container" style="display: flex; justify-content: center;">
        <div class="main-container" style="max-width: 960px;">
            <div class="info">
                <!-- Additional information or styling -->
            </div>

            <div class="hair-cutters" style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                <!-- Display all hair cutters -->
                @if ($employees->isEmpty())
                    <p>No hair cutters available</p>
                @else
                    <form action="{{route('bookAppointments')}}" method="post" style="width: 100%; display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;">
                        @csrf
                        @foreach ($employees as $employee)
                            <div class="hair-cutter-wrapper" style="width: 200px; height: 100px; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 10px; margin-left: 20px;">
                                @if ($bookedHairCutterID->contains($employee->id))
                                    <button type="button" class="booked" disabled style="width: 100%; height: 100%; background-color: red; border: none; color: white; font-size: 16px;">
                                        <span style="color: black;">{{ $employee->name }}</span> - {{ $employee->role }} (Booked)
                                    </button>
                                @else
                                    <a href="{{ route('showAppointmentsForm', ['hairCutter' => $employee->id, 'date' => $date, 'timeSlot' => $timeSlot]) }}" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: black;">
                                        <button type="button" style="width: 100%; height: 100%; background-color: #f0f0f0; border: none; font-size: 16px; color: black;">
                                            <span style="color: black;">{{ $employee->name }}</span> - {{ $employee->role }}
                                        </button>
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