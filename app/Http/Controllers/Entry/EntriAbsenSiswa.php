<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Models\AbsenSiswa;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntriAbsenSiswa extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['today'] = Carbon::now()->isoFormat(' dddd, D MMMM Y H:I A ');
        $data['allData'] = AbsenSiswa::paginate(1);
        $data['kelas'] = Kelas::all();
        return view('Entry.AbsenSiswa.v_absen',$data);
    }


   public function SiswaAbsenWise(Request $request)
   {
    $data['kelas'] = Kelas::all();

    $data['kelas_id'] = $request->kelas_id;
    $data['date'] = $request->date;
    $check_data = AbsenSiswa::where('kelas_id', $request['kelas_id'])->where('date', $request['date'])->first();
    if ($check_data == true) {
    $data['allData'] = AbsenSiswa::where('kelas_id', $request['kelas_id'])->where('date', $request['date'])->groupBy('kelas_id')->get();
    return view('Entry.AbsenSiswa.v_absen',$data);
}else {
    $notification = array(
        'message' => 'Data Tidak Di Temukan',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);

    }
   }
   public function WiseCreate(Request $request)
   {
       $data['kelas'] = Kelas::all();
       $data['kelas_id'] = $request->kelas_id;
       $data['allData'] = User::where('hak_akses',4,$request['kelas_id'])->where
       ('kelas_id', $request['kelas_id'])->get();
       return view('Entry.AbsenSiswa.add_absen',$data);
   }

    public function create()
    {
        $data['date'] = AbsenSiswa::all();
        $data['kelas'] = Kelas::all();
        $data['allData'] = User::where('hak_akses',4);
        return view('Entry.AbsenSiswa.add_absen',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hitsiswa = count($request->siswa_id);
        for ($i=0; $i <$hitsiswa ; $i++) {
            $status_kehadiran = 'status_kehadiran'.$i;
            $kehadiran = new AbsenSiswa();
            $kehadiran->date = date('Y-m-d',strtotime($request->date));
            $kehadiran->siswa_id = $request->siswa_id[$i];
            $kehadiran->kelas_id = $request->kelas_id[$i];
            $kehadiran->status_kehadiran = $request->$status_kehadiran;
            $kehadiran['created_by'] = Auth::user()->name;

            $kehadiran->save();
        }//End For loop

        $notification = array(
         'message' => 'Berhasil Memperbarui Absensi Siswa',
         'alert-type' => 'info'
     );
     return redirect()->route('absiswa.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $data['kelas'] = Kelas::find($id);
        // $data['details'] = AbsenSiswa::whereIn('date',$id)->get();
        $data['details'] = AbsenSiswa::whereIn('id',[0])->get();



        return view('Entry.AbsenSiswa.show_absen',$data);
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
