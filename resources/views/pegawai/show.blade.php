@extends('Layout.dashboard')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-4">Detail Pegawai</h4>

    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($pegawai->foto)
                    <img src="{{ asset('uploads/foto/'.$pegawai->foto) }}" class="rounded-circle border" width="150">
                @else
                    <span class="text-muted">Tidak ada foto</span>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr><th>Nama</th><td>{{ $pegawai->nama }}</td></tr>
                    <tr><th>Jenis Kelamin</th><td>{{ $pegawai->jenis_kelamin }}</td></tr>
                    <tr><th>Tanggal Lahir</th><td>{{ $pegawai->tgl_lahir }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $pegawai->alamat }}</td></tr>
                    <tr><th>Jabatan</th><td>{{ $pegawai->jabatan->nama_jabatan }}</td></tr>
                    <tr><th>Departemen</th><td>{{ $pegawai->departemen->nama_departemen }}</td></tr>
                </table>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
