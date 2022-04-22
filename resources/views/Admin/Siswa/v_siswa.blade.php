@extends('master')
@section('title', 'Siswa')
@section('konten')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target=".bd-example-modal-lg"><i
                            class="fa fa-plus"></i> Tambah Siswa</a>
                    @include('Admin.Siswa.modal_add_siswa')
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <form method="GET" action="{{ route('siswa.filter') }}">
            <!-- Search Filter -->
            <div class="row filter-row">

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="tahun_id">
                            <option value=""> -- Select -- </option>
                            @foreach ($tahun as $thn)
                                <option value="{{ $thn->id }}" {{ @$tahun_id == $thn->id ? 'selected' : '' }}>
                                    {{ $thn->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tahun Ajaran</label>
                    </div>
                </div>
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
                    <input type="submit" class=" btn btn-success btn-block" name="search" value="Search">
                </div>
            </div>
            <!-- /Search Filter -->
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @if ('!@search')
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Tahun</th>
                                    <th>Kelas</th>
                                    <th>Foto</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['siswa']['name'] }}</td>
                                        <td>{{ $item['siswa']['nid'] }}</td>
                                        <td>{{ $item['tahun']['name'] }}</td>
                                        <td>{{ $item['kelas']['name'] }}</td>
                                        <td>
                                            <img id="showImage"
                                                src="{{ !empty($item['siswa']['image'])? url('upload/foto_siswa/' . $item['siswa']['image']): url('upload/wa1.jpg') }}"
                                                style="width: 60px; width:60px;">
                                        </td>

                                        <td class="text-left">
                                            <a href="" class="btn btn-default btn-lg"><i
                                                    class="la la-external-link-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Tahun</th>
                                    <th>Kelas</th>
                                    <th>Foto</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['siswa']['name'] }}</td>
                                        <td>{{ $item['siswa']['nid'] }}</td>
                                        <td>{{ $item['tahun']['name'] }}</td>
                                        <td>{{ $item['kelas']['name'] }}</td>
                                        <td>
                                            <img id="showImage"
                                                src="{{ !empty($item['siswa']['image'])? url('upload/foto_siswa/' . $item['siswa']['image']): url('upload/wa1.jpg') }}"
                                                style="width: 60px; width:60px;">
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="btn btn-info dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-list"></i>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
