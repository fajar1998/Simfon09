<?php

use App\Http\Controllers\Admin\GradingNilaiController;
use App\Http\Controllers\Admin\InventController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\NilaiMinController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\TipeUjianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Entry\EntriAbsenSiswa;
use App\Http\Controllers\Entry\EntryNilaiController;
use App\Http\Controllers\FullKalenderController;
use App\Http\Controllers\InventKmController;
use App\Http\Controllers\Laporan\LprAbstaffController;
use App\Http\Controllers\Laporan\LprNilaiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SecretUrlController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\Staff\AbsesStaffController;
use App\Http\Controllers\Staff\StaffController;
use App\Models\AbsenSiswa;
use App\Models\Mapel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profil/index', [ProfilController::class, 'Index'])->name('profil.view');
Route::post('/store', [ProfilController::class, 'Store'])->name('profil.store');
Route::post('/sandi/update', [ProfilController::class, 'PasswordUpdate'])->name('sandi.update');



Route::group(['middleware' => ['admin','operator']],function(){
// Route::middleware(['admin','operator'])->group(function(){



Route::resource('user',UserController::class);
Route::resource('jabatan',JabatanController::class);
Route::resource('kelas',KelasController::class);
Route::resource('tahun',TahunController::class);

Route::resource('siswa',SiswaController::class);
Route::get('/filter-siswa', [SiswaController::class, 'Filter'])->name('siswa.filter');

Route::resource('mapel',MapelController::class);
Route::resource('tp-ujian',TipeUjianController::class);
Route::resource('nilaimin',NilaiMinController::class);
Route::get('nilaimin/edit/{kelas_id}', [NilaiMinController::class, 'nilaiEdit'])->name('nilai.edit');

Route::resource('staff',StaffController::class);
Route::resource('absenstaff',AbsesStaffController::class);


Route::resource('entnilai',EntryNilaiController::class);
Route::get('entnilai/isi', [EntryNilaiController::class, 'NilaiStore'])->name('nilai.entry.store');
Route::get('entnilai/isi/ubah', [EntryNilaiController::class, 'UbahNilai'])->name('entnilai.ubah');
Route::post('entnilai/isi/update', [EntryNilaiController::class, 'UpdateNilai'])->name('entnilai.perbarui');
Route::get('nilai/getsiswa/edit', [EntryNilaiController::class, 'MarksEditGetSiswa'])->name('siswa.edit.getsiswa');



Route::get('nilai/getmapel', [DefaultController::class, 'GetMapel'])->name('entrynilai.dapatmapel');
Route::get('nilai/getsiswa', [DefaultController::class, 'GetSiswa'])->name('entrynilai.getsiswa');
Route::get('barang/getharga', [DefaultController::class, 'GetHarga'])->name('harga.getharga');

Route::get('lprnilai/index', [LprNilaiController::class, 'Index'])->name('lprnilai.index');
Route::get('/nilai/pdf/{id}', [LprNilaiController::class, 'PDF'])->name('lprnilai.pdf');
Route::get('lprnilai/filter-nilai', [LprNilaiController::class, 'Filter'])->name('lprnilai.filter');
Route::get('/lembarnilai/pdf/{id}', [LprNilaiController::class, 'LembarNilaiPDF'])->name('lbrnilai.pdf');



Route::get('lembar/nilai', [LprNilaiController::class, 'LembarNilaiIndex'])->name('lembar.nilai');
// Route::get('/lembar/nilai/filter', [LprNilaiController::class, 'NilaiGet'])->name('lembarnilai.filter');



Route::resource('absiswa',EntriAbsenSiswa::class);
Route::get('/wiseabsen', [EntriAbsenSiswa::class, 'SiswaAbsenWise'])->name('absen.wise');
Route::get('/wisecreate', [EntriAbsenSiswa::class, 'WiseCreate'])->name('cabsen.wise');


Route::resource('ruangan',RuanganController::class);
Route::resource('invent',InventController::class);
Route::post('barangmasuk',[InventController::class,'BarangMasukStore'])->name('brg.masuk');
Route::post('barangkeluar',[InventController::class,'BarangKeluarStore'])->name('brg.keluar');

Route::resource('graden',GradingNilaiController::class);

Route::get('brgmsk/index', [InventKmController::class, 'BarangMasukIndex'])->name('brgmsk.index');

Route::get('laporan/index', [LprAbstaffController::class, 'LaporanKehadiranView'])->name('laporan.abs.view');
Route::get('laporan/get', [LprAbstaffController::class, 'LaporanKehadiranGet'])->name('laporan.abs.get');




});// End Midleware Admin

});// End Prevent-Back


Route::get('11213106/fajar', [SecretUrlController::class, 'Get'])->name('gass.index');





