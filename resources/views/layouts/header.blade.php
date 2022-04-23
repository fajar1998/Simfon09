<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/img/tut34.png') }}" width="40" height="40" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>Sistem Informasi Sekolah</h3>
    </div>
    <!-- /Header Title -->

    {{-- <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a> --}}

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <input class="form-control" type="text" placeholder="Cari Sesuatu">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>
        &nbsp;&nbsp;&nbsp;
        <!-- /Search -->







        @php
            $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();
        @endphp

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img
                        src="{{ !empty($user->image) ? url('upload/foto_user/' . $user->image) : url('upload/wa1.jpg') }}"
                        alt="">&nbsp;&nbsp;&nbsp;
                    <span class="status online"></span></span>
                <span>{{ Auth::user()->name }}</span> |
                @if ($user->hak_akses == '1')
                    Admin
                @elseif($user->hak_akses == '2')
                    Operator
                @elseif($user->hak_akses == '3')
                    Guru
                @endif
            </a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profil.view') }}">Profil Saya</a>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('profil.view') }}">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>

{{-- @include('layouts.cssnav') --}}
