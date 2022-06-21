<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\AbsenStaff;
use App\Models\User;
use Illuminate\Http\Request;

class AbsesStaffController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        // $data['allData'] = AbsenStaff::select('date')->groupBy('date')->orderBy('id','DESC')->get();
              $data['allData'] = AbsenStaff::orderBy('id','DESC')->get();

        $data['staff']= User::where('hak_akses','3')->get();
        return view('Admin.Absensi.Staff.v_staff_abs',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        AbsenStaff::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $hitungstaff = count($request->staff_id);
        for ($i=0; $i <$hitungstaff ; $i++) {
            $status_kehadiran = 'status_kehadiran'.$i;
            $kehadiran = new AbsenStaff();
            $kehadiran->date = date('Y-m-d',strtotime($request->date));
            $kehadiran->staff_id = $request->staff_id[$i];
            $kehadiran->status_kehadiran = $request->$status_kehadiran;
            $kehadiran->save();
        }//End For loop

        $notification = array(
         'message' => 'Berhasil Menambah Data Kehadiran Staff',
         'alert-type' => 'success'
     );

     return redirect()->route('absenstaff.index')->with($notification);
     }//End Method


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $data ['details'] = AbsenStaff::where('date',$date)->get();
        return view('Admin.Absensi.Staff.staff_show',$data);

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
