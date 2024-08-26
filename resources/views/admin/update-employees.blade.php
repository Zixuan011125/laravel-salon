<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Employees</title>
</head>

<body>
    @include('admin/sidebar')
    <div class="wrapper">
        <div class="content-wrapper">
            <h1>Update Employees</h1>
            <form action="{{ route('updateEmployees.edit', ['id' => $employee->id]) }}" method="post">
                @csrf
                {{-- @method('put') --}}

                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $employee->name }}">
                <br>
                <label for="role">Role:</label>
                <select name="role" required>
                    <option value="Senior Stylist" {{ $employee->role === 'Senior Stylist' ? 'selected' : '' }}>Senior
                        Stylist</option>
                    <option value="Junior Stylist" {{ $employee->role === 'Junior Stylist' ? 'selected' : '' }}>Junior
                        Stylist</option>
                </select>
                <br>
                <label for="salary">Salary:</label>
                <input type="text" name="salary" value="{{ $employee->salary }}" required>
                <br>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="{{ $employee->phone }}" required>
                <br>
                <button type="submit">Update Employees</button>
            </form>
        </div>
    </div>
</body>

</html>