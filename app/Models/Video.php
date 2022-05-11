<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    Protected $fillable = ['judul','link','deskripsi'];

    public function kelas(){
        return $this->belongsTo("App\Models\Kelas");
    }
}
