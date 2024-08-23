<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login for Admin</title>
</head>

<body>
    @include('/header')
    <br><br>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Welcome to FOREVER18 Hair Salon Administrator System</h1>
    <br>
    <form action="{{route('submitAdminLogin')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="admin_name" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="admin_password" id="password" required>
            <div class="show-password-container">
                <input type="checkbox" onclick="showPassword()">
                <label for="show">Show Password</label>
            </div>
        </div>

        <input type="submit" value="Login" name="login">
    </form>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>