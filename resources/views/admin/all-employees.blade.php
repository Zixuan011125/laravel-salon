<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee List</title>
</head>

<body>
    @include('admin/sidebar')
    <main class="main">
        <div id="content">
            <h1>Employees List</h1>
            <div class="employees-container">
                @if ($employees)
                    @foreach ($employees as $employee)
                        <div class="card bg-success-subtle shadow">
                            <p>Name={{ $employee->name }}</p>
                            <p>Role={{ $employee->role }}</p>
                            <p>Salary={{ $employee->salary }}</p>
                            <p>Phone={{ $employee->phone }}</p>

                            <!-- Update button -->
                            <a href="{{ route('showUpdateEmployeesForm', ['id' => $employee->id]) }}"
                                class="btn btn-primary">Update</a>

                            <!-- Delete button -->
                            <form action="{{ route('deleteEmployees') }}" method="post">
                                @csrf
                                {{-- @method('delete') --}}
                                <input type="hidden" name="id" value="{{ $employee->id }}">
                                <button type="submit" class="btn btn-danger">Delete Employee</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>