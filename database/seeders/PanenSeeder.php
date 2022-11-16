<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Panen;

class PanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Panen::create([
            'lahan_id' =>'1',
            'panen_katak' =>'100',
            'panen_umbi' =>'100',
            'tanggal' =>'2022-11-16',
        ]);
    }
}
