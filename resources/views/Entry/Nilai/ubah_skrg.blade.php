@extends('master')
@section('title', 'Ubah Nilai')
@section('konten')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Nilai Siswa</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <form method="POST" action="{{ route('entnilai.perbarui') }}">
            @csrf
            <!-- Search Filter -->
            <div class="row filter-row">

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="tahun_id" id="tahun_id">
                            <option value="" disabled> -- Pilih Tahun Ajaran -- </option>
                            @foreach ($tahun as $thn)
                                <option value="{{ $thn->id }}" {{ @$tahun_id == $thn->id ? 'selected' : '' }}>
                                    {{ $thn->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tahun Ajaran</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="kelas_id" id="kelas_id">
                            <option value="" selected="" disabled="">Pilih Kelas</option>
                            @foreach ($kelas as $klas)
                                <option value="{{ $klas->id }}" {{ @$kelas_id == $klas->id ? 'selected' : '' }}>
                                    {{ $klas->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Kelas</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" name="mapel_id" id="mapel_id">
                            <option value="" selected="" disabled="">Pilih Mata Pelajaran

                        </select>
                        <label class="focus-label">Mata Pelajaran</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating form-control" id="tipe_ujian_id" name="tipe_ujian_id">
                            <option value="" selected="" disabled="">Pilih Tipe</option>
                            @foreach ($tipe_ujian as $tipe)
                                <option value="{{ $tipe->id }}" {{ @$kelas_id == $tipe->id ? 'selected' : '' }}>
                                    {{ $tipe->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Tipe Ujian</label>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <a id="search" class="btn btn-primary" name="search">Cari</a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row d-none" id="marks-entry">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Nama Ayah</th>
                                <th>Jenis Kelamin</th>
                                <th>Input Nilai Disini</th>
                            </tr>
                        </thead>
                        <tbody id="marks-entry-tr">

                        </tbody>

                    </table>
                    <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                </div>

        </form>


        <script type="text/javascript">
            $(document).on('click', '#search', function() {
                var tahun_id = $('#tahun_id').val();
                var kelas_id = $('#kelas_id').val();
                var mapel_id = $('#mapel_id').val();
                var tipe_ujian_id = $('#tipe_ujian_id').val();
                $.ajax({
                    url: "{{ route('siswa.edit.getsiswa') }}",
                    type: "GET",
                    data: {
                        'tahun_id': tahun_id,
                        'kelas_id': kelas_id,
                        'mapel_id': mapel_id,
                        'tipe_ujian_id': tipe_ujian_id
                    },
                    success: function(data) {
                        $('#marks-entry').removeClass('d-none');
                        var html = '';
                        $.each(data, function(key, v) {
                            html +=
                                '<tr class="text-center">' +
                                '<td>' + v.siswa.nid +
                                '<input type="hidden" name="siswa_id[]" value="' + v.siswa_id +
                                '"> <input type="hidden" name="nid[]" value="' + v.siswa.nid +
                                '"> </td>' +
                                '<td>' + v.siswa.name + '</td>' +
                                '<td>' + v.siswa.fname + '</td>' +
                                '<td >' + v.siswa.jenkel + '</td>' +
                                '<td width="12%"><input type="text" class="form-control form-control-sm" name="nilai[]" value=" ' +
                                v.nilai + ' " ></td>' +
                                '</tr>';
                        });
                        html = $('#marks-entry-tr').html(html);
                    }
                });
            });
        </script>


        {{-- //Dapatkan Data Mata Pelajaran --}}
        <script type="text/javascript">
            $(function() {
                $(document).on('change', '#kelas_id', function() {
                    var kelas_id = $('#kelas_id').val();
                    $.ajax({
                        url: "{{ route('entrynilai.dapatmapel') }}",
                        type: "GET",
                        data: {
                            kelas_id: kelas_id
                        },
                        success: function(data) {
                            var html = '<option value="">Pilih Mata Pelajaran</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.mata_pelajaran
                                    .name + '</option>';
                            });
                            $('#mapel_id').html(html);
                        }
                    });
                });
            });
        </script>
    @endsection
