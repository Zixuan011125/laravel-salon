<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('admin/sidebar')
    <div class="content-wrapper">

        @if ($services)
            @foreach ($services as $service)
                <div class="card bg-success-subtle shadow">
                    {{-- <a href="{{route('deleteContact',['id'=>$contact->id])}}"> --}}
                    <p>Name={{ $service->name }}</p>
                    </a>
                </div>
            @endforeach
        @endif

        <a href="{{ route('subServicesForm') }}">Add Sub Services</a>
    </div>



</body>

</html>
