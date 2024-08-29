<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .swal2-container {
            margin-top: 100px !important; /* Adjust the margin as needed */
            margin-right: 10px !important;
        }
    </style>
</head>
<body>
    @include('header')
    <br><br>
    <div class="container">

        <h1>Log In</h1>

        @if (session('login_success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: `Welcome back, {{ session('login_success') }}`,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                }).then(() => {
                    setTimeout(function() {
                        window.location.href = "{{ route('home') }}";
                    }, 500); // Adjust the delay as needed
                });
            });
        </script>
        @endif

        @if (session('login_error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Invalid username or password',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
        </script>
        @endif

        <form action="{{ route('submitLoginForm') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Username: </label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
                <div class="show-password-container" style="color: black">
                    <input type="checkbox" onclick="showPassword()">Show Password
                </div>
            </div>

            <br><br>

            <div class="text-container">
                <p style="color: black">No Account? <a href="{{ route('showRegisterForm') }}">Register Here</a></p>
                <p><a href="">Forgot Password?</a></p>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
