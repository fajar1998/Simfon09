<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
       $data['user'] = User::where('hak_akses','1')->orwhere('hak_akses','2')->get();
       return view('Admin.User.v_user',$data);
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
            'nid' => 'required|unique:users',
            'name' => 'required',
        ]);
        $data = new User();
        $sandi = $request->dob;
        $data->hak_akses = $request->hak_akses;
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->nid = $request->nid;
        $data->dob = $request->dob;
        $data->join_date = $request->join_date;
        $data->password = bcrypt($sandi);
        $data->save();

        $notification = array(
            'message' => 'Pengguna Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
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
        $data = User::find($id);
        $data->hak_akses = $request->hak_akses;
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->nid = $request->nid;
        $data->dob = $request->dob;
        $data->join_date = $request->join_date;
        $data->save();

        $notification = array(
            'message' => 'Pengguna Di Update ',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Pengguna Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('user.index')->with($notification);
    }
}
