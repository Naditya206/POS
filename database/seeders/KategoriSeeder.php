<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_kategori')->insert([
            ['kategori_kode' => 'FB', 'kategori_nama' => 'Food & Beverage'],
            ['kategori_kode' => 'BH', 'kategori_nama' => 'Beauty & Health'],
            ['kategori_kode' => 'HC', 'kategori_nama' => 'Home Care'],
            ['kategori_kode' => 'BK', 'kategori_nama' => 'Baby & Kid'],
            ['kategori_kode' => 'EL', 'kategori_nama' => 'Electronics'],
        ]);
    }
}
