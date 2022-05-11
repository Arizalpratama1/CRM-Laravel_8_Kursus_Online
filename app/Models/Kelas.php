<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function kategorikelas()
    {
        return $this->belongsTo('App\Models\KategoriKelas', 'kategori_id');
    }

    public function tentor()
    {
        return $this->belongsTo('App\Models\Tentor', 'tentor_id');
    }

    public function videos()
    {
        return $this->hasMany("App\Models\Video");
    }
}
