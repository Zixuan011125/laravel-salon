<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <title>Products List</title>
    <style>
        h1{
            color: black;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="services-bg">
        <img src="images/bg5.jpg" alt="">
    </div>

    <h1>Products List</h1>

    <br>

    <div class="products-container">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="product">
                    <div class="product-name">
                        <h2>{{$product->name}}</h2>
                    </div>
                    {{-- <img src="{{asset('images/products/' . $product->image)}}" alt=""> --}}
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <p>Price: RM {{$product->price}}</p>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>