<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
      public function __construct()
    {
     $this->middleware('auth');
    }
    public function Index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('Profil.v_profil',compact('user'));
    }

    public function Store(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->jenkel = $request->jenkel;
        $data->dob = $request->dob;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/foto_user/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/foto_user'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Data Pribadi Di Update',
            'alert-type' => 'info'
        );

        return redirect()->route('profil.view')->with($notification);
    } //End Method

    public function PasswordUpdate(Request $request)
    {

           $request->user()->fill([
            'password' => Hash::make($request->password)
           ])->save();
           Auth::logout();
           $notification = array(
            'message' => 'Password Anda Telah Diubah Silahkan Login Ulang',
            'alert-type' => 'error'
        );
           return redirect()->route('login')->with($notification);

    }
}
