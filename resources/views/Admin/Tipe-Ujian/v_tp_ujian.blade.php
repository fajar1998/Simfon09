@extends('master')
@section('title', 'Tipe Ujian')
@section('konten')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tipe Ujian</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tipe Ujian</strong>
                        <button class="btn btn-info btn-rounded" style="float: right" data-toggle="modal"
                            data-target="#exampleModal">Tambah</button>
                        @include('Admin.Tipe-Ujian.modal_add_tp_ujian')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ujian </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tp_ujian as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                    class="btn btn-default "><i class="fa fa-edit"></i></a>
                                                @include('Admin.Tipe-Ujian.modal_edit')
                                                <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                                    class="btn btn-default"><i class="fa fa-trash"></i></a>
                                                @include('Admin.Tipe-Ujian.hapus')
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
