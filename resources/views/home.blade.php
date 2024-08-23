<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>FOREVER18 Hair Salon</title>
</head>

<body>
    <!-- <form action="{{route('sendForm')}}" method="post">
        @csrf
        <label>Name</label>
        <input name="user_name">

        <label>contact</label>
        <input name="contact_no">

        <button type="submit">Submit</button>
    </form> -->

    <!-- <a href="{{route('getContact')}}">See my contact</a> -->

    @include('header')
    <!-- 
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/bg9.png" class="background-image">
        </div>

        <div class="mySlides fade">
            <img src="images/bg8.png" class="background-image">
        </div>

        <div class="mySlides fade">
            <img src="images/bg10.png" class="background-image">
        </div>
    </div> -->

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bg9.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/bg8.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/bg10.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-booked-images">
        <div class="container-booked">
            <h1>FOREVER18 Hair Salon</h1>
            <p>Book your appointments here</p>
            <a href="booking.php" class="button">Book Appointment</a>
        </div>

        <div class="container-booked-img">
            <img src="images/bg6.jpg" alt="">
        </div>
    </div>

    <div class="text">
        <h3>Our Passion</h3>
        <p>Step into our salon and you'll enjoy the best we have to offer in perfessionalalism,
            skills, products and equipment.
        </p>
    </div>

    <a href="{{route('showRegisterForm')}}">go to form</a>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>