<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petani;

class PetaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petani::create([
            'nama' =>'petani',
            'email' =>'petani@gmail.com',
            'password' =>bcrypt('petani'),
            'kelompok_id' =>'1',
            'foto' =>'foto.jpg',
        ]);
    }
}
