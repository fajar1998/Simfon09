<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;


    public function sekolah_subjek()
    {
        return $this->belongsTo(SekolahSubjek::class, 'subjek_id', 'id');
    }
}
