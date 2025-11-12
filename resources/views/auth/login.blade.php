<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <h2>Login Admin</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="image" src="css/mhs.png" alt="" class="logo" width="150" height="200">
        <div>
            <label for="username">Username</label><br>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        </div>
        <br>
        <div>
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>

    <p><a href="{{ url('/') }}">Kembali ke halaman publik</a></p>

</body>
</html>
