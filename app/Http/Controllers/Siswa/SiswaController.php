<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\SiswaTempatan;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();

        $data['tahun_id'] = Tahun::orderBy('id','desc')->first()->id;
        $data['kelas_id'] = Kelas::orderBy('id','desc')->first()->id;

        $data['allData'] = SiswaTempatan::where('tahun_id',$data['tahun_id'])->where('kelas_id', $data['kelas_id'])->get();

        return view('Admin.Siswa.v_siswa',$data);

    }

    public function Filter(Request $request)
    {
        $data['tahun'] = Tahun::all();
        $data['kelas'] = Kelas::all();



        $data['tahun_id'] = $request->tahun_id;
        $data['kelas_id'] = $request->kelas_id;

        $cekdata = SiswaTempatan::where('tahun_id',$request['tahun_id'])->where('kelas_id', $request['kelas_id'])->first();

        if ($cekdata == true) {
        $data['allData'] = SiswaTempatan::where('tahun_id',$request['tahun_id'])->where('kelas_id', $request['kelas_id'])->get();
        return view('Admin.Siswa.v_siswa',$data);


        }else {
        $notification = array(
            'message' => 'Data Tidak Ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
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
            $user = new User();
            $sandi = $request->dob;
            $user->password = bcrypt($sandi);
            $user->hak_akses = '4';
            $user->name = $request->name;
            $user->nid = $request->nid;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;
            $user->jenkel = $request->jenkel;
            $user->agama = $request->agama;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->kelas_id = $request->kelas_id;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/foto_siswa'), $filename);
                $user['image'] = $filename;
            }
                $user->save();

                $siswa_tetap = new SiswaTempatan();
                $siswa_tetap->siswa_id = $user->id;
                $siswa_tetap->tahun_id = $request->tahun_id;
                $siswa_tetap->kelas_id = $request->kelas_id;
                $siswa_tetap->save();

            $notification = array(
                'message' => 'Berhasil Menambah Siswa Baru',
                'alert-type' => 'success'
            );

            return redirect()->route('siswa.index')->with($notification);
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
        //
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
