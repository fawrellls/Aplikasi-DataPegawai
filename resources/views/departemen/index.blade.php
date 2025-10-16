@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h4 class="fw-bold mb-0">Data Departemen</h4>
    <a href="{{ route('departemen.create') }}" class="btn btn-pink">+ Tambah Departemen</a>
  </div>

  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
      <div class="table-responsive rounded">
        <table class="table align-middle text-center mb-0">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama Departemen</th>
              <th>Keterangan</th>
              <th>Jumlah Pegawai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($departemen as $d)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama_departemen }}</td>
                <td class="text-start">{{ $d->keterangan }}</td>
                <td>{{ $d->pegawai_count }} Orang</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('departemen.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departemen.destroy', $d->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
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
  }
</style>
@endsection
