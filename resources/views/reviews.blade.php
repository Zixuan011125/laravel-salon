<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reviews.css">
    <title>Reviews</title>
</head>
<body>
    @include('header')
    <br><br>
    <h1>Customer Reviews</h1>
    <br>
    <div class="review-container">
        <button class="add-reviews-button">
            <a href="{{ route('addReviewsForm') }}">Add Reviews</a>
        </button>
        <br><br><br>
        @if ($reviews->count() > 0)
            <div class="reviews-wrapper">
                @foreach ($reviews as $review)
                    <div class="review-wrapper">
                        <div class="review">
                            <h3>{{ $review->name }}</h3>
                            <p>Rating:
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <span class="stars">&#9733;</span>
                                @endfor
                            </p>
                            <p>{{ $review->review }}</p>
                            <p class="timestamp">Submitted on: {{ $review->time }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No reviews yet.</p>
        @endif
    </div>

    <br><br><br><br><br><br><br><br><br><br>

    @include('footer')
</body>
</html>