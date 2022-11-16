<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelompok;
use Illuminate\Support\Str;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelompok::create([
            'nama' =>'giri indah',
            'alamat' =>'jln raya M.H Thamrin',
            'kecamatan' =>'giri',
            'longitude' =>'114.37351070',
            'latitude' =>	'-8.21025620',
        ]);
    }
}
