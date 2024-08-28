<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/footer.css"> 
    <title>FOREVER18 Hair Salon</title>
</head>

<body>
    <!-- <form action="{{ route('sendForm') }}" method="post">
        @csrf
        <label>Name</label>
        <input name="user_name">

        <label>contact</label>
        <input name="contact_no">

        <button type="submit">Submit</button>
    </form> -->

    <!-- <a href="{{ route('getContact') }}">See my contact</a> -->

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
            <a href="{{route('showCalendarDate')}}" class="button">Book Appointment</a>
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

    {{-- <a href="{{route('showRegisterForm')}}">go to form</a> --}}

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4 style="margin-left: 30px">Business Hours</h4>
                    <ul>
                        <li>Monday: Closed</li>
                        <li>Tuesday: 11 am - 7 pm</li>
                        <li>Wednesday: 11 am - 7 pm</li>
                        <li>Thursday: 11 am - 7 pm</li>
                        <li>Friday: 11 am - 7 pm</li>
                        <li>Saturday: 11 am - 7 pm</li>
                        <li>Sunday: 11 am - 7 pm</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Link and Social Media</h4>
                    <ul>
                        <li style="margin-left: -28px;"><a href="home.php">Home</a></li>
                        <li style="margin-left: -28px;"><a href="services.php">Services</a></li>
                        <li style="margin-left: -28px;"><a href="products.php">Products</a></li>
                        <li style="margin-left: -28px;"><a href="about.php">About</a></li>
                        <li style="margin-left: -28px;"><a href="booking.php">Booking</a></li>
                        <li style="margin-left: -28px;"><a href="reviews.php">Reviews</a></li>
                    </ul>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Forever18HairSalon/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/forever18_hair/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Our Location</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d127059.29857584655!2d100.38586984719011!3d5.625465019519791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x304ad7b2625d14b9%3A0x49a83832e1593f1d!2sMY%20Kedah%20sungai%20petani%20taman%20delima%2C%20283lebuh%20baiduri08000!3m2!1d5.6254707999999995!2d100.4682718!5e0!3m2!1sen!2smy!4v1707937084079!5m2!1sen!2smy"
                        width="500" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
