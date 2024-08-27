<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sell Products</title>
</head>

<body>
    @include('admin/sidebar')
    <form action="{{route('sellProducts', ['customer_id' => $customer_id])}}" method="post">
        @csrf
        <label for="product_id">Select Product:</label>
        <select name="product_id" id="product_id">
            @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="quantity">Quantity Sold:</label>
        <input type="text" name="quantity">
        <br>
        <button type="submit">Sell Products</button>
    </form>
</body>

</html>
