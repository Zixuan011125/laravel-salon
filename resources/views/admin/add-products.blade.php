<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Products</title>
</head>
<body>
    <form action="{{route('addProducts')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <label for="product">Product:</label>
        <input type="file" name="image">
        <br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity">
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price">
        <br>
        <button type="submit" name="submit">Add Products</button>
    </form>
</body>
</html>