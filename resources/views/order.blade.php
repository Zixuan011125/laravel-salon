<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/order.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            padding: 8px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            th,
            td {
                padding: 10px;
                font-size: 14px;
            }

            button {
                padding: 6px 10px;
            }
        }
    </style>
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
                        <td style="color: black">{{ $appointment->service_names }}</td>
                        <td>
                            <form action="{{route('cancelAppointments', $appointment->id)}}" method="post">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to cancel this appointment?')">Cancel</button>
                            </form>
                        </td>
                        {{-- <td style="color: black">{{ $appointment->product_name }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>