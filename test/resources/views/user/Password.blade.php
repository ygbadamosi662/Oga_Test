<!DOCTYPE html>
<html>
<head>
    <title>Password Update</title>
</head>
<body>
    <h1>Hello {{ $fullname }}</h1>

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

    <form method="POST" action="{{ route('update_password') }}">
        @csrf
      
      <label for="password">Old Password</label>
      <input type="password" id="old_password" name="old_password" required>

      <label for="password">New Password</label>
      <input type="password" id="new_password" name="new_password" required>

      <label for="password_confirmation">New Password Confirmation</label>
      <input type="new_password_confirmation" id="new_password_confirmation" name="new_password_confirmation" required>
      
      <button type="submit">Update</button>
    </form>
    

    
</body>
</html>
