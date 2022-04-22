@extends('master')
@section('title', 'Profil Saya')
@section('konten')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <img alt=""
                                        src="{{ !empty($user->image) ? url('upload/foto_user/' . $user->image) : url('upload/wa1.jpg') }}">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $user->name }}</h3>
                                            <h6 class="text-muted">
                                                @if ($user->hak_akses == '1')
                                                    <span class="badge badge-success">Admin</span>
                                                @elseif($item->hak_akses == '2')
                                                    <span class="badge badge-info">Operator</span>
                                                @elseif($item->hak_akses == '3')
                                                    <span class="badge badge-primary">Guru</span>
                                                @endif
                                            </h6>
                                            <div class="staff-id">NIP : {{ $user->nid }}</div>
                                            <div class="small doj text-muted">Tanggal Bergabung : {{ $user->join_date }}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Nomor Telepon:</div>
                                                <div class="text"><a href="#">{{ $user->no_hp }}</a></div>
                                            </li>

                                            <li>
                                                <div class="title">Tanggal Lahir:</div>
                                                <div class="text">{{ $user->dob }}</div>
                                            </li>
                                            <li>
                                                <div class="title"><i
                                                        class="fas fa-comment-alt-exclamation    "></i>Alamat:</div>
                                                <div class="text">{{ $user->alamat }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Jenis Kelamin:</div>
                                                <div class="text">{{ $user->jenkel }}</div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal"
                                    class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                Ubah Password
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('sandi.update', $user) }}">
                        @csrf

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input name="password" type="password" class="form-control" required>
                            <br>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('Profil.modal_person')
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
