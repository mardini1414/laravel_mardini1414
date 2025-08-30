<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('pasien')->insert([
                'nama' => 'Pasien' . chr(64 + $i),
                'alamat' => fake('id_ID')->address,
                'telepon' => fake('id_ID')->phoneNumber,
                'rumah_sakit_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
