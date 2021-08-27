<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    protected $table = "panens";
    protected $primaryKey = "id";
    protected $fillable = ['id','petani_id','tanggal','panen_katak','panen_umbi',];

    public function petani()
    {
        return $this->belongsTo(Petani::class);
    }
}
