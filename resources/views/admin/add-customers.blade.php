<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customers</title>
</head>

<body>
    @include('admin/sidebar')
    <form action="{{ route('assignServices', $customer->id) }}" method="POST">
        @csrf
        <div class="parent-form">
            <h1>Assign Hair Services to Customer</h1>
            <div class="form">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $customer->name }}">
                <br>
                <label for="services">Services:</label>
                @foreach ($subServices as $subService)
                    <input type="checkbox" name="services[]" value="{{ $subService->id }}">
                    <label for="services_{{ $subService->id }}">{{ $subService->subName }}</label>
                    <br>
                @endforeach
                <br>
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
