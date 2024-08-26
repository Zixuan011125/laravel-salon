<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <title>Update Products</title>
</head>

<body>
    {{-- @include('admin/sidebar') --}}
    <h1>Update Products</h1>
    <div class="content-wrapper">
        <form action="{{ route('updateProducts', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $product->name }}">
            <br>
            <label for="product">Product:</label>
            <input type="file" name="image">
            <br>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" value="{{ $product->quantity }}">
            <br>
            <label for="price">Price:</label>
            <input type="text" name="price" value="{{ $product->price }}">
            <br>
            <button type="submit">Update Products</button>
        </form>
    
    </div>

    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

</body>

</html>
