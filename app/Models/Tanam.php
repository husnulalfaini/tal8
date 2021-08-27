<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanam extends Model
{
    protected $table = "tanams";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama','petani_id','tanggal','jumlah_bibit',];

    public function petani()
    {
        return $this->belongsTo(Petani::class);
    }
}
