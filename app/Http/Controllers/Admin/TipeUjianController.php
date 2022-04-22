<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeUjian;
use Illuminate\Http\Request;

class TipeUjianController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['tp_ujian'] = TipeUjian::all();
        return view('Admin.Tipe-Ujian.v_tp_ujian',$data);
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
        $validateData = $request->validate([
            'name' => 'required|unique:tipe_ujians',
        ]);
        $data = new TipeUjian();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Tipe Ujian  Baru Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('tp-ujian.index')->with($notification);
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
        $data = TipeUjian::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Tipe Ujian  Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('tp-ujian.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = TipeUjian::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Tipe Ujian  Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('tp-ujian.index')->with($notification);
    }
}
