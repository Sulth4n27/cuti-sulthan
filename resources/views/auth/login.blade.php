<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="public/img/smk1.png" rel="icon">
    <link href="public/img/smk1.png" rel="favicon">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            width: 60px;
            height: auto;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .options a {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Alert styling */
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            position: relative;
        }

        .alert h5 {
            font-size: 16px;
            margin: 0 0 5px;
        }

        .alert .close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="public/img/smk1.png" alt="Logo" class="logo">
        </div>

        <!-- Pesan error -->
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{ session('loginError') }}
        </div>
        @endif

        <form class="login-form" action="/login" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" id="username" name="username" value="{{ old('username') }}" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" id="password" required>
            </div>

            <div class="options" style="display: flex; justify-content: flex-end;">
                <a href="#" class="forgot-password">Forgot your password?</a>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.querySelector('.alert .close');

            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>
