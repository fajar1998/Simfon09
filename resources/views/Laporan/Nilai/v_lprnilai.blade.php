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
        <form method="GET" action="#" target="_blank">
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
                        <select class="select floating form-control" name="tipe_ujian_id" id="tipe_ujian_id">
                            @foreach ($tipe_ujian as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tipe Ujian</label>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <input type="submit" class=" btn btn-success btn-block" value="Cari">
                </div>



            </div>
            <!-- /Search Filter -->
            <div class="row d-none" id="marks-entry">
            </div>
        </form>

    @endsection
