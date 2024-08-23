<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employees</title>
</head>
<body>
    <form action="{{route('addEmployees')}}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="Senior Stylist">Senior Stylist</option>
            <option value="Junior Stylist">Junior Stylist</option>
        </select>
        <br>
        <label for="salary">Salary:</label>
        <input type="text" name="salary">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone">
        <br>
        <button type="submit">Add Employees</button>
    </form>

    <a href="{{route('showAllEmployees')}}">Employees List</a>
</body>
</html>