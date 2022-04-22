@extends('master')
@section('title', 'Entry Nilai')
@section('konten')
    <style type="text/css">
        thead,
        tr {
            text-align: left;
        }

        .open {
            color: white;
            background-color: red;
        }

        .close {
            color: white;
            background-color: black;
        }

    </style>
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Entry Absen Siswa</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <form method="GET" action="{{ route('absen.wise') }}">
            <!-- Search Filter -->
            <div class="row filter-row">

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <input type="date" class="form-control" name="date">
                        <label class="  focus-label">Tanggal</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="kelas_id">
                            <option value="" disabled="">Pilih Kelas</option>
                            @foreach ($kelas as $klas)
                                <option value="{{ $klas->id }}" {{ @$kelas_id == $klas->id ? 'selected' : '' }}>
                                    {{ $klas->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Kelas</label>
                    </div>
                </div>



                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <input type="submit" class="btn btn-primary btn-block" name="search" value="Cari">
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <a title="Tambah absen" href="{{ route('absiswa.create') }}" class="btn btn-info"><i
                            class=" bx
                        bxs-calendar-plus"></i>
                        Entry Absen</a>
                </div>
        </form>
    </div>
    <!-- /Search Filter -->
    <div class="table-responsive">

        <table class="table">
            <thead>
                {{-- {{ $allData->links() }} --}}
                <tr class="text-center">
                    <th width="3%">#</th>
                    <th width="3%">Kelas</th>
                    <th width="3%">Tanggal</th>
                    <th width="3%">oleh</th>
                    <th width="20%">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allData as $key => $item)
                    <tr id="div{{ $item->id }}" class="text-center">
                        <td>{{ $key + 1 }}</td>
                        <td width="3%">Kelas {{ $item['kelas']['name'] }}</td>
                        <td width="15%">
                            {{ \Carbon\Carbon::parse($item->date)->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>{{ $item->created_by }}</td>
                        <td>

                            <a href="{{ route('absiswa.show', $item->date) }}" title="Lihat Detail"
                                class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5" bgcolor="orange">
                            <h1>Data Tidak Ada</h1>
                        </td>
                    </tr> =
                @endforelse

            </tbody>
        </table>
    </div>


    </div>

@endsection
