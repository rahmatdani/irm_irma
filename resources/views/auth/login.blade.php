<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - Penilaian Guru</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo-container img {
            width: 120px;
            height: auto;
            margin-bottom: 1rem;
        }
        .login-title {
            color: #4e73df;
            text-align: center;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
        .form-control {
            padding: 0.75rem;
            border-radius: 5px;
        }
        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah">
            <h4 class="login-title">Welcome Back</h4>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username"
                       name="username"
                       id="username"
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username') }}"
                       placeholder="Masukkan username Anda"
                       required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Masukkan password Anda"
                       required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                MASUK
            </button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
