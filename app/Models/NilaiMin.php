<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMin extends Model
{
    use HasFactory;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
}
