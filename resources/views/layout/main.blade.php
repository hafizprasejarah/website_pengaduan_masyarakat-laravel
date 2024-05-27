<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    {{-- link untuk style nya --}}
    <link rel="stylesheet" href="/style/style.css">

</head>

<body>
    {{-- ============================ HEADER =========================== --}}
    <div class="header">

        <div class="header-title">
            <a href="/">
                <div class="logo"><img src="/img/logo-sekolah.png" alt="" draggable="false"></div>
            </a>
            <h3>
                Pusat Aduan Masyarakat <br>
                kelompok 1
            </h3>
        </div>


        @include('.../login/login')
        @include('.../registrasi/registrasi')

        <div class="btn-group">
            <button id="btn-login" class="btn masuk">MASUK</button>
            <button id="btn-register" class="btn signup">DAFTAR</button>
        </div>


    </div>

    {{-- ============================ HEADER =========================== --}}

    @yield('body')

    
    {{-- script link --}}
    <script src="/script/script.js"></script>
</body>

</html>
