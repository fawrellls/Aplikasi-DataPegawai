<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>

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
    <h3 class="text-center mb-4 fw-bold text-pink">Daftar Akun</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        {{ implode(', ', $errors->all()) }}
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/register') }}" method="POST" onsubmit="return validatePassword()">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" placeholder="Masukkan nama kamu" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Buat username unik" required>
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control pe-5"
               placeholder="Minimal 4 karakter" required minlength="4">
        <span class="toggle-password" onclick="togglePassword('password', this)">🙈</span>
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control pe-5"
               placeholder="Ulangi password" required minlength="4">
        <span class="toggle-password" onclick="togglePassword('confirm_password', this)">🙈</span>
      </div>

      <button type="submit" class="btn btn-pink w-100 mt-2">Daftar Sekarang</button>
    </form>

    <div class="text-center mt-3">
      <small>Sudah punya akun? <a href="{{ url('/') }}">Login di sini</a></small>
    </div>
  </div>

  <script>
    // Validasi password dan konfirmasi password
    function validatePassword() {
      const password = document.getElementById('password').value;
      const confirm = document.getElementById('confirm_password').value;

      if (password !== confirm) {
        alert('Password dan Konfirmasi Password tidak sama!');
        return false;
      }
      return true;
    }

    // Fungsi show/hide password (ikon ditukar)
    function togglePassword(id, el) {
      const input = document.getElementById(id);
      const isText = input.type === "text";
      input.type = isText ? "password" : "text";
      el.textContent = isText ? "🙈" : "👁️"; // 👁️ saat terlihat, 🙈 saat disembunyikan
    }
  </script>

</body>
</html>
