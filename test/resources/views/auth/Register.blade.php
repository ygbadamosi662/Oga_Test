<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
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
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
      <div class="cups">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>
      
      <div class="cups">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" required>
      </div>
      
      <div class="cups">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="cups">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="cups">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password_confirmation" id="password_confirmation" name="password_confirmation" required>
      </div>
      
      <div class="cups">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="4" required></textarea>
      </div>
      
      <div class="cups">
        <button type="submit">Register</button>
        <div class="login">
          <a href="{{ route('page/login') }}">Login</a>
        </div>
      </div>
    </form>
</body>
</html>
