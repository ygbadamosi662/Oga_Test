<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
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

    <form method="POST" action="{{ route('update_user') }}">
        @csrf
        
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" required>
      
      <label for="age">Age</label>
      <input type="number" id="age" name="age" required>
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
      
      <label for="address">Address</label>
      <textarea id="address" name="address" rows="4" required></textarea>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Update</button>
    </form>
</body>
</html>
