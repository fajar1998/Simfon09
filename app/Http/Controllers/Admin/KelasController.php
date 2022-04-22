<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{  public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['kelas'] = Kelas::all();
        return view('Admin.Kelas.v_kelas',$data);
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
            'name' => 'required|unique:kelas',
        ]);
        $data = new Kelas();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Kelas Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('kelas.index')->with($notification);
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
        $data = Kelas::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Kelas Di Update ',
            'alert-type' => 'success'
        );

        return redirect()->route('kelas.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Kelas::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Kelas Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('kelas.index')->with($notification);
    }
}
