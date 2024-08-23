<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/services.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Services List</title>
</head>
<body>
    @include('header')
    <div class="services-bg">
        <img src="images/bg5.jpg" alt="">
    </div>

    <div class="services-container">
        <h1>Services List</h1>

        @if ($services->count() > 0)
            @foreach ($services as $service)
            <!-- convert special HTML entities back to characters -->
                <h3>Main Service: {{htmlspecialchars($service->name)}}</h3>

                @if($service->subServices->count() > 0)
                    <table>
                        <tr>
                            <th>Sub Services</th>
                            <th>Cost</th>
                        </tr>

                        @foreach ($service->subServices as $subService)
                            <tr>
                                <!-- subName and subCost is the column name of the sub_services table -->
                                <td>{{htmlspecialchars($subService->subName)}}</td>
                                <td>{{htmlspecialchars($subService->subCost)}}</td>
                                <td>
                                    <!-- Font Awesome icon with Bootstrap Tooltip -->
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ htmlspecialchars($subService->description) }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No sub services founded for this main services</p>
                @endif
            @endforeach
        @else
            <p>No services found</p>
        @endif
    </div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>