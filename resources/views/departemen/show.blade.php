@extends('layout.dashboard')

@section('content')
<div class="container">
  <h2 class="fw-bold mb-4 text-dark">Detail Departemen</h2>

  <div class="card shadow-sm p-4">
    <p><strong>Nama Departemen:</strong> {{ $departemen->nama_departemen }}</p>
    <p><strong>Lokasi:</strong> {{ $departemen->lokasi }}</p>
  </div>

  <a href="{{ route('departemen.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
