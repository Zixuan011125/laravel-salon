<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/booking.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Calendar</title>
</head>
<body>
    @include('header')
    <br>
    <h1>Please choose an available date</h1>
    <div class="calendar-container">
        <div class="calendar">
            <div class="header">
                <div class="month">Calendar</div>
                <div class="btns">
                    <!-- today -->
                    <div class="btn today">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <!-- previous month -->
                    <div class="btn prev">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <!-- next month -->
                    <div class="btn next">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="weekdays">
                <div class="day">Sun</div>
                <div class="day">Mon</div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat</div>
            </div>
            <div class="days">
                <!-- render days with js -->
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>

<script src="{{ asset('js/booking.js') }}"></script>