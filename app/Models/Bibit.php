<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;

    protected $table = "bibits";
    protected $primaryKey = "id";
    protected $fillable = ['id','jenis','stok','harga','created_at',];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function tambah()
    {
        return $this->hasMany(Tambah_Bibit::class);
    }
}
