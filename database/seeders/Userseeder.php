<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' =>'husnul',
            'level' =>'admin',
            'email' =>'husnul@gmail.com',
            'password' =>bcrypt('husnul123'),
            'remember_token' =>Str::random(60),
        ]);
        User::create([
            'name' =>'husnul',
            'level' =>'pimpinan',
            'email' =>'husnul1@gmail.com',
            'password' =>bcrypt('husnul123'),
            'remember_token' =>Str::random(60),
        ]);
    }
}