<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Appointments</title>
</head>
<body>
    <h1>Appointments List</h1>
    <div class="container">
        @if ($appointments)
            @foreach ($appointments as $appointment)
                <div class="card bg-success-subtle shadow">
                    <p>Name={{$appointment->name}}</p>
                    <p>Email={{$appointment->email}}</p>
                    <p>Services={{$appointment->services}}</p>
                    <p>Phone={{$appointment->phone}}</p>
                    <p>Date={{$appointment->date}}</p>
                    <p>Time={{$appointment->time}}</p>

                    <!-- Appointments Confirm -->
                    <a href="">Confirm</a>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>