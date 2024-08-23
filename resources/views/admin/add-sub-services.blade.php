<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Sub Services</title>
</head>
<body>
    <form action="{{route('addSubServices')}}" method="post">
        @csrf
        <label for="main_service">Main Services:</label>
        <select name="main_service" required>
            <option value="">Select the main service</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="sub_name">Name:</label>
        <input type="text" name="subName">
        <br>
        <label for="sub_cost">Cost:</label>
        <input type="text" name="subCost">
        <br>
        <button type="submit">Add Sub Services</button>
    </form>

    <a href="{{route('showAllSubServices')}}">Show All Sub Services</a>
</body>
</html>