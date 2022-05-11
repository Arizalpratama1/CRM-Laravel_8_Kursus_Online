<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKelas extends Model
{
    use HasFactory;

    public function tentors()
    {
        return $this->hasMany('App\Models\Tentor');
    }

    public function kelas()
    {
        return $this->hasMany('App\Models\Kelas');
    }
}
