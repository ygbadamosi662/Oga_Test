<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>
    <h1>HomePage</h1>

    <div class="reg_log">
        <div class="reg">
            <a href="{{ route('page/register') }}">Register</a>
        </div>
        <div class="login">
            <a href="{{ route('page/login') }}">Login</a>
        </div>
    </div>
</body>
</html>
