<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #000000, #ffb6d5);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(255, 79, 143, 0.4);
      width: 100%;
      max-width: 420px;
      background-color: #111;
      color: #fff;
    }

    .form-control {
      background-color: #222;
      border: none;
      color: #fff !important;
      caret-color: #ff4f8f;
    }

    .form-control::placeholder {
      color: #ff9ec4;
      opacity: 0.8;
    }

    .form-control:focus {
      background-color: #222;
      color: #fff !important;
      box-shadow: 0 0 8px #ff4f8f;
    }

    .btn-pink {
      background: #ff4f8f;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 0.5rem;
      transition: all 0.3s ease-in-out;
    }

    .btn-pink:hover {
      background: #ff86b6;
      transform: scale(1.05);
    }

    a {
      color: #ffb6d5;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /* 👁️ Tombol show/hide password */
    .toggle-password {
      position: absolute;
      top: 38px;
      right: 12px;
      cursor: pointer;
      user-select: none;
      font-size: 1.2rem;
      color: #ff4f8f;
      transition: 0.2s ease;
    }

    .toggle-password:hover {
      transform: scale(1.2);
      color: #ff86b6;
    }

    .form-control.pe-5 {
      padding-right: 2.5rem !important;
    }
  </style>
</head>

<body>

  <div class="card p-4">
    <h3 class="text-center mb-4 fw-bold text-pink">Login</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        {{ implode(', ', $errors->all()) }}
      </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required autofocus placeholder="Masukkan username">
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control pe-5" required placeholder="Masukkan password">
        <span class="toggle-password" onclick="togglePassword()">🙈</span>
      </div>

      <button type="submit" class="btn btn-pink w-100 mt-2">Masuk</button>
    </form>

    <div class="text-center mt-3">
      <small>Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a></small>
    </div>
  </div>

  <script>
    // 🔒 Fungsi untuk show/hide password (versi ikon ditukar)
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const icon = document.querySelector('.toggle-password');
      const isText = passwordField.type === 'text';

      passwordField.type = isText ? 'password' : 'text';
      icon.textContent = isText ? '🙈' : '👁️'; // 👁️ saat terlihat, 🙈 saat tersembunyi
    }
  </script>

</body>
</html>
