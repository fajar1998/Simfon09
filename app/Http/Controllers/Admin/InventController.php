<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Inventori;
use App\Models\KategoriInvent;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        $data['inv'] = Inventori::all();
        $data['ruang'] = Ruangan::all();
        $data['kategori'] = KategoriInvent::all();
        return view('Inventori.v_inv',$data);
    }

   public function BarangMasukStore(Request $request)
   {

    $data = New BarangMasuk();
    $data->no_barang_masuk = $request->no_barang_masuk;
    $data->id_barang = $request->id_barang;
    $data->jumlah_brg_msk = $request->jumlah_brg_msk;
    $data->total = $request->total;
    $data['created_by'] = Auth::user()->name;

    $data->save();

    $barang = Inventori::find($request->id_barang);
    $barang->stock += $request->jumlah_brg_msk;
    $barang->save();

    $notification = array(
        'message' => 'Barang Masuk Telah Di Entry ',
        'alert-type' => 'success'
    );

    return redirect()->route('invent.index')->with($notification);
   }

   public function BarangKeluarStore(Request $request)
   {
    $data = New BarangKeluar();
    $data->no_barang_keluar = $request->no_barang_keluar;
    $data->id_barang = $request->id_barang;
    $data->jumlah_brg_klr = $request->jumlah_brg_klr;
    $data['created_by'] = Auth::user()->name;
    $data->save();
    $notifer = array(
        'message' => 'Tidak Bisa Entry Karena Jumlah Keluar Melebihi Stok',
        'alert-type' => 'warning'
    );

    $notification = array(
        'message' => 'Barang Keluar Telah Di input',
        'alert-type' => 'success'
    );

    $barang = Inventori::find($request->id_barang);
    if ($barang->stock < $request->jumlah_brg_klr)
    {
        return redirect()->back()->with($notifer);
    }else{
        $barang->stock -=$request->jumlah_brg_klr;
        $barang->save();
        return redirect()->route('invent.index')->with($notification);
    }





}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id_kategori == "0") {
            $kategori = new KategoriInvent();
            $kategori->name = $request->name;
            $kategori->save();
            $id_kategori = $kategori->id;
         }else {
             $id_kategori = $request->id_kategori;
         }
        $data = new Inventori();
        $data->nama_barang = $request->nama_barang;
        // $data->id_kategori = $request->id_kategori;
        $data->ruangan_id = $request->ruangan_id;
        $data->id_kategori = $id_kategori;
        $data->harga = $request->harga;
        $data->stock = $request->stock;

        $data->save();
        $notification = array(
            'message' => 'Barang Telah Di Entry ',
            'alert-type' => 'success'
        );
        return redirect()->route('invent.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Inventori::find($id);
        $data->nama_barang = $request->nama_barang;
        // $data->id_kategori = $request->id_kategori;
        $data->ruangan_id = $request->ruangan_id;
        $data->id_kategori = '1';
        $data->harga = $request->harga;
        $data->stock = $request->stock;

        $data->save();
        $notification = array(
            'message' => 'Barang Telah Di Update ',
            'alert-type' => 'success'
        );
        return redirect()->route('invent.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
