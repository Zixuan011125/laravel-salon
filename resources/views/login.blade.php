<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('header')
    <br><br>
    <div class="container">

        <h1>Log In</h1>

        @if (session('login_success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: `Welcome back, {{ session('login_success') }}`,
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('home') }}";
                });
            });
        </script>
        @endif

        @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid username or password',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('showLoginForm') }}";
                });
            });
        </script>
        @endif

        <form action="{{route('submitLoginForm')}}" method="post">
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
                <p style="color: black">No Account? <a href="{{route('showRegisterForm')}}">Register Here</a></p>
                <p><a href="">Forgot Password?</a></p>
            </div>

            {{-- <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div> --}}

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
