<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentor extends Model
{
    use HasFactory;

    public function kategorikelas()
    {
        return $this->belongsTo('App\Models\KategoriKelas', 'kategori_id');
    }

    public function kelas()
    {
        return $this->hasMany('App\Models\Kelas');
    }
}
