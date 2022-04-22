@extends('master')
@section('title', 'Inventory')
@section('konten')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Inventory</li>
                        <li class="breadcrumb-item active">Barang Masuk</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Inventory | Barang Masuk</strong>
                                <!-- Button trigger modal -->



                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Admin</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangmsk as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->no_barang_masuk }}</td>
                                                <td>{{ $item['barang']['nama_barang'] }}</td>
                                                <td>{{ $item->jumlah_brg_msk }}</td>
                                                <td>Rp.{{ number_format($item['barang']['harga']) }}</td>
                                                <td>Rp.{{ number_format($item['barang']['harga'] * $item->jumlah_brg_msk) }}
                                                <td>{{ $item->created_by }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                        class="btn btn-default btn-sm"><i class="fa fa-file-o"></i></a>

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
        </div><!-- .animated -->
    </div>
@endsection
