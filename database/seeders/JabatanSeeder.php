<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'Manager',
                'gaji_pokok' => 8500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Supervisor',
                'gaji_pokok' => 6000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Staff',
                'gaji_pokok' => 4500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
