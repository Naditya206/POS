<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $validUserIds = DB::table('m_user')->pluck('user_id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('t_penjualan')->insert([
                'user_id' => $validUserIds[array_rand($validUserIds)], // Hanya pilih ID yang valid
                'pembeli' => 'Pembeli ' . $i,
                'penjualan_kode' => 'PNJ-' . Str::upper(Str::random(6)),
                'penjualan_tanggal' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
