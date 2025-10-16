<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar - Blackpink Theme</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { font-family: 'Poppins', sans-serif; }

    body {
      background: linear-gradient(to right, #000, #ffb6d5);
      min-height: 100vh;
    }

    /* Navbar Style */
    nav {
      background-color: rgba(0, 0, 0, 0.9);
      border-bottom: 2px solid #ff4f8f;
      padding: 0.8rem 1rem;
    }

    .navbar-brand {
      font-weight: 700;
      color: #ffb6d5 !important;
      font-size: 1.3rem;
      letter-spacing: 1px;
    }

    .nav-link {
      color: #fff !important;
      font-weight: 500;
      margin: 0 0.5rem;
      transition: 0.3s;
    }

    .nav-link:hover {
      color: #ff4f8f !important;
      transform: scale(1.05);
    }

    .btn-pink {
      background-color: #ff4f8f;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 6px 14px;
      transition: all 0.3s ease-in-out;
    }

    .btn-pink:hover {
      background-color: #ff86b6;
      transform: scale(1.05);
    }

    .btn-outline-light {
      border-color: #ff4f8f;
      color: #ff4f8f;
    }

    .btn-outline-light:hover {
      background-color: #ff4f8f;
      color: white;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Aplikasi Data Pegawai</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pegawai') }}">Pegawai</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item ms-3">
            <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm me-2">Masuk</a>
            <a href="{{ url('/daftar') }}" class="btn btn-pink btn-sm">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container text-light text-center mt-5">
    <h1 class="fw-bold">Welcome to Our Page</h1>
    <p class="text-light">Sistem Informasi Data Pegawai</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
