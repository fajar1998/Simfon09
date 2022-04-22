<div class="sidebar" id="menuhp">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}"><i class="la la-home"></i> <span>Beranda</span></a>
                </li>

                <li class="menu-title">
                    <span>Admin</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-cube"></i> <span> Manajemen</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.index') }}">Pengguna</a></li>
                        <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
                        <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                        <li><a href="{{ route('tahun.index') }}">Tahun Ajaran</a></li>
                        <li><a href="{{ route('mapel.index') }}">Mata Pelajaran</a></li>
                        <li><a href="{{ route('tp-ujian.index') }}">Tipe Ujian</a></li>
                        <li><a href="{{ route('nilaimin.index') }}">Nilai Minimal</a></li>

                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Video Call</a></li>
                                <li><a href="#">Outgoing Call</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="la la-cube"></i> <span>Nilai</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Nilai Minimal</a></li>
                        <li><a href="#">Tipe Nilai</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('staff.index') }}"><i class="la la-user"></i> <span>Data Guru</span></a>
                </li>

                <li>
                    <a href="{{ route('siswa.index') }}"><i class="la la-users"></i> <span>Data Siswa</span></a>
                </li>







                <li class="menu-title">
                    <span>Extra</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-building"></i> <span> Inventori</span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Kategori</a></li>
                        <li><a href="#">Barang Masuk</a></li>
                        <li><a href="#">Barang Keluar</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-file"></i> <span> File Manajemen</span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Dokumen Umum</a></li>
                        <li><a href="#">Dokumen Pribadi</a></li>
                        <li><a href="#">Surat Keluar</a></li>
                        <li><a href="#">Surat Masuk</a></li>

                    </ul>
                </li>

                <li>
                    <a href="#"><i class="la la-calendar"></i> <span>Kalender Akademik</span></a>
                </li>
                <li>
                    <a href="#"><i class="la la-calendar"></i> <span>Test Hp</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
