<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pegawai')->insert([
            [
                'nama' => 'Hassyfa Eka Putri',
                'jenis_kelamin' => 'P',
                'tgl_lahir' => '2003-06-17',
                'alamat' => 'Jl. Melati No. 12, Bandung',
                'foto' => 'hassyfa.jpg',
                'jabatan_id' => 1, // Manager
                'departemen_id' => 1, // Keuangan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Muhammad Farel Rasendriya Octavian',
                'jenis_kelamin' => 'L',
                'tgl_lahir' => '2002-09-10',
                'alamat' => 'Jl. Mawar No. 8, Cimahi',
                'foto' => 'farel.jpg',
                'jabatan_id' => 2, // Supervisor
                'departemen_id' => 2, // Produksi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra Andini',
                'jenis_kelamin' => 'P',
                'tgl_lahir' => '2004-01-23',
                'alamat' => 'Jl. Kenanga No. 5, Jakarta',
                'foto' => 'citra.jpg',
                'jabatan_id' => 3, // Staff
                'departemen_id' => 3, // IT
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
