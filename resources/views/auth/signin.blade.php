<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Masuk</title>
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📝</text></svg>">
</head>

<body>
    <div class="form-container">
        <h2>Masuk</h2>
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" name="email" required value="{{ old('email') }}">
            <small class="form-text">Masukkan email yang terdaftar</small>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Password</label>
            <input type="password" name="password" required>
            <small class="form-text">Masukkan password Anda (minimal 6 karakter)</small>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button id="signin" type="submit">Masuk</button>
        </form>
        <a href="{{ route('signup') }}" class="link">Belum punya akun? Daftar</a>
    </div>
</body>

</html>
