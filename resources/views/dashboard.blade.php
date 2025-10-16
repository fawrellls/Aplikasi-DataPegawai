@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <h4 class="dashboard-title fw-bold mb-4">Welcome!!!</h4>

    <!-- Row Statistik -->
    <div class="row g-4">
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow text-center">
                <div class="card-body py-4">
                    <h6 class="fw-semibold mb-1">Total Pegawai</h6>
                    <h2 class="fw-bold">{{ $pegawaiCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow text-center">
                <div class="card-body py-4">
                    <h6 class="fw-semibold mb-1">Total Jabatan</h6>
                    <h2 class="fw-bold">{{ $jabatanCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow text-center">
                <div class="card-body py-4">
                    <h6 class="fw-semibold mb-1">Total Departemen</h6>
                    <h2 class="fw-bold">{{ $departemenCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow text-center">
                <div class="card-body py-4">
                    <h6 class="fw-semibold mb-1">Total User</h6>
                    <h2 class="fw-bold">{{ $userCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="card mt-4 border-0 shadow">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Jumlah Pegawai per Departemen</h5>
            <canvas id="pegawaiChart"></canvas>
        </div>
    </div>

    <!-- Search & Filter Pegawai -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
        <h5 class="fw-bold mb-0">Data Pegawai (10 Teratas)</h5>

        <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 flex-wrap">
            <!-- Search -->
            <input type="text" name="search" value="{{ $search ?? '' }}"
                class="form-control form-control-sm"
                placeholder="Cari nama, jabatan, atau departemen..."
                style="min-width: 250px; border-radius: 8px;">

            <!-- Dropdown Gender -->
            <select name="gender" class="form-select form-select-sm"
                style="min-width: 140px; border: 1px solid #ff4f8f; border-radius: 8px;">
                <option value="">Semua Gender</option>
                <option value="Laki-laki" {{ request('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <!-- Tombol -->
            <button type="submit" class="btn btn-pink btn-sm">Cari</button>
            @if($search || request('gender'))
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Reset</a>
            @endif
        </form>
    </div>

    <!-- Tabel Data Pegawai -->
    <div class="card mt-3 border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-pink fw-semibold">
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai ?? [] as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ ucfirst($p->jenis_kelamin ?? '-') }}</td>
                                <td>{{ $p->jabatan?->nama_jabatan ?? '-' }}</td>
                                <td>{{ $p->departemen?->nama_departemen ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Tidak ada data pegawai ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Ucapan dinamis -->
    <div class="mt-4 p-4 rounded shadow-sm text-center motivation-card">
        <h5 class="fw-bold mb-2"> Hwaitingggg, {{ Auth::user()->name ?? 'Admin' }}! </h5>
        <p>Pantau terus pantang mundur</p>
    </div>
</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pegawaiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($departemenLabels ?? []) !!},
            datasets: [{
                label: 'Jumlah Pegawai',
                data: {!! json_encode($pegawaiPerDepartemen ?? []) !!},
                backgroundColor: '#ff4f8f',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { backgroundColor: '#111', titleColor: '#ffb6d5', bodyColor: '#fff' }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: getComputedStyle(document.body).getPropertyValue('--text-main') }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: getComputedStyle(document.body).getPropertyValue('--text-main') },
                    grid: { color: '#eee' }
                }
            }
        }
    });
</script>

<style>
    .stat-card {
        background: linear-gradient(135deg, #ff4f8f, #ffb6d5);
        color: white;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 14px rgba(255, 79, 143, 0.4);
    }

    .dashboard-title {
        color: var(--text-main);
    }

    .motivation-card {
        background: linear-gradient(to right, #ff4f8f, #ffb6d5);
        color: #fff;
        border-radius: 12px;
    }

    .table {
        color: var(--text-main);
    }

    .text-pink {
        color: #ff4f8f;
    }

    body.dark-mode .stat-card {
        background: linear-gradient(135deg, #111, #ff4f8f);
    }

    body.dark-mode .motivation-card {
        background: linear-gradient(to right, #000000, #ff4f8f);
    }

    body.dark-mode .table {
        color: #f8f9fa;
    }

    input[type="text"],
    select {
        border: 1px solid #ff4f8f;
        background-color: var(--bg-sidebar);
        color: var(--text-main);
    }

    input[type="text"]:focus,
    select:focus {
        box-shadow: 0 0 10px rgba(255, 79, 143, 0.4);
        border-color: #ff6faa;
    }
</style>
@endsection
