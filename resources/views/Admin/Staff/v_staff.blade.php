@extends('master')
@section('title', 'User')
@section('konten')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Staff</li>
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
                                <strong class="card-title">Staff</strong>
                                <!-- Button trigger modal -->

                                <button class="btn btn-info btn-rounded" style="float: right" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Tambah</button>
                                @include('Admin.Staff.modal_add_staff')
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="3%">#</th>
                                                <th width="10%">NIP</th>
                                                <th width="10%">Nama</th>
                                                <th width="10%">Status</th>
                                                <th width="15%">No Telepon</th>
                                                <th width="15%">Jabatan</th>

                                                <th width="20%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->nid }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        @if ($item->status == 'PNS')
                                                            <span class="badge badge-info"> PNS</span>
                                                        @elseif($item->status == 'Honor')
                                                            <span class="badge badge-success"> Honor</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->no_hp }}</td>
                                                    <td>{{ $item['jabatan']['name'] }}</td>


                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#Edit{{ $item->id }}"
                                                            class="btn btn-default "><i class="fa fa-edit"></i></a>
                                                        @include('Admin.User.modal_edit')
                                                        <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                                            class="btn btn-default"><i class="fa fa-trash"></i></a>
                                                        @include('Admin.User.hapus')
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
        </div><!-- .animated -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
