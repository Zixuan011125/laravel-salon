<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Products</title>
</head>
<body>
    <h1>Update Products</h1>
    <form action="{{route('updateProducts', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{$product->name}}">
        <br>
        <label for="product">Product:</label>
        <input type="file" name="image">
        <br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="{{$product->quantity}}">
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{$product->price}}">
        <br>
        <button type="submit">Update Products</button>
    </form>
</body>
</html>