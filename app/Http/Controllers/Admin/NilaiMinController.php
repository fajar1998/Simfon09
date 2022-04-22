<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\NilaiMin;
use Illuminate\Http\Request;

class NilaiMinController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['semua'] = NilaiMin::select('kelas_id')->groupBy('kelas_id')->get();
        return view('Admin.NilaiMin.v_nilai',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mapel'] = Mapel::all();
        $data['kelas'] = Kelas::all();
        return view('Admin.NilaiMin.add_nilai',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hitungnilai = count($request->mapel_id);
        if ($hitungnilai != NULL) {
            for ($i = 0; $i < $hitungnilai; $i++) {
                $nilaimin = new NilaiMin();
                $nilaimin->kelas_id = $request->kelas_id;
                $nilaimin->mapel_id = $request->mapel_id[$i];
                $nilaimin->full_mark = $request->full_mark[$i];
                $nilaimin->pass_mark = $request->pass_mark[$i];
                $nilaimin->subjektif_mark = $request->subjektif_mark[$i];
                $nilaimin->save();
            }
            //    end for loop
        }
        // end condition

        $notification = array(
            'message' => 'Nilai Minimal Telah Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('nilaimin.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas_id)
    {
        $data['showdata'] = NilaiMin::where('kelas_id',$kelas_id)
        ->orderBy('mapel_id','asc')->get();

        return view('Admin.NilaiMin.detail_nilai',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    public function nilaiEdit($kelas_id)
    {

        $data['editData'] = NilaiMin::where('kelas_id',$kelas_id)
        ->orderBy('mapel_id','asc')->get();
     //    dd($data['editData']->toArray());
     $data['mapel'] = Mapel::all();
     $data['kelas'] = Kelas::all();
     return view('Admin.NilaiMin.edit_nilai',$data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelas_id)
    {
        if ($request->mapel_id == NULL) {
            $notification = array(
                'message' => ' Maaf Anda Tidak Memilih Mata Pelajaran Apapun ',
                'alert-type' => 'error'
            );

            return redirect()->route('nilaimin.edit',$kelas_id)->with($notification);

        }else{
            $hitungnilai = count($request->mapel_id);
            NilaiMin::where('kelas_id',$kelas_id)->delete();
                for ($i = 0; $i < $hitungnilai; $i++) {
                    $nilai = new NilaiMin();
                    $nilai->kelas_id = $request->kelas_id;
                    $nilai->mapel_id = $request->mapel_id[$i];
                    $nilai->full_mark = $request->full_mark[$i];
                    $nilai->pass_mark = $request->pass_mark[$i];
                    $nilai->subjektif_mark = $request->subjektif_mark[$i];
                    $nilai->save();
                }
                //    end for loop
            }
            $notification = array(
                'message' => ' Nilai Minimal Berhasil Di Update ',
                'alert-type' => 'success'
            );

            return redirect()->route('nilaimin.index')->with($notification);
        }
        // end Method


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
