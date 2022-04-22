<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Inventori::class, 'id_barang', 'id');
    }
    public function harga_barang()
    {
        return $this->belongsTo(Inventori::class, 'harga', 'id_barang');
    }
}
