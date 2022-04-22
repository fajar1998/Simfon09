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
                        <li class="breadcrumb-item active"><a href="{{ route('absiswa.index') }}"> Absensi Siswa</a></li>
                        <li class="breadcrumb-item active">Detail Absensi Siswa
                            <strong>Kelas
                                {{ $details[0]['kelas']['name'] }}
                                Pada Hari
                                {{ \Carbon\Carbon::parse($details[0]->date)->isoFormat('dddd, D MMMM Y') }}</strong>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="card-header">

            <h4 class="card-title">Detail Absensi <strong>Kelas {{ $details[0]['kelas']['name'] }}
                    <br>
                    {{ \Carbon\Carbon::parse($details[0]->date)->isoFormat('dddd, D MMMM Y') }}</strong></h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Status Kehadiran</th>
                        <th>Di Entry Oleh</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($details as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value['user']['name'] }}</td>
                            <td>{{ $value['user']['nid'] }}</td>
                            <td>
                                @if ($value->status_kehadiran == 'Hadir')
                                    <span class="badge badge-success"> Hadir</span>
                                @elseif($value->status_kehadiran == 'Tidak Hadir')
                                    <span class="badge badge-danger"> Tidak Hadir</span>
                                @elseif($value->status_kehadiran == 'Izin')
                                    <span class="badge badge-info"> Izin</span>
                                @endif
                            </td>
                            <td>{{ $value->created_by }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
