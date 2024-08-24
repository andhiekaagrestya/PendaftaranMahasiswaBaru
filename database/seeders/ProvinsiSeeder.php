<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = [
            ['nama' => 'Nangroe Aceh Darussalam'],
            ['nama' => 'Sumatera Utara'],
            ['nama' => 'Sumatera Barat'],
            ['nama' => 'Sumatera Selatan'],
            ['nama' => 'Riau'],
            ['nama' => 'Kepulauan Riau'],
            ['nama' => 'Jambi'],
            ['nama' => 'Bengkulu'],
            ['nama' => 'Bangka Belitung'],
            ['nama' => 'Lampung'],
            ['nama' => 'Banten'],
            ['nama' => 'Jawa Barat'],
            ['nama' => 'Jawa Tengah'],
            ['nama' => 'Jawa Timur'],
            ['nama' => 'DKI Jakarta'],
            ['nama' => 'D.I Yogyakarta'],
            ['nama' => 'Bali'],
            ['nama' => 'Nusa Tenggara Barat'],
            ['nama' => 'Nusa Tenggara Timur'],
            ['nama' => 'Kalimantan Barat'],
            ['nama' => 'Kalimantan Selatan'],
            ['nama' => 'Kalimantan Tengah'],
            ['nama' => 'Kalimantan Timur'],
            ['nama' => 'Kalimantan Utara'],
            ['nama' => 'Gorontalo'],
            ['nama' => 'Sulawesi Selatan'],
            ['nama' => 'Sulawesi Tenggara'],
            ['nama' => 'Sulawesi Tengah'],
            ['nama' => 'Sulawesi Utara'],
            ['nama' => 'Sulawesi Barat'],
            ['nama' => 'Maluku'],
            ['nama' => 'Maluku Utara'],
            ['nama' => 'Papua'],
            ['nama' => 'Papua Barat'],
        ];

        // Tambahkan 'created_at' dan 'updated_at' menggunakan array_map
        $provinsi = array_map(function ($prov) {
            return array_merge($prov, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $provinsi);

        DB::table('provinsi')->insert($provinsi);
    }
}