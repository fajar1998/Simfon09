<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['jabatan'] = Jabatan::all();
        return view('Admin.Jabatan.v_jabatan',$data);
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
            'name' => 'required|unique:users',
        ]);
        $data = new Jabatan();
        $data->name = $request->name;
        $data->desk = $request->desk;
        $data->save();

        $notification = array(
            'message' => 'Jabatan Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('jabatan.index')->with($notification);
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
        $data = Jabatan::find($id);
        $data->name = $request->name;
        $data->desk = $request->desk;
        $data->save();

        $notification = array(
            'message' => 'Jabatan Di Update ',
            'alert-type' => 'success'
        );

        return redirect()->route('jabatan.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Jabatan::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Jabatan Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('jabatan.index')->with($notification);
    }
}
