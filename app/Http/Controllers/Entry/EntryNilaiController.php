<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Models\EntryNilai;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tahun;
use App\Models\TipeUjian;
use Dotenv\Parser\Entry;
use Illuminate\Http\Request;

class EntryNilaiController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();
        $data['tipe_ujian'] = TipeUjian::all();
        $data['mapel'] = Mapel::all();


        return view('Entry.Nilai.entry_skrg',$data);
    }

    public function MarksEditGetSiswa(Request $request)
    {
        $tahun_id = $request->tahun_id;
    	$kelas_id = $request->kelas_id;
    	$mapel_id = $request->mapel_id;
    	$tipe_ujian_id = $request->tipe_ujian_id;

    	$getSiswa = EntryNilai::with(['siswa'])->where('tahun_id',$tahun_id)->where('kelas_id',$kelas_id)->where('mapel_id',$mapel_id)->where('tipe_ujian_id',$tipe_ujian_id)->get();

    	return response()->json($getSiswa);
    }

    public function create()
    {
        //
    }

    public function NilaiStore(Request $request)
    {
        $hitungsiswa = $request->siswa_id;
    	if ($hitungsiswa) {
    		for ($i=0; $i <count($request->siswa_id) ; $i++) {
    		$data = New EntryNilai();
    		$data->tahun_id = $request->tahun_id;
    		$data->kelas_id = $request->kelas_id;
    		$data->mapel_id = $request->mapel_id;
    		$data->tipe_ujian_id = $request->tipe_ujian_id;
    		$data->siswa_id = $request->siswa_id[$i];
    		$data->nid = $request->nid[$i];
    		$data->nilai = $request->nilai[$i];
    		$data->save();


           }//End For loop
       }//End If

       $notification = array(
        'message' => 'Nilai Siswa Telah Di Rekap',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }
    public function store(Request $request)
    {
        $hitungsiswa = $request->siswa_id;
    	if ($hitungsiswa) {
    		for ($i=0; $i <count($request->siswa_id) ; $i++) {
    		$data = New EntryNilai();
    		$data->tahun_id = $request->tahun_id;
    		$data->kelas_id = $request->kelas_id;
    		$data->mapel_id = $request->mapel_id;
    		$data->tipe_ujian_id = $request->tipe_ujian_id;
    		$data->siswa_id = $request->siswa_id[$i];
    		$data->nid = $request->nid[$i];
    		$data->nilai = $request->nilai[$i];
    		$data->save();


           }//End For loop
       }//End If

       $notification = array(
        'message' => 'Nilai Siswa Telah Di Rekap',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    public function UbahNilai()
    {

        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();
        $data['tipe_ujian'] = TipeUjian::all();


        // return view('Entry.Nilai.entry_skrg',$data);
        return view('Entry.Nilai.ubah_skrg',$data);
    }

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



    public function update(Request $request, $id)
    {
        //
    }
    public function Updatenilai(Request $request)
    {
        EntryNilai::where('tahun_id',$request->tahun_id)->where('kelas_id',$request->kelas_id)->where('mapel_id',$request->mapel_id)->where('tipe_ujian_id',$request->tipe_ujian_id)->delete();
        $hitungsiswa = $request->siswa_id;
    	if ($hitungsiswa) {
    		for ($i=0; $i <count($request->siswa_id) ; $i++) {
    		$data = New EntryNilai();
    		$data->tahun_id = $request->tahun_id;
    		$data->kelas_id = $request->kelas_id;
    		$data->mapel_id = $request->mapel_id;
    		$data->tipe_ujian_id = $request->tipe_ujian_id;
    		$data->siswa_id = $request->siswa_id[$i];
    		$data->nid = $request->nid[$i];
    		$data->nilai = $request->nilai[$i];
    		$data->save();


           }//End For loop
       }//End If

       $notification = array(
        'message' => 'Berhasil Mengupdate Nilai Siswa ',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
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
