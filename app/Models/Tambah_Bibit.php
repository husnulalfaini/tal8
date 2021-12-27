<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTimeInterface;

class Tambah_Bibit extends Model
{
    use HasFactory;

    protected $table = "tambah_bibits";
    protected $primaryKey = "id";
    protected $fillable = ['id','bibit_id','stok_katak','stok_umbi','harga_katak','harga_umbi','supplier','catatan','created_at',];

    public function bibit()
    {
        return $this->belongsTo(Bibit::class);
    }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('D:M:Y');
    // }


    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('D:M:Y');
    }
}
