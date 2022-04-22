<?php

namespace App\Http\Controllers;

use App\DataTables\BarangMasukDataTable;
use App\Models\AbsenSiswa;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\UsersDataTable;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['to_user'] = User::where('hak_akses','1')->orwhere('hak_akses','2')->count();
        $data['to_kelas'] = Kelas::count();
        $data['to_guru'] = User::where('hak_akses','3')->count();
        $data['to_siswa_laki'] = User::where('hak_akses','4')->where('jenkel','Laki-Laki')->count();
        $data['to_siswa_perempuan'] = User::where('hak_akses','4')->where('jenkel','Perempuan')->count();
        $data['ttlabsiswa'] = AbsenSiswa::where('status_kehadiran','Hadir')->whereDate('date', Carbon::today())->count();






        return view('home',$data);
    }


}
