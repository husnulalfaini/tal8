<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;
    protected $table = "lahans";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama','alamat','petani_id','luas_lahan','alamat','foto',];

    public function tanam()
    {
        return $this->hasMany(Tanam::class);
    }

    public function panen()
    {
        return $this->hasMany(Panen::class);
    }

    public function petani()
    {
        return $this->belongsTo(Petani::class);
    }

    public function hasilolah()
    {
        return $this->hasMany(Lahan::class);
    }
}
