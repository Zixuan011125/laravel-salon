<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <title>Customer List</title>
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
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-body">
                                <!-- DataTable with Bootstrap Styling -->
                                <table id="customers-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th> 
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Services</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#customers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('tableCustomers')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'services', name: 'services'},
                    {data: 'date', name: 'date'},
                    {data: 'time', name: 'time'},
                    {
                        data: null,
                        name: 'action',
                        render: function(data, type, row){
                            // return '<a href="' + '{{ route("assignServicesForm", ":id") }}'.replace(':id', row.id) + '" class="btn btn-primary btn-sm">Assign Services</a>';
                            return '<a href="' + '{{ route("sellProductsForm", ":id") }}'.replace(':id', row.id) + '" class="btn btn-primary btn-sm">Sold Products</a>' +
                                   '<a href="' + '{{ route("generateInvoices", ":id") }}'.replace(':id', row.id) + '" class="btn btn-primary btn-sm">Generate Invoices</a>';
                        }
                    }
                ]
            })
        });
    </script>
</body>
</html>