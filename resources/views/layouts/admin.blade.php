<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{secure_asset('css/admin.css')}}" rel="stylesheet" />
    <title>@yield('title','Admin-Poke Store')</title>
</head>

<body>
    <div class="row g-0">
        <!--sidebar-->
        <div class="p-3 col fixed text-white bg-dark">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4">Painel de administração</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{route('admin.home.index')}}" class="nav-link text-white">-Administração-Início</a></li>
                <li><a href="{{route('admin.pokemon.index')}}" class="nav-link text-white">-Administração-Pokemons</a></li>
                <li><a href="{{route('home.index')}}" class="mt-2 btn bg-primary text-white">Voltar</a></li>
            </ul>
        </div>
        <!--sidebar"-->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Administração</span>
                <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile.svg')}}">
            </nav>

            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://www.linkedin.com/in/luany-boneli-40a827230/">
                    Luany Boneli
                </a>
            </small>
        </div>
    </div>
    <!--footer-->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>