@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h4 class="fw-bold mb-0">Data Pegawai</h4>
    <a href="{{ route('pegawai.create') }}" class="btn btn-pink">+ Tambah Pegawai</a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
      <div class="table-responsive rounded">
        <table class="table align-middle text-center mb-0">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Jabatan</th>
              <th>Departemen</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pegawais as $index => $p)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if($p->foto)
                    <img src="{{ asset('uploads/foto/'.$p->foto) }}" alt="Foto" width="60" height="60" class="rounded-circle border shadow-sm">
                  @else
                    <span class="text-muted">-</span>
                  @endif
                </td>
                <td class="text-start">{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->tgl_lahir }}</td>
                <td>{{ $p->jabatan->nama_jabatan ?? '-' }}</td>
                <td>{{ $p->departemen->nama_departemen ?? '-' }}</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted py-3">Belum ada data pegawai</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<style>
  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }

  .table th, .table td {
    vertical-align: middle !important;
    white-space: nowrap;
  }

  @media (max-width: 768px) {
    .table th, .table td {
      font-size: 0.85rem;
      padding: 0.6rem;
    }
    .btn-sm {
      font-size: 0.75rem;
      padding: 3px 8px;
    }
    .table img {
      width: 45px;
      height: 45px;
    }
  }
</style>
@endsection
