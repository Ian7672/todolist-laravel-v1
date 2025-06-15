<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📝</text></svg>">
</head>

<body>
    <div class="form-container">
        <h2>Daftar Akun</h2>
        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" name="username" required value="{{ old('username') }}">
            <small class="form-text">Username minimal 3 karakter, maksimal 255 karakter</small>
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Email</label>
            <input type="email" name="email" required value="{{ old('email') }}">
            <small class="form-text">Masukkan email yang valid (contoh: nama@domain.com)</small>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Password</label>
            <input type="password" name="password" required>
            <small class="form-text">Password minimal 6 karakter</small>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
            <small class="form-text">Ulangi password yang sama</small>

            <button id="signup" type="submit">Daftar</button>
        </form>
        <a href="{{ route('signin') }}" class="link">Sudah punya akun? Login</a>
    </div>
</body>

</html>
