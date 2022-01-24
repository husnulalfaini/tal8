<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Panen extends Model
{
    protected $table = "panens";
    protected $primaryKey = "id";
    protected $fillable = ['id','lahan_id','tanggal','panen_katak','panen_umbi',];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    
    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('d-M-Y');
    }
}
