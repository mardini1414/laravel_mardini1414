<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for ($i = 1; $i <= 10; $i++) {
            DB::table('rumah_sakit')->insert([
                'nama' => 'Rumah Sakit ' . chr(64 + $i),
                'alamat' => fake('id_ID')->address,
                'email' => 'rs' . strtolower(chr(64 + $i)) . '@example.com',
                'telepon' => fake('id_ID')->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
