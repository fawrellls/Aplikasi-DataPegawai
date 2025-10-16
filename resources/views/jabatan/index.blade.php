@extends('layout.dashboard')
@section('content')

<h4 class="fw-bold mb-4 dashboard-title">Data Jabatan</h4>

<a href="{{ route('jabatan.create') }}" class="btn btn-pink mb-3">+ Tambah Jabatan</a>

<div class="row g-4">
  @foreach($jabatan as $item)
    <div class="col-md-4">
      <div class="card jabatan-card text-center p-4 border-0 shadow-lg">
        <h5 class="fw-bold text-pink mb-2">{{ $item->nama_jabatan }}</h5>
        <p class="mb-3">Gaji Pokok: <strong>Rp {{ number_format($item->gaji_pokok, 0, ',', '.') }}</strong></p>
        <div class="d-flex justify-content-center gap-2">
          <a href="{{ route('jabatan.edit', $item->id) }}" class="btn btn-warning btn-sm px-3 fw-semibold">Edit</a>
          <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm px-3 fw-semibold">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>

<style>
  /* CARD STYLE */
  .jabatan-card {
    background: var(--card-bg);
    color: var(--card-text);
    border-radius: 16px;
    transition: all 0.35s ease;
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
  }

  .jabatan-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(255, 79, 143, 0.35);
  }

  /* PINK TITLE */
  .text-pink {
    color: #ff4f8f;
  }

  /* LIGHT MODE */
  :root {
    --card-bg: #111;
    --card-text: #ffffff;
  }

  /*DARK MODE (card putih, teks hitam) */
  body.dark-mode {
    --card-bg: #ffffff;
    --card-text: #111;
  }

  
  .jabatan-card p {
    font-size: 15px;
  }

  .btn-warning {
    background-color: #ffc107;
    border: none;
  }

  .btn-warning:hover {
    background-color: #ffca2c;
  }

  .btn-danger {
    background-color: #dc3545;
    border: none;
  }

  .btn-danger:hover {
    background-color: #e85a66;
  }
</style>

@endsection
