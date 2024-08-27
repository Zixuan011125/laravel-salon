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
    <title>Invoices List</title>
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
                                <h3 class="card-title">Invoices List</h3>
                            </div>
                            <div class="card-body">
                                <!-- DataTable with Bootstrap Styling -->
                                <table id="invoices-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Invoices Number</th>
                                            <th>Name</th>
                                            <th>Total Cost (RM)</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
        $(document).ready(function() {
            $('#invoices-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tableInvoices') }}", // Fetch data via AJAX from the route
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'invoices_number', name: 'invoices_number' },
                    { data: 'name', name: 'name'},
                    { data: 'cost', name: 'cost'},
                    { data: 'date', name: 'date'},
                    { data: 'time', name: 'time'}, 
                    { 
                        data: null, 
                        name: 'action', 
                        render: function(data, type, row) {
                            // return '<a href="/invoice/' + row.id + '/view" class="btn btn-primary btn-sm">View Details</a>';
                            return '<a href="' + '{{ route("showCustomerInvoices", ":id") }}'.replace(':id', row.id) + '" class="btn btn-primary btn-sm">View Invoices</a>';
                            // return '<a href="/customer/' + row.customer_id + '/invoices" class="btn btn-primary btn-sm">View Invoices</a>';
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>