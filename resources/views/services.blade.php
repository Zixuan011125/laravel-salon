<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/services.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/footer.css">    
    <title>Services List</title>
</head>
<body>
    @include('header')
    <div class="services-bg">
        <img src="images/bg5.jpg" alt="">
    </div>

    <div class="services-container">
        <h1>Services List</h1>

        @if ($services->count() > 0)
            @foreach ($services as $service)
            <!-- convert special HTML entities back to characters -->
                <h3>Main Service: {{htmlspecialchars($service->name)}}</h3>

                @if($service->subServices->count() > 0)
                    <table>
                        <tr>
                            <th>Sub Services</th>
                            <th>Cost</th>
                        </tr>

                        @foreach ($service->subServices as $subService)
                            <tr>
                                <!-- subName and subCost is the column name of the sub_services table -->
                                <td>{{htmlspecialchars($subService->subName)}}</td>
                                <td>{{htmlspecialchars($subService->subCost)}}</td>
                                <td>
                                    <!-- Font Awesome icon with Bootstrap Tooltip -->
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ htmlspecialchars($subService->description) }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No sub services founded for this main services</p>
                @endif
            @endforeach
        @else
            <p>No services found</p>
        @endif
    </div>

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