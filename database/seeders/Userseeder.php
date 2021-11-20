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
            'email' =>'admin@gmail.com',
            'password' =>bcrypt('admin'),
            'remember_token' =>Str::random(60),
        ]);
        User::create([
            'name' =>'husnul',
            'level' =>'pimpinan',
            'email' =>'pimpinan1@gmail.com',
            'password' =>bcrypt('pimpinan'),
            'remember_token' =>Str::random(60),
        ]);
        User::create([
            'name' =>'husnul',
            'kelompok_id' =>'1',
            'level' =>'ketua',
            'email' =>'husnul2@gmail.com',
            'password' =>bcrypt('ketua'),
            'remember_token' =>Str::random(60),
        ]);
        User::create([
            'name' =>'husnul',
            'level' =>'orang_biasa',
            'email' =>'husnul3@gmail.com',
            'password' =>bcrypt('husnul123'),
            'remember_token' =>Str::random(60),
        ]);
    }
}
