<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\EntryNilai;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\SiswaTempatan;
use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\TipeUjian;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class LprNilaiController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function LembarNilaiIndex()
    {
        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();
        $data['tipe_ujian'] = TipeUjian::all();
        $data['mapel'] = Mapel::all();

        $data['tahun_id'] = Tahun::orderBy('id','desc')->first()->id;
        $data['kelas_id'] = Kelas::orderBy('id','desc')->first()->id;
        $data['tipe_ujian_id'] = TipeUjian::orderBy('id','desc')->first()->id;
        $data['mapel_id'] = TipeUjian::orderBy('id','desc')->first()->id;

        $data['allData'] = EntryNilai::where('tahun_id',$data['tahun_id'])
        ->where('kelas_id', $data['kelas_id'])
        ->where('tipe_ujian_id', $data['tipe_ujian_id'])
        ->where('mapel_id', $data['mapel_id'])->get();

        return view('Laporan.Nilai.lembarnilai',$data);

    }

    public function Filter(Request $request)
    {
        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();
        $data['tipe_ujian'] = TipeUjian::all();
        $data['mapel'] = Mapel::all();

        $data['tahun_id'] = $request->tahun_id;
        $data['kelas_id'] = $request->kelas_id;
        $data['mapel_id'] = $request->mapel_id;
        $data['tipe_ujian_id'] = $request->tipe_ujian_id;

        $cekdata = EntryNilai::where('tipe_ujian_id',$request['tipe_ujian_id'])->where('kelas_id', $request['kelas_id'])-> where('tahun_id', $request['kelas_id'])->where('mapel_id', $request['mapel_id'])->get();


        if ($cekdata == true) {
        $data['allData'] = EntryNilai::where('tahun_id',$request['tahun_id'])->where('kelas_id', $request['kelas_id']) ->where('tipe_ujian_id', $request['tipe_ujian_id'])->where('mapel_id', $request['mapel_id'])->get();

        return view('Laporan.Nilai.lembarnilai',$data);
        }else {
            // dd($request->all());
        $notification = array(
            'message' => 'Data Tidak Ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
       }
    }

    public function PDF($id)
    {
        $show = EntryNilai::find($id);

    	$pdf = Pdf::loadview('Laporan.Nilai.pdf',compact('show'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function LembarNilaiPDF($id)
    {
        $show = EntryNilai::find($id);

    	$pdf = Pdf::loadview('Laporan.Nilai.lembarpdf',compact('show'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }



    public function NilaiGet($id)
    {
        $show = EntryNilai::find($id);

    	$pdf = Pdf::loadview('Laporan.Nilai.lembarpdf',compact('show'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('laporan_nilai.pdf');



    }//End Method
}
