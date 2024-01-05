<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if ($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>

        <div>
            <button type="submit">Login</button>
            <div class="reg">
                <a href="{{ route('page/register') }}">Register</a>
            </div>
        </div>
    </form>
</body>
</html>
