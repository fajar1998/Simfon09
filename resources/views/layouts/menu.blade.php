<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}"><i class="la la-home"></i> <span>Beranda</span></a>
                </li>



                <li class="submenu">
                    <a href="#"><i class="la la-database"></i> <span> Manajemen</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.index') }}">Pengguna</a></li>
                        <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
                        <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                        <li><a href="{{ route('tahun.index') }}">Tahun Ajaran</a></li>
                        <li><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
                        <li><a href="{{ route('tp-ujian.index') }}">Tipe Ujian</a></li>
                        <li><a href="{{ route('nilaimin.index') }}">Nilai Minimal</a></li>
                        <li><a href="{{ route('staff.index') }}">Data Guru</a>
                        <li><a href="{{ route('ruangan.index') }}">Ruangan</a>
                        <li><a href="{{ route('graden.index') }}">Grading Nilai</a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Video Call</a></li>
                                <li><a href="#">Outgoing Call</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>






                <li>
                    <a href="{{ route('siswa.index') }}"><i class="la la-users"></i> <span>Data Siswa</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><i class="la la-archive"></i> <span> Absensi</span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @if (auth()->user()->hak_akses == 1)
                            <li><a href="{{ route('absenstaff.index') }}">Staff</a></li>
                        @endif
                        <li><a href="{{ route('absiswa.index') }}">Siswa</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('entnilai.index') }}"><i class="la la-bookmark-o"></i> <span>Entry
                            Nilai</span></a>
                </li>

                <li>
                    <a href="{{ route('entnilai.ubah') }}"><i class="la la-edit"></i> <span>Ubah
                            Nilai</span></a>
                </li>


                @if (auth()->user()->hak_akses == 1)
                    <li>
                        <a href="{{ route('invent.index') }}"><i class="la la-building"></i> <span>
                                Inventori</span></a>
                    </li>





                    <li class="submenu">
                        <a href="#"><i class="la la-file"></i> <span>Laporan</span>
                            <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a href="{{ route('lembar.nilai') }}"><span> Nilai</span> </a>
                            </li>

                            <li class="submenu">
                                <a href="#"><span> Absensi</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('laporan.abs.view') }}">Staff</a></li>
                                </ul>
                            </li>


                            <li class="submenu">
                                <a href="#"><span> Inventori</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('brgmsk.index') }}">Barang Masuk</a></li>
                                    <li><a href="#">Barang Keluar</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif

<li>
                    <a href="#"><i class="la la-book"></i> <span>
                            Raport(Segera)</span></a>
                </li>
                <li>
                    <a href="#"><i class="la la-book"></i> <span>
                            Dokumentasi(Segera)</span></a>
                </li>





        </div>
    </div>
</div>
