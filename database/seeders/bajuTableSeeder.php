<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BajuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting multiple entries
        DB::table('baju')->insert([
            [
                'nama' => 'Baju Batik',
                'gambar' => 'batik.jpg',
                'harga' => '150000',
                'deskripsi' => 'Baju batik modern dengan motif terkini.'
            ],
            [
                'nama' => 'Baju Koko',
                'gambar' => 'koko.jpg',
                'harga' => '120000',
                'deskripsi' => 'Baju koko nyaman untuk hari raya.'
            ],
            
        ]);
    }
}