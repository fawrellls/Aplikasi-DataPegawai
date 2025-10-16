@extends('layout.dashboard')

@section('content')
<div class="container" style="max-width:700px;">
  <h4 class="dashboard-tittle mb-4 fw-bold">Pengaturan Akun</h4>

  {{-- Notifikasi sukses --}}
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Notifikasi error --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card shadow border-0">
    <div class="card-body p-4">
      <form action="{{ route('pengaturan.update') }}" method="POST" onsubmit="return validatePassword()">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" name="name" class="form-control" 
                 value="{{ old('name', Auth::user()->name) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Username</label>
          <input type="text" name="username" class="form-control" 
                 value="{{ old('username', Auth::user()->username) }}" required>
        </div>

        <div class="mb-3 position-relative">
          <label class="form-label fw-semibold">Password Baru (Opsional)</label>
          <input type="password" id="password" name="password" class="form-control pe-5" 
                 placeholder="Kosongkan jika tidak ingin diubah">
          <span class="toggle-password" onclick="togglePassword('password', this)">
            🙈
          </span>
        </div>

        <div class="mb-3 position-relative">
          <label class="form-label fw-semibold">Konfirmasi Password Baru</label>
          <input type="password" id="confirm_password" name="confirm_password" class="form-control pe-5" 
                 placeholder="Ulangi password baru">
          <span class="toggle-password" onclick="togglePassword('confirm_password', this)">
            🙈
          </span>
        </div>

        <button type="submit" class="btn btn-pink w-100 mt-3">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>

<script>
  // Validasi sebelum submit
  function validatePassword() {
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('confirm_password').value;

    if (!password && !confirm) return true;
    if (password && !confirm) {
      alert('Silakan konfirmasi password baru Anda.');
      return false;
    }
    if (password !== confirm) {
      alert('Password dan konfirmasi password tidak cocok!');
      return false;
    }
    return true;
  }

  // Fungsi show/hide password (dibalik)
  function togglePassword(id, el) {
    const input = document.getElementById(id);
    const isText = input.type === "text";
    input.type = isText ? "password" : "text";
    el.textContent = isText ? "🙈" : "👁️"; // Sekarang 👁️ saat terlihat, 🙈 saat tersembunyi
  }
</script>

<style>
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
@endsection
