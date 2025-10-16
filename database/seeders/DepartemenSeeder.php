<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departemen')->insert([
            [
                'nama_departemen' => 'Keuangan',
                'keterangan' => 'Bertanggung jawab atas manajemen keuangan dan akuntansi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_departemen' => 'Produksi',
                'keterangan' => 'Mengelola proses produksi dan operasional perusahaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_departemen' => 'IT',
                'keterangan' => 'Menangani sistem teknologi informasi dan jaringan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
