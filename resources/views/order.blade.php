<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/order.css">
    <title>Appointments List</title>
</head>
<body>
    @include('header')
    <div class="container">
        <br>
        <h1>Appointments List</h1>
        <br>
        <table>
            <thead>
                <tr>
                    {{-- <th style="color: black">Appointment ID</th> --}}
                    <th style="color: black">Name</th>
                    <th style="color: black">Date</th>
                    <th style="color: black">Time</th>
                    <th style="color: black">Service</th>
                    {{-- <th style="color: black">Product</th> --}}
                    <th style="color: black">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    @php
                        $appointmentDate = strtotime($appointment->date);
                        $oneDayAhead = strtotime('+1 days');
                        $today = strtotime('today');
                    @endphp
                    <tr>
                        {{-- <td style="color: black">{{ $appointment->appointment_id }}</td> --}}
                        <td style="color: black">{{ $appointment->name }}</td>
                        <td style="color: black">{{ $appointment->date }}</td>
                        <td style="color: black">{{ $appointment->time }}</td>
                        <td style="color: black">{{ $appointment->service_name }}</td>
                        {{-- <td style="color: black">{{ $appointment->product_name }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>