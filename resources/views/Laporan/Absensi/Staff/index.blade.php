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

            </div>
        </div>
        <!-- /Page Header -->
        <form method="GET" action="{{ route('laporan.abs.get') }}">

            <!-- Search Filter -->
            <div class="row filter-row">


                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <input type="date" name="date" class="form-control" required id="datepicker">
                        <label class="focus-label">Tanggal</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="mapel_id" id="mapel_id">
                            @foreach ($staff as $stf)
                                <option value="{{ $stf->id }}">{{ $stf->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Staff</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <input type="submit" class=" btn btn-success btn-block" name="search" value="Search">
                </div>

        </form>

    </div>
    <!-- /Search Filter -->



    </div>


@endsection
