<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <title>Main Services</title>
</head>
<body>
    @include('admin/sidebar')
    <br>
    <h1>Services List</h1>
    <form action="" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br><br>
        <button type="submit">Create</button>
    </form>

    <a href="{{route('showAllServices')}}">Services List</a>

</body>
</html>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}