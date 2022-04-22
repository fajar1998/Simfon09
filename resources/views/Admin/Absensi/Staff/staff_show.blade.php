@extends('master')
@section('title', 'Absensi Staff')
@section('konten')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Detail Absensi Staff</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Absensi Staff</strong>
                        <!-- Button trigger modal -->
                        <a href="{{ url()->previous() }}" style="float: right" class="btn btn-primary">
                            Kembali
                        </a>
                        {{-- @include('Admin.Absensi.Staff.modal_entry_abs') --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tanggal</th>
                                        <th>Status Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $key => $item)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>{{ $item['user']['nid'] }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                            <td style="font-size:5px">
                                                @if ($item->status_kehadiran == 'Hadir')
                                                    <span class="btn btn-success" style="font-size:12px"> Hadir</span>
                                                @elseif($item->status_kehadiran == 'Tidak Hadir')
                                                    <span class="btn btn-danger" style="font-size:12px"> Tidak Hadir</span>
                                                @elseif($item->status_kehadiran == 'Izin')
                                                    <span class="btn btn-warning" style="font-size:12px"> Izin</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
