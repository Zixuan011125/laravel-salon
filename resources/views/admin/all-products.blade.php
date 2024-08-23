<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products List</title>
</head>
<body>
    <h1>Products List</h1>
    @if ($products)
        @foreach ($products as $product)
            <p>Name={{$product->name}}</p>
            <p>Price={{$product->price}}</p>
            <p>Quantity={{$product->quantity}}</p>
            <img src="{{$product->image}}" alt="Girl in a jacket">
            
            <!-- Update button -->
            <a href="{{route('showUpdateProductsForm', ['id' => $product->id]) }}">Update</a>

            <!-- Delete button -->
            <form action="{{route('deleteProducts')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <button type="submit">Delete Products</button>
            </form>
        @endforeach
    @endif
    <a href="{{route('showProductsForm')}}">Add Products</a>
</body>
</html>