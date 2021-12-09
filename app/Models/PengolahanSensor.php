<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PengolahanSensor extends Model
{
    use HasFactory;
    protected $table = "pengolahan_sensors";
    protected $primaryKey = "id";
    protected $fillable = ['id','sensor_id','lahan_id','ph','kelembapan','info_ph','info_kelembapan','rekom_ph','rekom_kelembapan','created_at'];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('H:i:s');
    }


    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('H:i:s');
    }
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('H:i:s');
    }
}