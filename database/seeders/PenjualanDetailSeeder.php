<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) { // 10 Transaksi
            for ($j = 1; $j <= 3; $j++) { // 3 Barang per transaksi
                DB::table('t_penjualan_detail')->insert([
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 10),
                    'jumlah' => rand(1, 5),
                    'harga' => rand(10000, 50000), // Tambahkan kolom 'harga'
                ]);
            }
        }
    }
}
