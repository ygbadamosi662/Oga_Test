<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>Hello {{ $fullname }}</h1>

    @if ($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <div class="header">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div>
                <button type="submit">Logout</button>
            </div>
        </form>
        <form method="POST" action="{{ route('delete_user') }}">
            @csrf
            <div>
                <button type="submit">Delete Account</button>
            </div>
        </form>
        <a href="{{ route('page/profile/update') }}">Edit Profile</a>
        <a href="{{ route('page/password/update') }}">Update Password</a>
    </div>
    
    <div >Fullname: {{ $fullname }}</label>

    <div >Age: {{ $age }}</label>
    
    <div >Email: {{ $email }}</label>
    
    <div >Address: {{ $address }}</label>
</body>
</html>
