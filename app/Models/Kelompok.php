<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = "kelompoks";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama','alamat','user_id','longitude','latitude','created_at',];

    public function petani()
    {
        return $this->hasMany(Petani::class);
    }

    public function ketua()
    {
        return $this->belongsTo(User::class);
    }
}
