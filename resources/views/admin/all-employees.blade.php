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
    <title>Employee List</title>
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
                                <h3 class="card-title">
                                    <a href="{{route('employeesForm')}}" class="btn btn-primary">Add Employees</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- DataTable with Bootstrap Styling -->
                                <table id="employees-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th> 
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Salary</th>
                                            <th>Phone</th>
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


    <   <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('tableEmployees')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'role', name: 'role'},
                    {data: 'salary', name: 'salary'},
                    {data: 'phone', name: 'phone'},
                    {
                        data: null,
                        name: 'action',
                        render: function(data, type, row){
                            return '<a href="' + '{{ route("showUpdateEmployeesForm", ":id") }}'.replace(':id', row.id) + '" class="btn btn-primary btn-sm">Update</a>' +
                                   '<a href="' + '{{ route("deleteEmployees", ":id") }}'.replace(':id', row.id) + '" class="btn btn-danger btn-sm" style="margin-left: 20px;">Delete</a>';
                        }
                    }
                ]   
            })
        });
    </script>

</body>

</html>