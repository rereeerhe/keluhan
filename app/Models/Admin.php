<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function keluhan(){
        return $this->hasMany('App\Models\Keluhan', 'id_keluhan');
    }

}
