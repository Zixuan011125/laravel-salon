<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Services</title>
</head>
<body>
    <h1>Update Sub Service</h1>
    <form action="{{ route('updateSubServices.edit', ['id' => $subService->id]) }}" method="post">
        @csrf
        @method('put')
        
        <label for="main_service">Main Services:</label>
        <select name="main_service" required>
            @foreach ($services as $service)
            <option value="{{ $service->id }}" {{ $subService->service_id == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
            @endforeach
        </select>

        <label for="subName">Name:</label>
        <input type="text" name="subName" value="{{ $subService->subName }}">
        <br>
        
        <label for="subCost">Cost:</label>
        <input type="text" name="subCost" value="{{ $subService->subCost }}">
        <br>
        
        <button type="submit">Update Sub Service</button>
    </form>
</body>
</html>
