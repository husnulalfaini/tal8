<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lahan;

class LahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lahan::create([
            'petani_id' =>'1',
            'kelompok_id' =>'1',
            'nama' =>'lahan 1',
            'alamat' =>'giri',
            'foto' =>'foto.jpg',
        ]);
    }
}
