<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <title>Sub Services List</title>
</head>
<body>
    @include('admin/sidebar')

    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub Services List</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="sub-services-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
    {{-- <div class="container">
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
    </div> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
      <!-- DataTables JS -->
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>

<script>
    $(document).ready(function(){
        $('#sub-services-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('tableSubServices')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'subName', name: 'subName'},
                {data: 'subCost', name: 'subCost'},
                {
                    data: null,
                    name: 'action',
                    render: function(data, type, row){
                        return '<a href="/sub-service/' + row.id + '/edit" class="btn btn-primary btn-sm">Edit</a>';
                    }
                }
            ]
        })
    })
</script>
