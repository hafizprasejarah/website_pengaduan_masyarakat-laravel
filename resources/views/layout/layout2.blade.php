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
        <div class="user-menu">
            <i class="fa-solid fa-bars" id="sidebar-btn"></i>
        </div>
        
        <div class="header-title">
            <a href="/">
                <div class="logo"><img src="/img/logo-sekolah.png" alt="" draggable="false"></div>
            </a>
            <h3>
                Pusat Aduan Masyarakat <br>
                kelompok 1
            </h3>
        </div>



        <div class="account-box">
            <div class="box-status"></div>
            <h4 class="name">{{ auth()->user()->name }}</h4>
            <div class="fa-regular fa-circle-user" id="profile"></div>

            <div class="container dropdown">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                </form>
            </div>


        </div>

    </div>

    {{-- ============================ HEADER =========================== --}}

    @yield('body')


    {{-- script link --}}
    <script src="/script/script.js"></script>
</body>

</html>
