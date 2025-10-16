@extends('layout.dashboard')

@section('content')
<div class="container">
  <h2 class="fw-bold mb-4 dashboard-title">Edit Departemen</h2>

  <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Departemen</label>
      <input type="text" name="nama_departemen" 
             value="{{ $departemen->nama_departemen }}" 
             class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3" 
                placeholder="Masukkan keterangan departemen">{{ $departemen->keterangan }}</textarea>
    </div>

    <div class="d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-pink px-4 py-2 fw-semibold shadow-sm">Update</button>
      <a href="{{ route('departemen.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold">Kembali</a>
    </div>
  </form>
</div>
@endsection
