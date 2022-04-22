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
                        <li class="breadcrumb-item active">Absensi Staff</li>
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
                        <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                            Entry Absen
                        </button>
                        @include('Admin.Absensi.Staff.modal_entry_abs')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table mb-0 ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanngal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                    class="btn btn-default "><i class="fa fa-edit"></i></a>

                                                <a href="{{ route('absenstaff.show', $item->date) }}"
                                                    class="btn btn-default "><i class="fa fa-eye"></i></a>


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
