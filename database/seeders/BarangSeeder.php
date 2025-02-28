<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['barang_nama' => 'Minuman Soda', 'kategori_id' => 1],
            ['barang_nama' => 'Sabun Mandi', 'kategori_id' => 2],
            ['barang_nama' => 'Pembersih Lantai', 'kategori_id' => 3],
            ['barang_nama' => 'Popok Bayi', 'kategori_id' => 4],
            ['barang_nama' => 'Kipas Angin', 'kategori_id' => 5],
            ['barang_nama' => 'Snack Ringan', 'kategori_id' => 1],
            ['barang_nama' => 'Shampoo', 'kategori_id' => 2],
            ['barang_nama' => 'Pengharum Ruangan', 'kategori_id' => 3],
            ['barang_nama' => 'Susu Formula', 'kategori_id' => 4],
            ['barang_nama' => 'Lampu LED', 'kategori_id' => 5],
        ];

        foreach ($data as $item) {
            DB::table('m_barang')->insert([
                'barang_kode' => 'BRG-' . Str::upper(Str::random(6)), // Kode barang unik
                'barang_nama' => $item['barang_nama'],
                'kategori_id' => $item['kategori_id'],
                'harga_beli' => rand(5000, 50000),
                'harga_jual' => rand(6000, 60000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
