<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['ruang'] = Ruangan::all();
        return view('Admin.Ruangan.v_ruang',$data);
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
            'name' => 'required|unique:ruangans',
        ]);
        $data = new Ruangan();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Ruangan Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('ruangan.index')->with($notification);
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
        $data = Ruangan::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Ruangan Di Update ',
            'alert-type' => 'success'
        );

        return redirect()->route('ruangan.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Ruangan::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Ruangan Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('ruangan.index')->with($notification);
    }
}
