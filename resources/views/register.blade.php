<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <title>Register</title>
</head>

<body>
    @include('header')
    <br><br>
    <h1>Register Here</h1>
    <form action="{{ route('submitRegisterForm') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username: </label>
            <input type="text" class="form-control" id="username" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email (example@gmail.com): </label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="align-container">
                <div class="show-password-container">
                    <input type="checkbox" onclick="showPassword()">
                    <label for="show">Show Password</label>
                </div>
                <div class="text-container">
                    <p class="text">Already Registered? <a href="{{ route('showLoginForm') }}">Login Here</a></p>
                </div>
            </div>
        </div>

        <br>

        <div class="validate">
            <i id="length-icon" class="fa-solid fa-circle" style="color: #007bff;"></i>&nbsp;&nbsp;
            <span id="length-message" style="color: black">At least 8 characters length</span><br>
            <i id="number-icon" class="fa-solid fa-circle" style="color: #007bff;"></i>&nbsp;&nbsp;
            <span id="number-message" style="color: black">At least 1 number (0...9)</span><br>
            <i id="lowercase-icon" class="fa-solid fa-circle" style="color: #007bff;"></i>&nbsp;&nbsp;
            <span id="lowercase-message" style="color: black">At least 1 lowercase letter (a...z)</span><br>
            <i id="special-icon" class="fa-solid fa-circle" style="color: #007bff;"></i>&nbsp;&nbsp;
            <span id="special-message" style="color: black">At least 1 special symbol (!...$)</span><br>
            <i id="uppercase-icon" class="fa-solid fa-circle" style="color: #007bff;"></i>&nbsp;&nbsp;
            <span id="uppercase-message" style="color: black">At least 1 uppercase letter</span><br>
        </div>

        <br>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
    </div>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        document.getElementById("password").addEventListener("input", function() {
            var password = this.value;

            // Validate length
            var lengthIcon = document.getElementById("length-icon");
            var lengthMessage = document.getElementById("length-message");
            if (password.length >= 8) {
                lengthIcon.classList.remove("fa-circle");
                lengthIcon.classList.add("fa-check");
                lengthIcon.style.color = "green";
                lengthMessage.style.color = "green";
            } else {
                lengthIcon.classList.remove("fa-check");
                lengthIcon.classList.add("fa-circle");
                lengthIcon.style.color = "blue";
                lengthMessage.style.color = "black";
            }

            // Validate number
            var numberIcon = document.getElementById("number-icon");
            var numberMessage = document.getElementById("number-message");
            if (/\d/.test(password)) {
                numberIcon.classList.remove("fa-circle");
                numberIcon.classList.add("fa-check");
                numberIcon.style.color = "green";
                numberMessage.style.color = "green";
            } else {
                numberIcon.classList.remove("fa-check");
                numberIcon.classList.add("fa-circle");
                numberIcon.style.color = "blue";
                numberMessage.style.color = "black";
            }

            // Validate lowercase letter
            var lowercaseIcon = document.getElementById("lowercase-icon");
            var lowercaseMessage = document.getElementById("lowercase-message");
            if (/[a-z]/.test(password)) {
                lowercaseIcon.classList.remove("fa-circle");
                lowercaseIcon.classList.add("fa-check");
                lowercaseIcon.style.color = "green";
                lowercaseMessage.style.color = "green";
            } else {
                lowercaseIcon.classList.remove("fa-check");
                lowercaseIcon.classList.add("fa-circle");
                lowercaseIcon.style.color = "blue";
                lowercaseMessage.style.color = "black";
            }

            // Validate special symbol
            var specialIcon = document.getElementById("special-icon");
            var specialMessage = document.getElementById("special-message");
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                specialIcon.classList.remove("fa-circle");
                specialIcon.classList.add("fa-check");
                specialIcon.style.color = "green";
                specialMessage.style.color = "green";
            } else {
                specialIcon.classList.remove("fa-check");
                specialIcon.classList.add("fa-circle");
                specialIcon.style.color = "blue";
                specialMessage.style.color = "black";
            }

            // Validate uppercase letter
            var uppercaseIcon = document.getElementById("uppercase-icon");
            var uppercaseMessage = document.getElementById("uppercase-message");
            if (/[A-Z]/.test(password)) {
                uppercaseIcon.classList.remove("fa-circle");
                uppercaseIcon.classList.add("fa-check");
                uppercaseIcon.style.color = "green";
                uppercaseMessage.style.color = "green";
            } else {
                uppercaseIcon.classList.remove("fa-check");
                uppercaseIcon.classList.add("fa-circle");
                uppercaseIcon.style.color = "blue";
                uppercaseMessage.style.color = "black";
            }
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ $error }}',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            @endforeach
        @endif
    </script>

</body>

</html>
