@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2 class="fw-bold text-dark mb-4">Ubah Pengaturan Aplikasi</h2>

        <form action="{{ route('pengaturan.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Aplikasi</label>
                <input type="text" name="nama_aplikasi" class="form-control" value="Aplikasi Data Pegawai">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Tema</label>
                <select name="tema" class="form-select">
                    <option value="light">Light Mode</option>
                    <option value="dark">Dark Mode</option>
                    <option value="blackpink" selected>Blackpink Mode</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Footer Text</label>
                <input type="text" name="footer" class="form-control" value="© 2025 Aplikasi Data Pegawai">
            </div>

            <button type="submit" class="btn btn-pink w-100 mt-3 d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>

            <a href="{{ route('pengaturan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection