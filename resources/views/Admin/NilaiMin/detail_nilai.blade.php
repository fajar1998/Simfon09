@extends('master')
@section('title', 'Detail Nilai Minimal')
@section('konten')


    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>{{ $showdata[0]['kelas']['name'] }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">
                <strong>{{ $showdata[0]['kelas']['name'] }}</strong>
                <a href="{{ url()->previous() }}" class="btn btn-info" style="float: right;"><i
                        class="fa fa-arrow-left"></i></a>
            </h5>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai Tertinggi</th>
                            <th>Nilai Pas</th>
                            <th>Nilai Subjektif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($showdata as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['mapel']['name'] }}</td>
                                <td>{{ $item->full_mark }}</td>
                                <td>{{ $item->pass_mark }}</td>
                                <td>{{ $item->subjektif_mark }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


















    </div>

@endsection
