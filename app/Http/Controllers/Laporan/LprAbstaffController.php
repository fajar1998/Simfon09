<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AbsenStaff;
use App\Models\User;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class LprAbstaffController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function LaporanKehadiranView()
    {
        $data['staff'] = User::where('hak_akses','3')->get();
        return view('Laporan.Absensi.Staff.index',$data);
    }

    public function LaporanKehadiranGet(Request $request)
    {
       $staff_id = $request->staff_id;
       if ($staff_id !='') {
           $where[] = ['staff_id',$staff_id];
       }//End If 1
       $date = date('Y-m',strtotime($request->date));
       if ($date !='') {
          $where[] = ['date','like',$date.'%'];
       }//End If 2


       $kehadirantunngal = AbsenStaff::with(['user'])->where($where)->get();

       if ($kehadirantunngal == true) {
           $data['show'] = AbsenStaff::with(['user'])->where($where)->get();
        //    dd($data['allData']->toArray());
        $data['hadir'] = AbsenStaff::with(['user'])->where($where)->where('status_kehadiran','Hadir')->get()->count();
        $data['alfa'] = AbsenStaff::with(['user'])->where($where)->where('status_kehadiran','Tidak hadir')->get()->count();
        $data['izin'] = AbsenStaff::with(['user'])->where($where)->where('status_kehadiran','Izin')->get()->count();

        $data['bulan'] = date('m-Y',strtotime($request->date));

        $pdf = Pdf::loadview('Laporan.Absensi.Staff.abstaffpdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

       }else {
        $notification = array(
            'message' => 'Maaf Kriteria Ini Tidak Cocok',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
       }


    }//End MEthod
}
