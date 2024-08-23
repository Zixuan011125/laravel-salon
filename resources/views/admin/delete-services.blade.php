<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Services</title>
</head>
<body>
    <div class="container">
        @foreach ($services as $service)
            <div class="bg-primary">
                <div class="card bg-success-subtle shadow">
                    <a href="{{route('deleteServices')}}"></a>
                    <p>Name={{$service->name}}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>