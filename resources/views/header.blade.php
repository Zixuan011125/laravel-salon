<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <title>FOREVER18 Hair Salon</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo" style="text-decoration: none;">FOREVER18 Hair Salon</a>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{route('showAboutUs')}}">About</a></li>
            <li><a href="{{ route('showCalendarDate') }}">Booking</a></li>
            {{-- <li><a href="">Reviews</a></li> --}}
            @if(session('user'))
                <li>
                    <a href="#">Profile</a>
                    <ul>
                        <li><a href="{{ route('appointmentsHistory', ['user' => session('user')]) }}">Appointments</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('showLoginForm') }}">Login</a></li>
            @endif
            <li><a href="{{ route('adminLogin') }}">Admin</a></li>
        </ul>
    </nav>
</body>
</html>
