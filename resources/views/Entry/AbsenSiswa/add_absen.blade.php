@extends('master')
@section('title', 'Entry Nilai')
@section('konten')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Entry Nilai Siswa</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <form method="GET" action="{{ route('cabsen.wise') }}">
            <!-- Search Filter -->
            <div class="row filter-row">


                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="kelas_id">
                            <option value="" selected="" disabled="">Pilih Kelas</option>
                            @foreach ($kelas as $klas)
                                <option value="{{ $klas->id }}" {{ @$kelas_id == $klas->id ? 'selected' : '' }}>
                                    {{ $klas->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Kelas</label>
                    </div>
                </div>





                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <input type="submit" class="btn btn-primary btn-block" name="search" value="Cari">
                </div>
        </form>

    </div>
    <!-- /Search Filter -->



    <table class="table table-bordered">

        <form method="POST" action={{ route('absiswa.store') }}>
            @csrf

            <thead>
                <tr>
                    <th rowspan="2" width="3%">#</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Daftar</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Kelas</th>
                    <th colspan="3" class="text-center" style="vertical-align: middle; width:30%">Status</th>
                </tr>
                <th class="text-center btn hadir_all" style="display:table-cell; background-color: #00ec62">Hadir</th>
                <th class="text-center btn Thadir_all" style="display:table-cell; background-color: #009fe9">Tidak Hadir
                </th>
                <th class="text-center btn izin_all" style="display:table-cell; background-color: #fc0606">Izin</th>
            </thead>
            <tbody>
                @foreach ($allData as $key => $value)
                    <tr id="div{{ $value->id }}" class="text-center">
                        <input type="hidden" name="siswa_id[]" value="{{ $value->id }}">
                        <input type="hidden" name="kelas_id[]" value="{{ $value->kelas_id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value['kelas']['name'] }}</td>

                        <td colspan="3">
                            <div class="switch-toggle switch-3 switch-candy" class="text-center">

                                <input required name="status_kehadiran{{ $key }}" type="radio" value="Hadir"
                                    id="hadir{{ $key }}" checked="checked">
                                <label for="hadir{{ $key }}">Hadir</label>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;

                                <input required name="status_kehadiran{{ $key }}" type="radio" value="Tidak Hadir"
                                    id="thadir{{ $key }}">
                                <label for="thadir{{ $key }}">Tidak Hadir</label>

                                &nbsp;
                                &nbsp;
                                &nbsp;

                                <input name="status_kehadiran{{ $key }}" type="radio" value="Izin"
                                    id="izin{{ $key }}">
                                <label for="izin{{ $key }}">Izin</label>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

    </table>
    </div>
    <div class="col-md-6 text-xs-left d-inline" style="float: right;">
        <div class="form-group ">

            <div class="controls">
                <h5>Tanggal Absensi <span class="text-danger">*</span></h5>
                <input type="date" name="date" class="form-control  @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-xs-left d-inline" style="float: right;">
            <button type="submit" class="btn btn-outline btn-danger mb-5"><i class="bx bxs-spreadsheet">
                </i>&nbsp;Entry</button>
        </div>
    </div>

    </div>




@endsection
