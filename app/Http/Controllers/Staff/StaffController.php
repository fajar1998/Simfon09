<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['staff'] = User::where('hak_akses','3')->get();
        $data['jabatan'] = Jabatan::all();
        return view('Admin.Staff.v_staff',$data);
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

            $user = new User();
            $sandi = $request->dob;
            $user->password = bcrypt($sandi);
            $user->hak_akses = '3';
            $user->name = $request->name;
            $user->nid = $request->nid;
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;
            $user->jenkel = $request->jenkel;
            $user->agama = $request->agama;
            $user->gaji = $request->gaji;
            $user->jabatan_id = $request->jabatan_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/foto_staff'), $filename);
                $user['image'] = $filename;
            }
                $user->save();

            $notification = array(
                'message' => 'Berhasil Menambah Staff Baru',
                'alert-type' => 'success'
            );

            return redirect()->route('staff.index')->with($notification);
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
