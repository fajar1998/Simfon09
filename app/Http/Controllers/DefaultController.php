<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Inventori;
use App\Models\Mapel;
use App\Models\NilaiMin;
use App\Models\SiswaTempatan;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function GetMapel(Request $request)
    {
        $kelas_id = $request->kelas_id;
        $allData = NilaiMin::with(['mata_pelajaran'])->where('kelas_id',$kelas_id)->get();
        return response()->json($allData);

    }
    public function GetSiswa(Request $request)
    {
        $tahun_id = $request->tahun_id;
        $kelas_id = $request->kelas_id;
        $allData = SiswaTempatan::with(['siswa'])->where('tahun_id',$tahun_id)->where('kelas_id',$kelas_id)->get();
        return response()->json($allData);


    }

    public function GetHarga(Request $request)
    {
        $id_barang = $request->id_barang;
        $allData = BarangMasuk::with(['harga_barang'])->where('id_barang',$id_barang)->get();
        return response()->json($allData);

    }
}
