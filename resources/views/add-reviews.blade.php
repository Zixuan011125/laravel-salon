<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/add-reviews.css">
    <title>Reviews</title>
</head>

<body>
    @include('header')
    <div class="add-reviews-container">
        <div class="wrapper">
            <h3>Write Your Review Here</h3>
            <form action="{{route('addReviews')}}" method="POST">
                @csrf
                <div class="rating">
                    <input type="hidden" name="rating" id="ratingInput"> <!-- Hidden input field for rating -->
                    <i class='bx bx-star star' style="--i: 0;"></i>
                    <i class='bx bx-star star' style="--i: 1;"></i>
                    <i class='bx bx-star star' style="--i: 2;"></i>
                    <i class='bx bx-star star' style="--i: 3;"></i>
                    <i class='bx bx-star star' style="--i: 4;"></i>
                </div>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="{{ session('user.name') }}" readonly class="form-control">
                </div>                
				<br>
				<div class="form-group">
					<textarea name="review" cols="30" rows="5" placeholder="Your review..." autocomplete="off"
						required></textarea>
				</div>
				<br>
				<div class="btn-group">
					<button type="submit" class="btn submit" name="submit">Submit</button>
					{{-- <button class="btn cancel">Cancel</button> --}}
				</div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    const allStar = document.querySelectorAll('.rating .star')
    const ratingValue = document.querySelector('.rating input')

    allStar.forEach((item, idx) => {
        item.addEventListener('click', function() {
            let click = 0
            ratingValue.value = idx + 1

            allStar.forEach(i => {
                i.classList.replace('bxs-star', 'bx-star')
                i.classList.remove('active')
            })
            for (let i = 0; i < allStar.length; i++) {
                if (i <= idx) {
                    allStar[i].classList.replace('bx-star', 'bxs-star')
                    allStar[i].classList.add('active')
                } else {
                    allStar[i].style.setProperty('--i', click)
                    click++
                }
            }
        })
    })
</script>
