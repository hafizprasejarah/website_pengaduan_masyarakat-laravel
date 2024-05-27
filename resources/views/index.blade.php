@extends('layout/main')

@section('body')
    @if (session('success'))
        <div class="message absolute success">
            <span>{{ session('success') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif

    @if (session('error'))
        <div class="message absolute Error">
            <span>{{ session('error') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif

    @if (session('loginError'))
        <div class="message absolute Error">
            <span>{{ session('loginError') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif
    <div class="wrapper bg">

        <div class="sub-wrapper">

            <h3 class="main-title title">Laporkan Keluhan Anda Disini</h3>
            <p class="sub-title">Untuk mereport permalasahan hari ini di lingkungan anda</p>

            <button name="btn" id="btn-login2" class="btn lapor">Laporkan</button>

        </div>
    </div>

    <div class="wrapper">
        <div class="sub-wrapper">
            <h1 class="main-title step">Step by Step Pengaduan</h1>
            <div class="container">
                <div class="card">
                    <div class="wrapper-image-card">
                        <img src="img/1.png" alt="" draggable="false">
                    </div>
                    <h4>
                        Tulis Pengaduan
                    </h4>
                </div>
                <div class="card">
                    <div class="wrapper-image-card">
                        <img src="img/2.jpg" alt="" draggable="false">
                    </div>
                    <h4>
                        Verifikasi
                    </h4>
                </div>
                <div class="card">
                    <div class="wrapper-image-card">
                        <img src="img/3.jpg" alt="" draggable="false">
                    </div>
                    <h4>
                        Tindak Lanjut
                    </h4>
                </div>
                <div class="card">
                    <div class="wrapper-image-card">
                        <img src="img/1.png" alt="" draggable="false">
                    </div>
                    <h4>
                        Selesai
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
