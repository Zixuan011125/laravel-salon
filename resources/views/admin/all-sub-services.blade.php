<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sub Services List</title>
</head>
<body>
    <div class="container">
        @if ($subServices->isNotEmpty())
            @foreach ($subServices as $subService)
                <div class="card bg-success-subtle shadow mb-3">
                    <div class="card-body">
                        <p>Main Service: {{ $subService->service->name }}</p>
                        <p>Services: {{ $subService->subName }}</p>
                        <p>Cost: {{ $subService->subCost }}</p>

                        <!-- Update button -->
                        <a href="{{ route('showUpdateSubServicesForm', ['id' => $subService->id]) }}" class="btn btn-primary">Update</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>No sub services available.</p>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
