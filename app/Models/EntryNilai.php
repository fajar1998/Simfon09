<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryNilai extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(User::class,'siswa_id','id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'mapel_id','id');
    }
    public function tahun()
    {
        return $this->belongsTo(Tahun::class,'tahun_id','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }
    public function tipe_ujian()
    {
        return $this->belongsTo(TipeUjian::class,'tipe_ujian_id','id');
    }
}
