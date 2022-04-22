<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
    use HasFactory;
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }
    public function harga_barang()
    {
        return $this->belongsTo(Inventori::class, 'id_barang', 'harga');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriInvent::class, 'id_kategori', 'id');
    }

}
