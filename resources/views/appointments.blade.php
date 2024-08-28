<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/appointments.css">
    <style>
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Appointments Form</title>
</head>

<body>
    @include('header')
    <br>
    <h1>Please fill in the appointments form</h1>
    <div class="appointments-container">
        <form action="{{ route('bookAppointments') }}" method="post">
            @csrf
            <!-- Retrieve and pre-filled the name and email from session -->
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ session('user.name') }}" readonly>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ session('user.email') }}" readonly>
            <br>
            {{-- <label for="hair_cutter">Name of Hair Cutter:</label>
            <input type="text" name="employee_id" value="{{ $hairCutter->name }}" readonly> --}}
            <label for="employee_id">Name of Hair Cutter:</label>
            <input type="hidden" name="employee_id" value="{{ $hairCutter->id }}">
            <input type="text" value="{{ $hairCutter->name }}" readonly>
            <br>
            <label for="services">Services:</label>
            <br>
            @foreach ($subServices as $subService)
                <input type="checkbox" name="services[]" value="{{ $subService->id }}">
                <label for="services_{{ $subService->id }}">{{ $subService->subName }}</label>
                <br>
            @endforeach
            <br>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone">
            <br>
            <label for="date">Date:</label>
            <input type="text" name="date" value="{{ $date }}" readonly>
            <br>
            <label for="time">Time:</label>
            <input type="text" name="time" value="{{ $timeSlot }}" readonly>
            <br><br>
            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>

</html>
