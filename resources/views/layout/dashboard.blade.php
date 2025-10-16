<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Aplikasi Data Pegawai</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg-main: #f8f9fa;
      --bg-sidebar: #ffffff;
      --text-main: #111;
      --text-sidebar: #111;
      --border-color: #ff4f8f;
      --shadow-color: rgba(255, 79, 143, 0.2);
    }

    body.dark-mode {
      --bg-main: #0f0f0f;
      --bg-sidebar: #111;
      --text-main: #f8f9fa;
      --text-sidebar: #fff;
      --border-color: #ff4f8f;
      --shadow-color: rgba(255, 79, 143, 0.4);
    }

    * {
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s ease;
    }

    body {
      background: var(--bg-main);
      color: var(--text-main);
      min-height: 100vh;
      display: flex;
      margin: 0;
    }

    /* SIDEBAR */
    .sidebar {
      width: 240px;
      background: var(--bg-sidebar);
      color: var(--text-sidebar);
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      border-right: 2px solid var(--border-color);
      box-shadow: 3px 0 10px var(--shadow-color);
      z-index: 1050;
    }

    .sidebar h4 {
      color: #ff4f8f;
      font-weight: 700;
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid var(--border-color);
      letter-spacing: 0.5px;
    }

    .sidebar a {
      color: var(--text-sidebar);
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      border-radius: 8px;
      margin: 3px 10px;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: linear-gradient(90deg, #ff4f8f, #ff7fb1);
      color: #fff;
      transform: translateX(4px);
      box-shadow: 0 3px 8px rgba(255, 79, 143, 0.4);
    }

    /* MAIN CONTENT */
    main {
      margin-left: 240px;
      flex-grow: 1;
      background-color: var(--bg-main);
      min-height: 100vh;
      padding: 2rem;
      position: relative;
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1040;
    }

    .sidebar-overlay.active {
      display: block;
    }

    /* TOPBAR */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      border-bottom: 2px solid var(--border-color);
      padding-bottom: 10px;
    }

    .btn-logout {
      background-color: #ff4f8f;
      border: none;
      color: white;
      border-radius: 6px;
      padding: 6px 14px;
      font-weight: 500;
      transition: all 0.25s ease-in-out;
      box-shadow: 0 4px 10px rgba(255, 79, 143, 0.25);
    }

    .btn-logout:hover {
      background-color: #ff86b6;
      transform: scale(1.05);
      box-shadow: 0 6px 14px rgba(255, 79, 143, 0.4);
    }

    .theme-toggle {
      background: transparent;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: #ff4f8f;
      transition: all 0.3s ease;
    }

    .theme-toggle:hover {
      transform: rotate(15deg) scale(1.2);
      color: #ff86b6;
    }

    .menu-toggle {
      display: none;
    }

    footer {
      background: var(--bg-sidebar);
      text-align: center;
      padding: 1rem;
      margin-top: 3rem;
      border-top: 1px solid var(--border-color);
      color: var(--text-sidebar);
      font-size: 0.9rem;
      letter-spacing: 0.3px;
    }

    /* BUTTONS & TITLES */
    .btn-pink {
      background-color: #ff4f8f;
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 18px;
      transition: all 0.2s ease-in-out;
      box-shadow: 0 4px 10px rgba(255, 79, 143, 0.3);
    }

    .btn-pink:hover {
      background-color: #ff6faa;
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(255, 79, 143, 0.5);
    }

    .dashboard-title {
      color: var(--text-main) !important;
      transition: color 0.3s ease;
    }

    /* FORM FIX (Dark Mode) */
    body.dark-mode .form-control,
    body.dark-mode .form-select {
      background-color: #1a1a1a;
      color: var(--text-main);
      border-color: var(--border-color);
    }

    body.dark-mode .form-control:focus,
    body.dark-mode .form-select:focus {
      background-color: #222;
      color: var(--text-main);
      border-color: #ff86b6;
      box-shadow: 0 0 0 0.25rem rgba(255, 79, 143, 0.25);
    }

    body.dark-mode .form-control::placeholder {
      color: #888;
    }

    body.dark-mode .form-select option {
      background: #1a1a1a;
      color: var(--text-main);
    }

    /* SCROLLBAR */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #ff4f8f;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background-color: #ff7fb1;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
      body {
        display: block;
      }

      .sidebar {
        width: 220px;
        left: -240px;
        transition: left 0.3s ease-in-out;
      }

      .sidebar.active {
        left: 0;
        box-shadow: 5px 0 15px rgba(255, 79, 143, 0.3);
      }

      main {
        margin-left: 0;
        padding: 1.5rem;
      }

      .menu-toggle {
        display: inline-block;
        cursor: pointer;
        font-size: 1.8rem;
        color: #ff4f8f;
        margin-right: 12px;
        transition: 0.3s;
      }

      .menu-toggle:hover {
        transform: scale(1.15);
        color: #ff86b6;
      }

      .topbar {
        flex-wrap: wrap;
        gap: 10px;
        text-align: center;
      }

      .topbar h3 {
        font-size: 1.2rem;
        text-align: center;
        flex: 1 1 100%;
      }

      .btn-logout {
        padding: 6px 12px;
        font-size: 0.9rem;
      }

      .theme-toggle {
        font-size: 1.4rem;
      }
    }

    @media (max-width: 576px) {
      main {
        padding: 1rem;
      }

      .dashboard-title {
        font-size: 1rem;
        text-align: center;
      }

      .sidebar {
        width: 200px;
      }

      .btn-pink {
        width: 100%;
        display: block;
        text-align: center;
        margin-top: 5px;
      }

      footer {
        font-size: 0.8rem;
        padding: 0.8rem;
      }
    }
  </style>
