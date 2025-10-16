@extends('layout.dashboard')

@section('content')
<div class="container">
  <h2 class="fw-bold mb-4 text-dark"> Detail Jabatan</h2>

  <div class="card shadow-sm p-4">
    <p><strong>Nama Jabatan:</strong> {{ $jabatan->nama_jabatan }}</p>
    <p><strong>Deskripsi:</strong> {{ $jabatan->deskripsi }}</p>
  </div>

  <a href="{{ route('jabatan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
