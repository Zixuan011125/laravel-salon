<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/appointments.css">
    <title>Appointments Form</title>
</head>

<body>
    @include('header')
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
            <label for="hair_cutter">Name of Hair Cutter:</label>
            <input type="text" name="hair_cutter" value="{{ $hairCutter->name }}" readonly>
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
            <br>
            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>

</html>
