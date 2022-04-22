@extends('master')
@section('title', 'Nilai Minimal')
@section('konten')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Minimal</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Nilai Minimal</strong>
                        <a href="{{ route('nilaimin.create') }}" class="btn btn-info btn-rounded"
                            style="float: right">Tambah</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table mb-0 ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Nilai Minimal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semua as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['kelas']['name'] }}</td>
                                            <td>
                                                <a href="{{ route('nilaimin.show', $item->kelas_id) }}"
                                                    class="btn btn-default "><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('nilai.edit', $item->kelas_id) }}"
                                                    class="btn btn-default"><i class="fa fa-pencil"></i></a>

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
