<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['mapel'] = Mapel::all();
        return view('Admin.Mapel.v_mapel',$data);
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
            'name' => 'required|unique:mapels',
        ]);
        $data = new Mapel();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Mata Pelajaran Baru Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notification);
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
        $data = Mapel::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Mata Pelajaran Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Mapel::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Mata Pelajaran Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('mapel.index')->with($notification);
    }
}
