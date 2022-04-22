<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;

use Illuminate\Http\Request;

class InventKmController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function BarangMasukIndex()
    {
        $data['barangmsk'] = BarangMasuk::all();
        return view('Inventori.BarangMasuk.v_inv_msk',$data);
    }
}
