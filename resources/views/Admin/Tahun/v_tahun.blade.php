@extends('master')
@section('title', 'Tahun')
@section('konten')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tahun</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tahun</strong>
                        <button class="btn btn-info btn-rounded" style="float: right" data-toggle="modal"
                            data-target="#exampleModal">Tambah</button>
                        @include('Admin.Tahun.modal_add_tahun')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table mb-0 ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tahun Ajaran</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tahun as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                    class="btn btn-default "><i class="fa fa-edit"></i></a>
                                                @include('Admin.Tahun.modal_edit')
                                                <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                                    class="btn btn-default"><i class="fa fa-trash"></i></a>
                                                @include('Admin.Tahun.hapus')
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
