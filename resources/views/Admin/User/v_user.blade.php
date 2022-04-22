@extends('master')
@section('title', 'User')
@section('konten')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Jabatan</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pengguna</strong>
                                <!-- Button trigger modal -->

                                <button class="btn btn-info btn-rounded" style="float: right" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Tambah</button>
                                @include('Admin.User.modal_add_user')
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="10%">Nama</th>
                                            <th width="10%">NIP</th>
                                            <th width="15%">Hak Akses</th>
                                            @if (auth()->user()->hak_akses == 1)
                                                <th width="20%"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nid }}</td>
                                                <td>
                                                    @if ($item->hak_akses == '1')
                                                        <span class="badge badge-info"> Admin</span>
                                                    @elseif($item->hak_akses == '2')
                                                        <span class="badge badge-success"> Operator</span>
                                                    @elseif($item->hak_akses == '3')
                                                        <span class="badge badge-danger"> Guru</span>
                                                    @elseif($item->hak_akses == '4')
                                                        <span class="badge badge-secondary"> Siswa</span>
                                                    @endif
                                                </td>
                                                @if (auth()->user()->hak_akses == 1)
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#Edit{{ $item->id }}"
                                                            class="btn btn-default "><i class="fa fa-edit"></i></a>
                                                        @include('Admin.User.modal_edit')
                                                        <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                                            class="btn btn-default"><i class="fa fa-trash"></i></a>
                                                        @include('Admin.User.hapus')
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>




            </div>
        </div><!-- .animated -->
    </div>
@endsection
