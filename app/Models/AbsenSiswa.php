<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'kelas_id',
        'siswa_id',
        'status_kehadiran',
   ];

    public function user()
    {
        return $this->belongsTo(User::class,'siswa_id','id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

}
