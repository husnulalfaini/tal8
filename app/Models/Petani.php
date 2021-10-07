<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Petani extends Model
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $table = "petanis";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama','email','kelompok_id','password','alamat','telepon','foto',];

    public function lahan()
    {
        return $this->hasMany(Lahan::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

}