@extends('layout.dashboard')
@section('content')

<h4 class="fw-bold mb-4">Edit Jabatan</h4>

<div class="container-fluid">
  <div class="card shadow border-0 mx-auto" style="max-width: 900px; border-radius: 12px;">
    <div class="card-body">
      <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Jabatan -->
        <div class="mb-3">
          <label class="fw-semibold text-dark">Nama Jabatan</label>
          <input 
            type="text" 
            name="nama_jabatan" 
            class="form-control" 
            value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" 
            placeholder="Masukkan nama jabatan" 
            required>
        </div>

        <!-- Gaji Pokok -->
        <div class="mb-3">
          <label class="fw-semibold text-dark">Gaji Pokok</label>
          <input 
            type="number" 
            name="gaji_pokok" 
            class="form-control" 
            value="{{ old('gaji_pokok', $jabatan->gaji_pokok) }}" 
            placeholder="Masukkan gaji pokok (contoh: 8500000)" 
            required>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2 mt-3">
          <button type="submit" class="btn btn-pink px-4 py-2 fw-semibold shadow-sm">
            Update
          </button>
          <a href="{{ route('jabatan.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold">
            Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .btn-pink {
    background-color: #ff4f8f;
    border: none;
    color: #fff;
    border-radius: 8px;
    transition: all 0.2s ease-in-out;
  }

  .btn-pink:hover {
    background-color: #ff7fb6;
    transform: scale(1.03);
  }

  input.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
  }

  .card {
    background: #fff;
    box-shadow: 0 4px 25px rgba(255, 79, 143, 0.2);
  }
</style>

@endsection
