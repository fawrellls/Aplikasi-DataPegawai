@extends('Layout.dashboard')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-4">Edit Data Pegawai</h4>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="L" {{ $pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}" class="form-control" required>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $pegawai->alamat }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Jabatan</label>
                <select name="jabatan_id" class="form-select" required>
                    @foreach ($jabatans as $j)
                        <option value="{{ $j->id }}" {{ $pegawai->jabatan_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Departemen</label>
                <select name="departemen_id" class="form-select" required>
                    @foreach ($departemens as $d)
                        <option value="{{ $d->id }}" {{ $pegawai->departemen_id == $d->id ? 'selected' : '' }}>
                            {{ $d->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Foto</label><br>
                @if($pegawai->foto)
                    <img src="{{ asset('uploads/foto/'.$pegawai->foto) }}" width="80" class="mb-2 rounded-circle border">
                @endif
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
        </div>

        <button type="submit" class="btn btn-pink mt-3">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
