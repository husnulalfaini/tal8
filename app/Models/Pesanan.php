<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanans";
    protected $primaryKey = "id";
    protected $fillable = ['id','petani_id','bibit_id','stok_katak','stok_umbi','harga_katak','harga_umbi','total_bayar','catatan','status','created_at',];

    public function bibit()
    {
        return $this->belongsTo(Bibit::class);
    }
    public function petani()
    {
        return $this->belongsTo(Petani::class);
    }
}
