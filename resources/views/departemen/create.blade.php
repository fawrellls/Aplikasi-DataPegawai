@extends('layout.dashboard')
@section('content')

<h4 class="fw-bold mb-4">Tambah Departemen</h4>

<div class="card shadow border-0 w-100">
  <div class="card-body">
    <form action="{{ route('departemen.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="fw-semibold">Nama Departemen</label>
        <input type="text" name="nama_departemen" class="form-control" placeholder="Masukkan nama departemen" required>
      </div>

      <div class="mb-3">
        <label class="fw-semibold">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan departemen"></textarea>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-pink px-4 py-2 fw-semibold shadow-sm">Simpan</button>
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold">Kembali</a>
      </div>
    </form>
  </div>
</div>

@endsection
