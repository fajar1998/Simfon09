@extends('master')
@section('title', 'Grading Nilai')
@section('konten')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Grading Nilai</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Mapel</strong>
                        <button class="btn btn-info btn-rounded" style="float: right" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Tambah</button>
                        @include('Admin.GradingNilai.modal_add_grading')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Nama Grading</th>
                                        <th>Point Grading</th>
                                        <th>Start Nilai</th>
                                        <th>End Nilai</th>
                                        <th>Point Range</th>
                                        <th>Keterangan Nilai</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->grade_name }}</td>
                                            <td>{{ number_format((float) $value->grade_point, 2) }}</td>
                                            <td>{{ $value->start_marks }}</td>
                                            <td>{{ $value->end_marks }}</td>
                                            <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
                                            <td>{{ $value->remarks }}</td>
                                            <td>
                                                <a href="#" class="btn btn-default"><i class="fa fa-pencil"></i></a>

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
