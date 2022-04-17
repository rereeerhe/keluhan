<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = "pengguna";

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'id_user',
        'id_keluhan'
    ];

    public function keluhan(){
        return $this->hasMany('App\Models\Keluhan', 'id_keluhan');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }


}
