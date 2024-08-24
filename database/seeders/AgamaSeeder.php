<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agama = [
            ['nama' => 'Islam'],
            ['nama' => 'Katolik'],
            ['nama' => 'Kristen'],
            ['nama' => 'Hindu'],
            ['nama' => 'Budha'],
            ['nama' => 'Konghucu'],
        ];

        // Tambahkan 'created_at' dan 'updated_at' menggunakan array_map
        $agama = array_map(function ($prov) {
            return array_merge($prov, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $agama);

        DB::table('agama')->insert($agama);
    }
}