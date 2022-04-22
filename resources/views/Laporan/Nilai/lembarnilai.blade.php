@extends('master')
@section('title', 'User')
@section('konten')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Nilai Siswa</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto" style="display: none">
                    <a href="#" class="btn add-btn"><i class="fa fa-plus"></i> Tambah Siswa</a>
                    @include('Admin.Siswa.modal_add_siswa')
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <form method="GET" action="{{ route('lprnilai.filter') }}">

            <!-- Search Filter -->
            <div class="row filter-row">

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="tahun_id" id="tahun_id">
                            @foreach ($tahun as $thn)
                                <option value="{{ $thn->id }}">{{ $thn->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tahun Ajaran</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="kelas_id" id="kelas_id">
                            @foreach ($kelas as $klas)
                                <option value="{{ $klas->id }}">{{ $klas->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Kelas</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="mapel_id" id="mapel_id">
                            @foreach ($mapel as $mpl)
                                <option value="{{ $mpl->id }}">{{ $mpl->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Mata Pelajaran</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="tipe_ujian_id" id="tipe_ujian_id">
                            @foreach ($tipe_ujian as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tipe Ujian</label>
                    </div>
                </div>




                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <input type="submit" class=" btn btn-success btn-block" name="search" value="Search">
                </div>

        </form>

    </div>
    <!-- /Search Filter -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    @if ('!@search')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa </th>
                                    <th width="5%">Kelas</th>
                                    <th width="8%">Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th width="5%">Keterangan</th>
                                    <th width="3%">Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nid }}</td>
                                        <td>{{ $item['siswa']['name'] }}</td>
                                        <td>{{ $item['kelas']['name'] }}</td>
                                        <td>{{ $item['mapel']['name'] }}</td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>
                                            @if ($item->nilai >= 90 && $item->nilai <= 100)
                                                <span class="badge badge-success">Lulus Terbaik</span>
                                            @elseif($item->nilai >= 80 && $item->nilai <= 89)
                                                <span class="badge badge-info"> Lulus</span>
                                            @elseif($item->nilai >= 60 && $item->nilai <= 79)
                                                <span class="badge badge-secondary"> Lulus Standar</span>
                                            @elseif($item->nilai >= 50 && $item->nilai <= 59)
                                                <span class="badge badge-danger"> Tidak Lulus</span>
                                            @elseif($item->nilai >= 0 && $item->nilai <= 49)
                                                <span class="badge badge-warning">Evaluasi</span>
                                            @endif
                                        </td>

                                        <td><a target="_blank" href="{{ route('lbrnilai.pdf', $item->id) }}"><i
                                                    class="fa fa-file-pdf-o"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa </th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Keterangssan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nid }}</td>
                                        <td>{{ $item['siswa']['name'] }}</td>
                                        <td>{{ $item['kelas']['name'] }}</td>
                                        <td>{{ $item['mapel']['name'] }}</td>
                                        <td>{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
