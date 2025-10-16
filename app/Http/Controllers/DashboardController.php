<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $pegawaiCount = Pegawai::count();
        $jabatanCount = Jabatan::count();
        $departemenCount = Departemen::count();
        $userCount = User::count();

        $departemenLabels = Departemen::pluck('nama_departemen');
        $pegawaiPerDepartemen = Departemen::withCount('pegawai')->pluck('pegawai_count');

        // Ambil input filter
        $search = $request->get('search');
        $gender = $request->get('gender');

        $pegawai = Pegawai::with(['jabatan', 'departemen'])
            ->when($gender, function ($q) use ($gender) {
                if ($gender === 'Laki-laki') {
                    $q->where('jenis_kelamin', 'L');
                } elseif ($gender === 'Perempuan') {
                    $q->where('jenis_kelamin', 'P');
                }
            })
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                        ->orWhereHas('jabatan', fn($j) => $j->where('nama_jabatan', 'like', "%{$search}%"))
                        ->orWhereHas('departemen', fn($d) => $d->where('nama_departemen', 'like', "%{$search}%"));
                });
            })

            ->limit(10)
            ->get();

        return view('dashboard', compact(
            'pegawaiCount',
            'jabatanCount',
            'departemenCount',
            'userCount',
            'departemenLabels',
            'pegawaiPerDepartemen',
            'pegawai',
            'search',
            'gender'
        ));
    }
}
