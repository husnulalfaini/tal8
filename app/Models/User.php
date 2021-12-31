<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'alamat',
        'telepon',
        'foto',
        'kelompok_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    // public function getfoto(Type $var = null)
    // {
    //     if (!$this->foto) {
    //         return asset('public/asset/dist/img/avatar.jpg');
    //     }
    //         return asset('public/storage/'.$this->foto);
    // }
}

