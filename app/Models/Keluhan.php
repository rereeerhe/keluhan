<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = "keluhan";

    protected $fillable = [
        'id_pengguna',
        'id_admin',
        'nama_keluhan',
        'deskripsi',
        'tanggapan',
        'status'
    ];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna', 'id_pengguna');
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin', 'id_admin');
    }

}