</head>

<body>
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="sidebar" id="sidebar">
    <h4>Menu</h4>
    <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('pegawai.index') }}" class="{{ Request::is('pegawai*') ? 'active' : '' }}">Data Pegawai</a>
    <a href="{{ route('jabatan.index') }}" class="{{ Request::is('jabatan*') ? 'active' : '' }}">Data Jabatan</a>
    <a href="{{ route('departemen.index') }}" class="{{ Request::is('departemen*') ? 'active' : '' }}">Data Departemen</a>
    <a href="{{ route('pengaturan.index') }}" class="{{ Request::is('pengaturan*') ? 'active' : '' }}">Pengaturan</a>
  </div>

  <main>
    <div class="topbar">
      <div class="d-flex align-items-center">
        <span class="menu-toggle" id="menuToggle">☰</span>
        <h3 class="fw-bold mb-0 dashboard-title">Dashboard Aplikasi Data Pegawai</h3>
      </div>
      <div class="d-flex align-items-center gap-3">
        <button class="theme-toggle" id="themeToggle" title="Ganti Tema">🌙</button>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn-logout">Logout</button>
        </form>
      </div>
    </div>

    <div class="content">
      @yield('content')
    </div>

    <footer>
      © 2025 Aplikasi Data Pegawai
    </footer>
  </main>

  <script>
    // === DARK MODE TOGGLE ===
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;

    if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('dark-mode');
      themeToggle.textContent = '☀';
    }

    themeToggle.addEventListener('click', () => {
      body.classList.toggle('dark-mode');
      const isDark = body.classList.contains('dark-mode');
      themeToggle.textContent = isDark ? '☀' : '🌙';
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });

    // === SIDEBAR TOGGLE ===
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    const openSidebar = () => {
      sidebar.classList.add('active');
      overlay.classList.add('active');
    };

    const closeSidebar = () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    };

    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      sidebar.classList.contains('active') ? closeSidebar() : openSidebar();
    });

    overlay.addEventListener('click', closeSidebar);
  </script>
</body>

</html>
