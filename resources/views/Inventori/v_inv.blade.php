@extends('master')
@section('title', 'Inventory')
@section('konten')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Inventory</li>
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
                                <strong class="card-title">Inventory</strong>
                                <!-- Button trigger modal -->

                                <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">Tambah
                                        Barang</button>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#exampleModal2">Barang Masuk</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal23">Barang Keluar</button>
                                </div>

                                @include('Inventori.modal_add_brg_msk')

                                @include('Inventori.modal_add_brg_klr')

                                @include('Inventori.modal_add')
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Ruangan</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inv as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item['ruangan']['name'] }}</td>
                                                <td>{{ $item['kategori']['name'] }}</td>
                                                <td>Rp. {{ number_format($item->harga) }}</td>
                                                <td>{{ $item->stock }} &nbsp;Unit</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#Edit{{ $item->id }}"
                                                        class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                                    @include('Inventori.modal_edit')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#id_kategori', function() {
                var id_kategori = $(this).val();
                if (id_kategori == '0') {
                    $('#add_another').show();
                } else {
                    $('#add_another').hide();
                }
            });
        });
    </script>
@endsection
