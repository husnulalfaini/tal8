<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Petani extends Model
{
    use Notifiable;
    use HasApiTokens;

    protected $table = "petanis";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama','email','kelompok_id','password','alamat','telepon','foto',];

    public function lahan()
    {
        return $this->hasMany(Lahan::class);
    }
    // public function tanam()
    // {
    //     return $this->hasMany(Tanam::class);
    // }

    // public function panen()
    // {
    //     return $this->hasMany(Panen::class);
    // }
}
