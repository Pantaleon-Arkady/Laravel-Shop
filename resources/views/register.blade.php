<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="/statics/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <script src="/statics/bootstrap.bundle.min.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Space Mono', monospace;
        }

        body {
            height: 100vh;
        }

        .Main_div {
            height: 100%;
        }

        .form-container {
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
    </style>
</head>

<body class="p-3 bg-dark">
    <div class="Main_div bg-secondary rounded d-flex flex-row justify-content-center align-items-center">
        <div class="bg-light w-50 m-3 rounded d-flex flex-column justify-content-center align-items-center text-center p-4">
            @if (request()->query('register') === 'pin')
                <h2 class="mb-3">Trial App Name</h2>
                <div>
                    <p>
                        We sent a pin to your
                        <a href="http://localhost:8025/" target="_blank" class="text-decoration-none">email</a>
                        please verify.
                    </p>
                </div>
            @else
                <h2 class="mb-3">Trial App Name</h2>
                <div>
                    <a href="http://localhost:8000/register?register=login" class="text-decoration-none me-2">Log In</a>
                    <span>or</span>
                    <a href="http://localhost:8000/register?register=register" class="text-decoration-none ms-2">Sign Up</a>
                </div>
            @endif
        </div>
        <div class="bg-light w-50 m-3 rounded d-flex justify-content-center align-items-center p-4">
            @if (request()->get('register') === 'register')
                <x-auth.register-form />
            @elseif (request()->get('register') === 'login')
                <x-auth.login-form />
            @elseif (request()->get('register') === 'pin')
                <x-auth.pin-form />
            @else
                <x-auth.welcome-message />
            @endif
        </div>
    </div>
    <script  src="../resources/js/auth-validation.js"></script>
</body>

</html>