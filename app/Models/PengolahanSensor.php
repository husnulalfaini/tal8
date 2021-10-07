<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengolahanSensor extends Model
{
    use HasFactory;
    protected $table = "pengolahan_sensors";
    protected $primaryKey = "id";
    protected $fillable = ['id','sensor_id','lahan_id','ph','kelembapan','info_ph','info_kelembapan','rekom_ph','rekom_kelembapan'];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }
}